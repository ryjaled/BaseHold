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
	1 => 'date_to_be_organized', 
	2 => 'region',
	3 => 'town',
	4 => 'reporter',
	5 => 'pending_id'
);

// getting total number records without any search
$sql = "select p.eventtitle,p.date_to_be_organized,r.regionname as region,p.town,u.firstname as fname, u.lastname as lname,p.pending_id FROM `pending` as p INNER JOIN region as r on r.region_id = p.region INNER JOIN users as u on u.userid = p.reporter";
$query=mysqli_query($conn, $sql) or die("level1pendinglist.php: get information0");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "select p.eventtitle,p.date_to_be_organized,r.regionname as region,p.town,u.firstname as fname, u.lastname as lname,p.pending_id FROM `pending` as p INNER JOIN region as r on r.region_id = p.region INNER JOIN users as u on u.userid = p.reporter";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" Where ( eventtitle LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("level1pendinglist.php: get information1");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("level1pendinglist.php: get information2");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

	$nestedData[] = "<p style='text-align: left'>{$row['eventtitle']}</p>";
	$enddate = date('jS F Y', strtotime($row['date_to_be_organized']));
	$nestedData[] = $enddate;
	$nestedData[] = $row['region'];
	$nestedData[] = $row['town'];
	$nestedData[] = $row['fname'].' '.$row['lname'];

   //  if( $row['is_approved'] == "0"){
   //      $approveLabel = "<p style='color: red'>Not Approved</p>";
   //    } else {
   //      $approveLabel = "<p style='color: green'>Approved</p>";
   //    }
	
	$buttonshow = "<a onclick='level1viewer({$row['pending_id']})' class='btn btn-twitter btn-just-icon '><i class='material-icons'>assignment</i></a>";//chang function
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
