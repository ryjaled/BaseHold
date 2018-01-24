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
	0 => 'firstname',
	1 => 'date'
);

// getting total number records without any search
$sql = "select e.eventlog_id,e.event_title,u.firstname as fname,u.lastname as lname,e.action,e.date from eventlogs as e inner join users as u on u.userid = e.user_id";
$query=mysqli_query($conn, $sql) or die("eventloglist.php: get information0");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "select e.eventlog_id,e.event_title,u.firstname as fname,u.lastname as lname,e.action,e.date from eventlogs as e inner join users as u on u.userid = e.user_id";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" Where ( u.firstname LIKE '".$requestData['search']['value']."%'";
	$sql.=" or u.lastname LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("eventloglist.php: get information1");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query=mysqli_query($conn, $sql) or die("eventloglist.php: get information2");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

	$enddate = date('jS F Y', strtotime($row['date']));
	$nestedData[] = $row['fname'].' '.$row['lname'].' '.$row['action'].' to '.$row['event_title'];
	$nestedData[] = $enddate;

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
