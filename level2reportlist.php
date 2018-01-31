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

$id=$_REQUEST['userregion'];

// if (isset($_SESSION['levelid'])){
// 	$id = $_SESSION['levelid'];
// 	echo $id;
// }

// if (isset($_COOKIE['userlevelid'])){
// 	$id = $_COOKIE['userlevelid'];
// }

$columns = array(
// datatable column index  => database column name
    0 => 'eventtitle',
    1 => 'regionname',
    2 => 'user',
    3 => 'date_reported',
    4 => 'is_approved',
    5 => 'event_id'
);

// getting total number records without any search
$sql = "select e.eventtitle,e.creator,u.firstname,u.lastname,g.regionname, r.is_approved, r.date_reported, r.report_id ,r.event_id from reports as r inner join events as e on e.event_id = r.event_id inner join users as u on u.userid = e.creator inner join region as g on g.region_id = e.region where e.region = '$id'";
$query=mysqli_query($conn, $sql) or die("level2reportlist.php: get information0");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

$sql = "select e.eventtitle,e.creator,u.firstname,u.lastname,g.regionname, r.is_approved, r.date_reported, r.report_id ,r.event_id from reports as r inner join events as e on e.event_id = r.event_id inner join users as u on u.userid = e.creator inner join region as g on g.region_id = e.region where e.region = '$id'";
if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( eventtitle LIKE '".$requestData['search']['value']."%' )";
}
$query=mysqli_query($conn, $sql) or die("level2reportlist.php: get information1");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
//$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]." ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
/* $requestData['order'][0]['column'] contains column index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
$query=mysqli_query($conn, $sql) or die("level2reportlist.php: get information2");

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array();

    $nestedData[] = $row['eventtitle'];
    $nestedData[] = $row['regionname'];
    $nestedData[] = $row['firstname'].' '.$row['lastname'];
    $nestedData[] = date('jS F Y', strtotime($row['date_reported']));

    if( $row['is_approved'] == "0"){
        $approveLabel = "<p style='color: red'>Not Approved</p>";
				$buttonshow = "<button onclick='editor({$row['event_id']},{$row['report_id']})' class='btn btn-just-icon btn-success' rel='tooltip' data-placement='bottom' title='View & Verify'><i class='material-icons'>assignment</i></button>";
      } else {
        $approveLabel = "<p style='color: green'>Approved</p>";
				$buttonshow = "<button hidden onclick='editor({$row['event_id']},{$row['report_id']})' class='btn btn-just-icon btn-success' rel='tooltip' data-placement='bottom' title='View & Verify'><i class='material-icons'>assignment</i></button>";
      }
    $nestedData[] = $approveLabel;
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
