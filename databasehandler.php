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
			deleteAnEvent();
			break;
		case 26:
			changePassword();
			break;
		case 27:
			getAReport();
			break;
		case 28:
			toggleApproveReport();
			break;
		case 29:
			editEvent();
			break;
		case 30:
			addReport();
			break;
		case 31:
			getAnEventwithReportinfo();
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

	function deleteAnEvent()
 	{
 			$success="";
			include("events.php");

			$event = new events();

			$eventid=$_REQUEST['eventid'];

			$result = $event->deleteEvent($eventid);

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
		   while($row = $event->fetch()){
			   $success="true";
			   $total = $row['total'];
		   }

			$result = $event->getDashRegionFigures($s_final_date,$e_final_date,$region);

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
			$sdata = array();

			while($row = $event->fetch()){
				$success="true";
				$total = $row['total'];
				if ($total == null) {
					$sdata['total'] = '0';
					array_push($data,$sdata);
				}else{
					array_push($data,$row);
				}
				
			}

				echo json_encode($data);

   }

   function getDashTotalAttendees()
	{
			$success="";
			include("events.php");
			$event = new events();
			$total = '';
			$moredata = array();

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
			$sdata = array();

			while($row = $event->fetch()){
				$success="true";
				$total = $row['total'];
				if ($total == null) {
					$sdata['total'] = '0';
					array_push($data,$sdata);
				}else{
					array_push($data,$row);
				}
				
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
			$sdata = array();
			
			$sdata['audience_category'] = 'None';
			$sdata['total'] = '0';
			array_push($data,$sdata);

		   while($row = $event->fetch()){
				$success="true";
				if (count($row)>1) {
					$data = array();
					array_push($data,$row);
				}
				
			}

			echo json_encode($data);

   }

	function getDashGraphEventData()
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
				}else{
					$sdate=$_REQUEST['sdate'];
					$edate=$_REQUEST['edate'];
					$s_converted_date = strtotime($sdate);
					$e_converted_date = strtotime($edate);
					$s_final_date = date("Y-m-d H:i:s", $s_converted_date);
					$e_final_date = date("Y-m-d H:i:s", $e_converted_date);
				}

				$result = $event->getDashGraphEventData($s_final_date,$e_final_date);

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

				if(!isset($_REQUEST['sdate']) || !isset($_REQUEST['edate']))
				{ 
					$sdate='';
					$edate=''; 
					$s_final_date = '';
					$e_final_date = '';
				}else{
					$sdate=$_REQUEST['sdate'];
					$edate=$_REQUEST['edate'];
					$s_converted_date = strtotime($sdate);
					$e_converted_date = strtotime($edate);
					$s_final_date = date("Y-m-d H:i:s", $s_converted_date);
					$e_final_date = date("Y-m-d H:i:s", $e_converted_date);
				}

				$result = $event->getDashPieEventData($s_final_date,$e_final_date);

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

				if(!isset($_REQUEST['sdate']) || !isset($_REQUEST['edate']))
				{ 
					$sdate='';
					$edate=''; 
					$s_final_date = '';
					$e_final_date = '';
				}else{
					$sdate=$_REQUEST['sdate'];
					$edate=$_REQUEST['edate'];
					$s_converted_date = strtotime($sdate);
					$e_converted_date = strtotime($edate);
					$s_final_date = date("Y-m-d H:i:s", $s_converted_date);
					$e_final_date = date("Y-m-d H:i:s", $e_converted_date);
				}

				$result = $event->getDashRegionNameData($s_final_date,$e_final_date);
				while($row = $event->fetch()){
					$data[]=(int)$row['regnum'];
					$data[]=$row['name'];
					$ndata[] = $data;
					$data = [];
				}
				$result = $event->getDashRegionAudienceData($s_final_date,$e_final_date);
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
						$result = $event->getDashRegionAudienceFullData($ndata[$i][0],$adata[$j][0],$s_final_date,$e_final_date);
						while($row = $event->fetch()){
							$seriesnumdata[] = (int)$row['count'];
						}
					}
					$allarrays[] = $seriesnumdata;
					$seriesnumdata = [];
				}

				$alldata = transposeData($allarrays);

				for ($k=0; $k < count($alldata); $k++) {
					$seriesdata['name'] = $adata[$k][0];//$seriesdata['name'] = $snumdata[$k];
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
		$eventtitle='';
		$reporter='';
		$region='';
		
		 include("logs.php");
		 include("events.php");
		 $event = new events();
		 $log = new logs();
		 $eventid=$_REQUEST['eventid'];
		 $approval=$_REQUEST['approve'];
		 $approveComments=$_REQUEST['approveComments'];
		 $approvedDate = date("Y-m-d H:i:s");
		 $approve=$event->toggleEvent($eventid,$approval,$approvedDate,$approveComments);

		 $receipt=$event->getAnEvent($eventid);
		 while($row = $event->fetch()){
			$eventtitle=$row['eventtitle'];
			$reporter=$row['creator'];
			$region=$row['region'];
		 }

		 $log->addEventApproveLog($eventtitle,$reporter,"has approved an event: ", $region);

		 echo json_encode($approve);

	}

	function toggleApproveReport()
	{	
		$eventtitle='';
		$reporter='';
		$region='';

		 include("logs.php");
		 include("events.php");
		 $event = new events();
		 $log = new logs();
		 $reportid=$_REQUEST['reportid'];
		 $approval=$_REQUEST['approval'];
		 $verificationComments = $_REQUEST['verificationComments'];
		 $date = date("Y-m-d H:i:s");
		 $verify=$event->toggleReport($reportid,$approval,$date,$verificationComments);

		 $receipt=$event->getAReport($reportid);
		 while($row = $event->fetch()){
			$eventtitle=$row['eventtitle'];
			$reporter=$row['creator'];
			$region=$row['region'];
		 }

		 $log->addEventApproveLog($eventtitle,$reporter,"has approved a report: ", $region);
		 echo json_encode($approval);

	}

	function toggleVerify()
	{	
		$eventtitle='';
		$reporter='';
		$region='';

		include("logs.php");
		include("events.php");

		$event = new events();
		$log = new logs();

		$eventid=$_REQUEST['eventid'];
		$isVerify=$_REQUEST['verify'];
		$commentToVerify = $_REQUEST['verifycomments'];
		$verifiedDate = date("Y-m-d H:i:s");
		$verify=$event->toggleVerify($eventid,$isVerify,$verifiedDate,$commentToVerify);

		$receipt=$event->getAnEvent($eventid);
		 while($row = $event->fetch()){
			$eventtitle=$row['eventtitle'];
			$reporter=$row['creator'];
			$region=$row['region'];
		 }

		$log->addEventVerifyLog($eventtitle,$reporter,"has verified an event: ", $region);

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

	function addReport(){
		include("events.php");
		include("logs.php");

		$event = new events();
		$log = new logs();
		$myArray = array();

		$eventid=$_REQUEST['eventid'];
		$challenges=$_REQUEST['challenges'];
		$complaints=$_REQUEST['complaints'];
		$summary=$_REQUEST['observations'];
		$picpath=$_REQUEST['picpath'];
		$foldpath=$_REQUEST['foldpath'];
		$teammembers=$_REQUEST['members'];
		
		$verify=$event->addNewReport($eventid,$challenges,$complaints,$summary,$picpath,$foldpath,$teammembers);

		$log->addReportLog($eventid,$reporter,"Added a new report for:", $region);

		$myArray = explode(',', $teammembers);
		for ($i=0; $i < count($myArray); $i++) { 
			$verifyadd=$event->addTeamMembers($eventid,$myArray[$i]);
		}

		//$log->addEventLog($eventtitle,$reporter,"added a Report", $region);
		if($verify==""){
			echo '{"result":0,"message":"Event not added"}';
		}
		else{
			$verify=$event->addNewReportEventUpdate($eventid,1);
			echo '{"result":1,"message":"Event added"}';

		}
	}

	function getAnEventwithReportinfo(){
 			$success="";
 			include("events.php");
 			$event = new events();

			$eventid=$_REQUEST['eventid'];
			$data = array();

			$result = $event->getAnEvent($eventid);

			while($row = $event->fetch()){
 					$success="true";
					 // $data[]=$row;
					$data['approved_timestamp'] = $row['approved_timestamp'];
					$data['audience_category'] = $row['audience_category'];
					$data['firstname'] = $row['firstname'];
					$data['lastname'] = $row['lastname'];
					$data['date_to_be_organized'] = $row['date_to_be_organized'];
					$data['event_id'] = $row['event_id'];
					$data['eventtitle'] = $row['eventtitle'];
					$data['eventtopic'] = $row['eventtopic'];
					$data['expected_audience_attendance'] = $row['expected_audience_attendance'];
					$data['is_approved'] = $row['is_approved'];
					$data['is_verified'] = $row['is_verified'];
					$data['logistics'] = $row['logistics'];
					$data['mode_of_outreach'] = $row['mode_of_outreach'];
					$data['regionname'] = $row['regionname'];
					$data['town'] = $row['town'];
					$data['verification_comments'] = $row['verification_comments'];
					$data['verified_timestamp'] = $row['verified_timestamp'];
 					//array_push($data,$row);

 				}

			$result = $event->getReportwithEventid($eventid);

 			while($row = $event->fetch()){
 					$success="true";
					 // $data[]=$row;
					$data['team_challenges'] = $row['team_challenges'];
					$data['complaints_raised'] = $row['complaints_raised'];
					$data['event_summary'] = $row['event_summary'];
					$data['picture_paths'] = $row['picture_paths'];
					$data['folder_paths'] = $row['folder_paths'];
					$data['team_members'] = $row['team_members'];
					//array_push($moredata,$data);

				 }

 				echo json_encode($data);
	}

?>
