<?php
	//check command
	if(!isset($_REQUEST['cmd'])){
		echo "cmd is not provided";
		exit();
	}
	/*get command*/
	//A method is called based on the command
	$cmd=$_REQUEST['cmd'];
	switch($cmd){
		case 1:
			loginUser();
			break;
		case 2:
			addEvent();
			break;
		case 3:
			getEvents();
			break;
		case 4:
		  toggleApprove();
		  break;
		case 5:
			toggleVerify();
			break;
		case 6:
			getAnEvent();
			break;
		case 7:
			getCalEvents();
			break;
		case 8:
			getRegions();
			break;
		case 9:
			$id=$_REQUEST['id'];
			getTowns($id);
			break;
		case 10:
			getDashRegionFigures();
			break;
		case 11:
			getDashTotalEvents();
			break;
		case 12:
			getDashTopRegion();
			break;
		case 13:
			getDashTotalAttendees();
			break;
		case 14:
			getDashTopAudienceCategory();
			break;
		case 15:
			getDashGraphEventData();
			break;
		case 16:
			getDashPieEventData();
			break;
		case 17:
			getDashOutreachEventData();
			break;
		case 18:
			getAllUsers();
			break;
		case 19:
			addLevel1User();
			break;
		case 20:
			deleteUser();
			break;
		case 21:
			reactivateUser();
			break;
		case 22:
			addPendingEvent();
			break;
    case 23:
			fetchAddUserLog();
			break;
		case 24:
			getAPendingEvent();
			break;
		case 25:
			deleteAPendingEvent();
		case 26:
			changePassword();
			break;
    case 27:
			getAReport();
			break;
		case 28:
			editEvent();
			break;
		case 29:
			toggleApproveReport();
			break;
		default:
			echo "wrong cmd";	//change to json message
			break;
	}


   function loginUser()
   {

      include("users.php");
      $user = new users();

      if($_REQUEST['email']=="")
      {
        echo '{"result": 0, "message": "No user email. Failed to log in."}';
        exit();
      }

      $email = $_REQUEST['email'];
      $password = $_REQUEST['password'];
      // echo $email;
      // echo $password;
      $validation = $user->login($email,$password);
      // echo $validation;
			if($validation==false){

			   echo '{"result":0,"message":"Validation failed"}';

			}
			else{

				// $array=array('result'=>1,'message'=>'User logged in','email'=>$email,'password'=>$password);
				echo json_encode($validation);
			}

	}


	function changePassword()
	{

		 include("users.php");
		 $user = new users();

		 $myid = $_REQUEST['myid'];
		 $confirmednewpassword = $_REQUEST['confirmednewpassword'];

		 $validation = $user->updatepassword($myid,$confirmednewpassword);
		 
		 if($validation==false){
				echo '{"result":0,"message":"Validation failed"}';
		 }
		 else{
			 echo json_encode($validation);
		 }

 	}




	function addLevel1User()
   {

    include("users.php");

		$user = new users();

		$firstname=$_REQUEST['useraddfname'];
		$lastname=$_REQUEST['useraddlname'];
		$email=$_REQUEST['useraddemail'];
		$password=$_REQUEST['useraddpword'];
		$region=$_REQUEST['region'];
		$level=$_REQUEST['level'];
		$myid=$_REQUEST['myid'];

		$validation = $user->addNewUser($firstname,$lastname,$email,$password,$region,$level);

		$user2 = new users();

		$result = $user2->getID($firstname);

		$usersdata = array();

		while($row = $user2->fetch()){
				array_push($usersdata,$row);
		}

		echo json_encode($usersdata);

	}


	function fetchAddUserLog()
   {

    include("logs.php");

		$log = new logs();

		$actedon=$_REQUEST['acted_on_id'];
		$myid=$_REQUEST['myid'];

		$log->addUserLog($myid,$actedon,"added");

	}



	function deleteUser()
   {
      include("users.php");
			include("logs.php");

		$user = new users();
		$log = new logs();

		$userid=$_REQUEST['userid'];
		$myid=$_REQUEST['myid'];

		$validation = $user->deleteUser($userid);
		$log->addUserLog($myid, $userid, "deactivated the user:");

		echo json_encode($validation);
	}

	function reactivateUser()
   {
      include("users.php");
			include("logs.php");

		$user = new users();
		$log = new logs();

		$userid=$_REQUEST['userid'];
		$myid=$_REQUEST['myid'];

		$validation = $user->reactivateUser($userid);
		$log->addUserLog($myid, $userid, "activated the user:");

		echo json_encode($validation);
	}

	function addEvent(){
		include("events.php");
		include("logs.php");

		$event = new events();
		$log = new logs();

		$eventtitle=$_REQUEST['eventtitle'];
		$eventtopic=$_REQUEST['eventtopic'];
		$date=$_REQUEST['date'];
		$converted_date = strtotime($date);
		$final_date = date("Y-m-d H:i:s", $converted_date);
		$region=$_REQUEST['region'];
		$town=$_REQUEST['town'];
		$audiencecat=$_REQUEST['audiencecat'];
		$attendance=$_REQUEST['attendance'];
		$logistics=$_REQUEST['logistics'];
		$mode_of_outreach=$_REQUEST['outreach'];
		$reporter=$_REQUEST['reporter'];
		
		$verify=$event->addNewEvent($eventtitle,$eventtopic,$final_date,$audiencecat,$attendance,$region,$town,$logistics,$mode_of_outreach,$reporter);

		$log->addEventLog($eventtitle,$reporter,"added a Future event", $region);
		if($verify==""){
			echo '{"result":0,"message":"Event not added"}';
		}
		else{
			echo '{"result":1,"message":"Event added"}';

		}
	}

	function addPendingEvent(){
		include("events.php");
		include("logs.php");

		$event = new events();
		$log = new logs();

		$eventtitle=$_REQUEST['eventtitle'];
		$date=$_REQUEST['date'];
		$converted_date = strtotime($date);
		$final_date = date("Y-m-d H:i:s", $converted_date);
		$region=$_REQUEST['region'];
		$town=$_REQUEST['town'];
		$reporter=$_REQUEST['reporter'];

		$verify=$event->addPendingEvent($eventtitle,$final_date,$region,$town,$reporter);

		$log->addEventLog($eventtitle,$reporter,"added a pending event", $region);

		if($verify==""){
			echo '{"result":0,"message":"Event not added"}';
		}
		else{
			echo '{"result":1,"message":"Event added"}';

		}
	}

	function deleteAPendingEvent()
 	{
 			$success="";
 			include("events.php");
 			$event = new events();

			$eventid=$_REQUEST['pendid'];

 			$result = $event->deletePendingEvent($eventid);

 			echo json_encode($result);

 	}

	function getEvents()
	{
			$success="";
			include("events.php");
			$event = new events();

			$result = $event->getEvents();


			$data = array();

			while($row = $event->fetch()){
					$success="true";
					// $data[]=$row;
					array_push($data,$row);

				}

				echo json_encode($data);

	}

	function getCalEvents()
	{
			$success="";
			include("events.php");
			$event = new events();

			$result = $event->getEvents();


			$data = array();

			while($row = $event->fetch()){
					$success="true";
					$data['title']=$row['eventtitle'];
					//$data['start']=date_format($row['date_organized'],"D M d Y H:i:s");
					$data['start']=substr($row['date_to_be_organized'], 0, -9);
					$data['className']='success';
					$data['eventid']=$row['event_id'];
					$moredata[] = $data;
				}
				//echo date("D M d Y H:i:s");
				echo json_encode($moredata);


	}

	function getAnEvent()
 	{
 			$success="";
 			include("events.php");
 			$event = new events();

			$eventid=$_REQUEST['eventid'];

 			$result = $event->getAnEvent($eventid);

 			$data = array();

 			while($row = $event->fetch()){
 					$success="true";
 					// $data[]=$row;
 					array_push($data,$row);

 				}

 				echo json_encode($data);
	}


	function getAReport()
	{
			$success="";
			include("events.php");
			$event = new events();

			$reportid=$_REQUEST['reportid'];

			$result = $event->getAReport($reportid);

			$data = array();

			while($row = $event->fetch()){
					$success="true";
					// $data[]=$row;
					array_push($data,$row);

				}

			echo json_encode($data);
   }

	function getAPendingEvent()
 	{
 			$success="";
 			include("events.php");
 			$event = new events();

			$eventid=$_REQUEST['eventid'];

 			$result = $event->getAPendingEvent($eventid);

 			$data = array();

 			while($row = $event->fetch()){
 					$success="true";
					$data['title']=$row['eventtitle'];
					$data['date']=$row['date_to_be_organized'];
					$data['region']=$row['region'];
					$data['town']=$row['town'];
					$data['id']=$row['pending_id'];
 					//array_push($data,$row);
 				}

 				echo json_encode($data);

 	}

	function getRegions()
 	{
 			$success="";
 			include("events.php");
 			$event = new events();

 			$result = $event->getRegions();

 			$data = array();

 			while($row = $event->fetch()){
 					$success="true";
 					array_push($data,$row);

 				}

 				echo json_encode($data);

	}

	function getDashRegionFigures()
	{
			$success="";
			include("events.php");
		   $event = new events();
		   $total="";

		   $result = $event->getDashTotalEvents();
		   while($row = $event->fetch()){
			   $success="true";
			   $total = $row['total'];
		   }

			$result = $event->getDashRegionFigures();

			$data = array();

			while($row = $event->fetch()){
			   $success="true";
			   $data['regname']=$row['regname'];
			   $data['figures']=$row['figures'];
			   $decimal = $row['figures'] / $total;
			   $percentage = number_format(($decimal * 100),2, '.', '');
			   $data['percentage'] = $percentage.'%';
			   $moredata[] = $data;
			}

				echo json_encode($moredata);

   }

   function getDashTotalEvents()
	{
			$success="";
			include("events.php");
			$event = new events();

			if(!isset($_REQUEST['sdate']) || !isset($_REQUEST['edate']))
			{ 
				$sdate='';
				$edate=''; 
				$s_final_date = '';
				$e_final_date = '';
				$region= '';
			}else{
				if (!isset($_REQUEST['region'])) {
					$region='';
				}else{
					$region=$_REQUEST['region'];
				}
				$sdate=$_REQUEST['sdate'];
				$edate=$_REQUEST['edate'];
				$s_converted_date = strtotime($sdate);
				$e_converted_date = strtotime($edate);
				$s_final_date = date("Y-m-d H:i:s", $s_converted_date);
				$e_final_date = date("Y-m-d H:i:s", $e_converted_date);
			} 

			$result = $event->getDashTotalEvents($s_final_date,$e_final_date,$region);

			$data = array();

			while($row = $event->fetch()){
					$success="true";
					array_push($data,$row);

				}

				echo json_encode($data);

   }

   function getDashTotalAttendees()
	{
			$success="";
			include("events.php");
			$event = new events();

			if(!isset($_REQUEST['sdate']) || !isset($_REQUEST['edate']))
			{ 
				$sdate='';
				$edate=''; 
				$s_final_date = '';
				$e_final_date = '';
				$region = '';
			}else{
				if (!isset($_REQUEST['region'])) {
					$region='';
				}else{
					$region=$_REQUEST['region'];
				}
				$sdate=$_REQUEST['sdate'];
				$edate=$_REQUEST['edate'];
				$s_converted_date = strtotime($sdate);
				$e_converted_date = strtotime($edate);
				$s_final_date = date("Y-m-d H:i:s", $s_converted_date);
				$e_final_date = date("Y-m-d H:i:s", $e_converted_date);
			}

			$result = $event->getDashTotalAttendees($s_final_date,$e_final_date,$region);

			$data = array();

			while($row = $event->fetch()){
					$success="true";
					array_push($data,$row);

				}

				echo json_encode($data);

   }

   function getDashTopRegion()
	{
			$success="";
			include("events.php");
			$event = new events();

			$result = $event->getDashTopRegion();

			$data = array();

			while($row = $event->fetch()){
					$success="true";
					array_push($data,$row);

				}

				echo json_encode($data);

   }

   function getDashTopAudienceCategory()
   {
		   $success="";
		   include("events.php");
			$event = new events();
			
			if(!isset($_REQUEST['sdate']) || !isset($_REQUEST['edate']))
			{ 
				$sdate='';
				$edate=''; 
				$s_final_date = '';
				$e_final_date = '';
				$region = '';
			}else{
				if (!isset($_REQUEST['region'])) {
					$region='';
				}else{
					$region=$_REQUEST['region'];
				}
				$sdate=$_REQUEST['sdate'];
				$edate=$_REQUEST['edate'];
				$s_converted_date = strtotime($sdate);
				$e_converted_date = strtotime($edate);
				$s_final_date = date("Y-m-d H:i:s", $s_converted_date);
				$e_final_date = date("Y-m-d H:i:s", $e_converted_date);
			}

		   $result = $event->getDashTopAudienceCategory($s_final_date,$e_final_date,$region);

		   $data = array();

		   while($row = $event->fetch()){
				   $success="true";
				   array_push($data,$row);

			   }

			echo json_encode($data);

   }

	function getDashGraphEventData()
		{
				$success="";
				include("events.php");
				$event = new events();

				$result = $event->getDashGraphEventData();

				$data = array();

				while($row = $event->fetch()){
						$success="true";
						//array_push($data,$row);
						//$newdate = str_replace("-",",",$row['date']);
						$newdate = strtotime($row['date_to_be_organized']." UTC");
						$new_date = date('d F Y', $newdate);
						$data[]=$new_date;
						$data[]=(int)$row['totals'];
						$moredata[] = $data;
						$data =[];
					}

					echo json_encode($moredata);

	}

	function getDashPieEventData()
		{
				$success="";
				include("events.php");
				$event = new events();

				$result = $event->getDashPieEventData();

				$data = array();

				while($row = $event->fetch()){
						$success="true";
						$data[]=$row['audience'];
						$data[]=(int)$row['totals'];
						$moredata[] = $data;
						$data =[];
					}

					echo json_encode($moredata);

	}

	function getDashOutreachEventData()
		{
				$success="";
				include("events.php");
				$event = new events();

				$data = array();
				$adata = array();
				$namedata = array();
				$seriesdata = array();
				$snumdata = array();
				$fulldata = array();
				$allarrays = array();

				$result = $event->getDashRegionNameData();
				while($row = $event->fetch()){
					$data[]=(int)$row['regnum'];
					$data[]=$row['name'];
					$ndata[] = $data;
					$data = [];
				}
				$result = $event->getDashRegionAudienceData();
				while($row = $event->fetch()){
					$data[]=$row['audience_category'];
					$adata[] = $data;
					$data = [];
				}

				for ($i=0; $i < count($ndata); $i++) {
					$namedata[] = $ndata[$i][1];
				}

				for ($i=0; $i < count($ndata); $i++) {
				@$snumdata[]=$adata[$i][0];
					for ($j=0; $j < count($adata); $j++) {
						$result = $event->getDashRegionAudienceFullData($ndata[$i][0],$adata[$j][0]);
						while($row = $event->fetch()){
							$seriesnumdata[] = (int)$row['count'];
						}
					}
					$allarrays[] = $seriesnumdata;
					$seriesnumdata = [];
				}

				$alldata = transposeData($allarrays);

				for ($k=0; $k < count($alldata); $k++) {
					$seriesdata['name'] = $snumdata[$k];
					$seriesdata['data'] = $alldata[$k];
					$moredata[] = $seriesdata;
				}

				$fulldata['categories'] = $namedata;
				$fulldata['series'] = $moredata;

				echo json_encode($fulldata);

	}

  	function transposeData($data)
	{
		$retData = array();
			foreach ($data as $row => $columns) {
				foreach ($columns as $row2 => $column2) {
					$retData[$row2][$row] = $column2;
				}
			}
		return $retData;
	}

	function toggleApprove()
	{

		 include("events.php");
		 $event = new events();

		 $eventid=$_REQUEST['eventid'];
		 $approval=$_REQUEST['approval'];

		 $verify=$event->toggleEvent($eventid,$approval);

		 echo json_encode($approval);

	}

	function toggleApproveReport()
	{

		 include("events.php");
		 $event = new events();

		 $reportid=$_REQUEST['reportid'];
		 $approval=$_REQUEST['approval'];

		 $verify=$event->toggleReport($reportid,$approval);

		 echo json_encode($approval);

	}

	function toggleVerify()
	{

		include("events.php");
		$event = new events();

		$eventid=$_REQUEST['eventid'];
		$isVerify=$_REQUEST['verify'];
		$commentToVerify = $_REQUEST['verifycomments'];
		$verify=$event->toggleVerify($eventid,$isVerify,$commentToVerify);

		echo json_encode($isVerify);

	}

	function getAllUsers(){

		include("users.php");
		$user = new users();

		$user_id=$_REQUEST['userid'];

		$result = $user->getUser($user_id);

		$usersdata = array();

		while($row = $user->fetch()){
				array_push($usersdata,$row);
		}

		echo json_encode($usersdata);



	}
	//Logs user into system
	function login(){
		include("users.php");
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$user = new users();
		$user2 = new users();

		$verify = $user->login($username,$password);

		if($verify==false){
			// $ans= $user->getEmail($username);
			// $ans=$user->fetch();
			// if($ans!=false){
			// 	$array = array('result'=>0,'message'=>'Please enter the right password','email'=>$ans["email"]);
			// 	echo json_encode($array);
			// }
			// else{
				echo '{"result":0,"message":"Wrong User information"}';

			// }

		}
		else{
			session_start();
			$_SESSION=$verify;

			$id=$user->getID($username);
			$bank=$user2->getBank($username);

			$id=$user->fetch();
			$bank=$user2->fetch();


			$array=array('result'=>1,'message'=>'User logged in',
		'username'=>$username,'password'=>$password,'userID'=>$id["ID"],'bank'=>$bank["BANK"]);
			echo json_encode($array);
		}

	}

	function generateReport()
	{
		include("users.php");
		$user=new users();
		$user_id=$_REQUEST['id'];

		$verify = $user->pullReport($user_id);

		$array = array();
		while($one = $user->fetch())
		{
			$array[] = $one;
		}

		echo json_encode($array);
	}

	function getNews()
	{
		include("users.php");
		$user=new users();


		$verify = $user->pullNews();

		$array = array();
		while($one = $user->fetch())
		{
			$array[] = $one;
		}

		echo json_encode($array);
	}

	function requestCard()
	{

		$username=$_REQUEST['username'];
		$bank=$_REQUEST['bank'];

		include("users.php");
		$user=new users();

		echo $username;
		echo $bank;

		$verify=$user->addRequest($username,$bank);
		if($verify==false){
			echo'{"result":0,"message":"Request not added"}';
		}
		else{
			echo'{"result":1,"message":"Request added"}';
		}
	}


	function addBook()
	{

		$hotelname=$_REQUEST['hotelname'];
		$occupants=$_REQUEST['occupants'];
		$checkindate=$_REQUEST['checkindate'];
		$checkoutdate=$_REQUEST['checkoutdate'];



		include("users.php");
		$user=new users();

		echo $telephone;
		$verify=$user->addBook($hotelname,$occupants,$checkindate,$checkoutdate);
		if($verify==false){
			echo'{"result":0,"message":"Request not added"}';
		}
		else{
			echo'{"result":1,"message":"Request added"}';
		}
	}

	function sendContactForm()
	{

		// $name=$_REQUEST['name'];
		$messagearea=$_REQUEST['messagearea'];
		$username=$_REQUEST['username'];


		include("users.php");
		$user=new users();

		$verify=$user->sendContact($messagearea,$username);
		if($verify==false){
			echo'{"result":0,"message":"Request not added"}';
		}
		else{
			echo'{"result":1,"message":"Request added"}';
		}
	}

	function adminLogin(){
		include("users.php");
		$username=$_REQUEST['username'];
		$password=$_REQUEST['password'];
		$user = new users();
		$user2 = new users();

		$verify = $user->adminLogin($username,$password);

		if($verify==false){

				echo '{"result":0,"message":"Wrong User information"}';


		}
		else{
			session_start();
			$_SESSION=$verify;


			$array=array('result'=>1,'message'=>'User logged in',
		'username'=>$username,'password'=>$password);
			echo json_encode($array);
		}

	}
	
	function editEvent(){
		include("events.php");
		include("logs.php");

		$event = new events();
		$log = new logs();

		$eventtitle=$_REQUEST['eventtitle'];
		$eventtopic=$_REQUEST['eventtopic'];
		$date=$_REQUEST['date'];
		$converted_date = strtotime($date);
		$final_date = date("Y-m-d H:i:s", $converted_date);
		$region=$_REQUEST['region'];
		$town=$_REQUEST['town'];
		$audiencecat=$_REQUEST['audiencecat'];
		$attendance=$_REQUEST['attendance'];
		$logistics=$_REQUEST['logistics'];
		$mode_of_outreach=$_REQUEST['outreach'];
		$reporter=$_REQUEST['reporter'];
		$eventid=$_REQUEST['eventid'];
		
		$verify=$event->editEvent($eventtitle,$eventtopic,$final_date,$audiencecat,$attendance,$region,$town,$logistics,$mode_of_outreach,$reporter,$eventid);

		$log->addEventLog($eventtitle,$reporter,"edited a Future event", $region);
		if($verify==""){
			echo '{"result":0,"message":"Event not added"}';
		}
		else{
			echo '{"result":1,"message":"Event added"}';

		}
	}

	function editEvent(){
		include("events.php");
		include("logs.php");

		$event = new events();
		$log = new logs();

		$eventtitle=$_REQUEST['eventtitle'];
		$eventtopic=$_REQUEST['eventtopic'];
		$date=$_REQUEST['date'];
		$converted_date = strtotime($date);
		$final_date = date("Y-m-d H:i:s", $converted_date);
		$region=$_REQUEST['region'];
		$town=$_REQUEST['town'];
		$audiencecat=$_REQUEST['audiencecat'];
		$attendance=$_REQUEST['attendance'];
		$logistics=$_REQUEST['logistics'];
		$mode_of_outreach=$_REQUEST['outreach'];
		$reporter=$_REQUEST['reporter'];
		$eventid=$_REQUEST['eventid'];
		
		$verify=$event->editEvent($eventtitle,$eventtopic,$final_date,$audiencecat,$attendance,$region,$town,$logistics,$mode_of_outreach,$reporter,$eventid);

		$log->addEventLog($eventtitle,$reporter,"edited a Future event", $region);
		if($verify==""){
			echo '{"result":0,"message":"Event not added"}';
		}
		else{
			echo '{"result":1,"message":"Event added"}';

		}
	}




?>
