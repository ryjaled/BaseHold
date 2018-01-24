<?php
//customized by Brian Martey
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
/** written by Brian Martey*/

/* Database connection start */
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "ncaoutreach";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */
// storing  request (ie, get/post) global array to a variable
$requestData= $_REQUEST;

$columns = array(
// datatable column index  => database column name
	0 => 'eventtitle',
	1 => 'regionname',
	2 => 'town',
   3 => 'audience_category',
   4 => 'date_organized',
   5 => 'report_id'

);

// getting total number records without any search
$sql = "select r.eventtitle,r.report_id,r.date_organized,g.regionname,r.town,r.audience_category from reports as r inner join region as g on g.region_id = r.region where is_approved = 1";
$query=mysqli_query($conn, $sql) or die("dashevents.php: get information0");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "select r.eventtitle,r.report_id,r.date_organized,g.regionname,r.town,r.audience_category from reports as r inner join region as g on g.region_id = r.region where is_approved = 1";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
   $sql.=" AND ( eventtitle LIKE '".$requestData['search']['value']."%' ";
   $sql.=" OR regionname LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR town LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR audience_category LIKE '".$requestData['search']['value']."%' ";
   $sql.=" OR date_organized LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("dashevents.php: get information1");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query=mysqli_query($conn, $sql) or die("dashevents.php: get information2");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

	$nestedData[] = $row['eventtitle'];
   $nestedData[] = $row['regionname'];
   $nestedData[] = $row['town'];
	$nestedData[] = $row['audience_category'];
	$enddate = date('jS F Y', strtotime($row['date_organized']));
	$nestedData[] = $enddate;
	$buttonshow = "<a onclick='dashEventsDisplay({$row['report_id']})' class='btn btn-rose btn-md '><i class='material-icons'>assignment</i></a>";
	$nestedData[] = $buttonshow;

	$data[] = $nestedData;
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format

?>
