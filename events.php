<?php
include_once("database.php");

	class events extends database
	{

		/**
		* Creates a new constructor of the class
		*/
		function events(){

		}

		function deleteEvent($eventid){
			$strQuery="delete from events where event_id='$eventid' ";
			return $this->query($strQuery);
		}

    /**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function getEvents(){
			$strQuery="select * from events where is_approved =1";
      return $this->query($strQuery);
		}

    function getAnEvent($eventid){
			$strQuery="SELECT e.approved_timestamp,e.audience_category,u.firstname,u.lastname,e.date_to_be_organized,e.event_id,e.eventtitle,e.eventtopic,e.expected_audience_attendance,e.is_approved,e.is_verified,e.logistics,e.mode_of_outreach,r.regionname,e.town,e.verification_comments,e.verified_timestamp FROM events as e inner join region as r on r.region_id = e.region inner join users as u on u.userid = e.creator where event_id = '$eventid'";
      return $this->query($strQuery);
		}

		// function getAPendingEvent($eventid){
		// 	$strQuery="select p.eventtitle,p.date_to_be_organized,r.regionname as region,p.town,p.pending_id FROM `pending` as p INNER JOIN region as r on r.region_id = p.region where p.pending_id = '$eventid'";
    //   return $this->query($strQuery);
		// }

		function getRegions(){
			$strQuery="select * from region";
      return $this->query($strQuery);
		}

		function getDashRegionFigures($fdate=false,$ldate=false){
			$strQuery="select r.regionname as regname, count(e.region) as figures from events as e inner join region as r on r.region_id = e.region where e.is_approved = 1 ";
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			$strQuery.="group by e.region order by r.regionname ASC";
      return $this->query($strQuery);
		}

		function getDashTotalAttendees($fdate=false,$ldate=false,$region=false){
			$strQuery="select sum(expected_audience_attendance) as total from events where is_approved = 1 ";
			if($region!=false){
				$strQuery.="and region = '$region' ";
			}
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			return $this->query($strQuery);
		}

		function getDashTotalEvents($fdate=false,$ldate=false,$region=false){
			$strQuery="select count(region) as total from events where is_approved = 1 ";
			if($region!=false){
				$strQuery.="and region = '$region' ";
			}
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			return $this->query($strQuery);
		}

		// function getDashTopRegion(){
		// 	$strQuery="select r.regionname as region, count(p.region) as total from reports as p inner join region as r on r.region_id = p.region where is_approved = 1 group by p.region order by count(p.region) desc limit 1";
		// 	return $this->query($strQuery);
		// }

		function getDashGraphEventData($fdate=false,$ldate=false){
			$strQuery="select count(DATE(date_to_be_organized)) as totals, DATE(date_to_be_organized) as date, date_to_be_organized from events where is_approved = 1 ";
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			$strQuery.= "group by DATE(events.date_to_be_organized)";
			return $this->query($strQuery);
		}

		function getDashPieEventData($fdate=false,$ldate=false){
			$strQuery="select count(audience_category) as totals, audience_category as audience from events where is_approved = 1 ";
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			$strQuery.="group by audience_category";
			return $this->query($strQuery);
		}

		function getDashRegionNameData($fdate=false,$ldate=false){
			$strQuery="select p.region as regnum, r.regionname as name from events as p inner join region as r on r.region_id = p.region where p.is_approved = 1 ";
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			$strQuery.="group by p.region ORDER by r.regionname asc";
			return $this->query($strQuery);
		}

		function getDashRegionAudienceData($fdate=false,$ldate=false){
			$strQuery="select audience_category from events where is_approved=1 ";
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			$strQuery.="group by audience_category";
			return $this->query($strQuery);
		}

		function getDashRegionAudienceFullData($region,$aud,$fdate=false,$ldate=false){
			$strQuery="select sum(expected_audience_attendance) as count from events where region = '$region' and audience_category = '$aud' and is_approved=1 ";
			if(($fdate!=false) && ($ldate!=false)){
				$strQuery.="and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
			}
			return $this->query($strQuery);
		}

    function toggleEvent($eventid, $approval, $approvedDate){
      
      if($approval == "0"){
        $newapproval = "1";
      } else {
        $newapproval = "0";
      }

			$strQuery="update events set is_approved='$newapproval',approved_timestamp='$approvedDate' where event_id=$eventid";
      return $this->query($strQuery);
		}

    function toggleVerify($eventid, $verify, $date, $verifycomments){
		 
      if($verify == "0"){
        $newverify = "1";
      } else {
        $newverify = "0";
      }
      echo $newapproval;
      $strQuery="update events set is_verified='$newverify', verification_comments='$verifycomments', verified_timestamp='$date' where event_id=$eventid";
      return $this->query($strQuery);
    }

	function getDashTopAudienceCategory($fdate=false,$ldate=false,$region=false){
		$strQuery="select audience_category, count(audience_category) as total from events where is_approved=1 ";
		if($region!=false){
			$strQuery.="and region = '$region' ";
		}
		if(($fdate!=false) && ($ldate!=false)){
			$strQuery.=" and date_to_be_organized BETWEEN '$fdate' and '$ldate' ";
		}
		$strQuery.="group by audience_category order by count(audience_category) desc limit 1";
		return $this->query($strQuery);
	}

	/**
	* get user id
	* @param user's name
	* @return user's Id
	*/
	function getID($userName){
		$strQuery="Select ID from user where username = '$userName'";
		return $this->query($strQuery);
	}

	function addNewEvent($eventtitle,$topic,$date,$audience,$expected_audience_attendance,$region,$town,$logistics,$mode_of_outreach,$reporter){

		$strQuery="insert into events set
						eventtitle='$eventtitle',
						eventtopic='$topic',
						date_to_be_organized='$date',
						audience_category='$audience',
						expected_audience_attendance='$expected_audience_attendance',
						region='$region',
						town='$town',
						logistics='$logistics',
						mode_of_outreach='$mode_of_outreach',
						creator='$reporter' ";

		return $this->query($strQuery);
	}

	function addNewReport($event_id,$challenges,$complaints,$summary,$picpath,$foldpath,$teammembers){

		$strQuery="insert into reports set
						event_id='$event_id',
						team_challenges='$challenges',
						complaints_raised='$complaints',
						is_approved=0,
						verification_comments='',
						event_summary='$summary',
						team_members='$teammembers',
						picture_paths='$picpath',
						folder_paths='$foldpath' ";
    return $this->query($strQuery);
	}


		function toggleReport($reportid, $approval,$date){
      if($approval == "0"){
        $newapproval = "1";
      } else {
        $newapproval = "0";
      }
      $strQuery="update reports set is_approved='$newapproval', verified_timestamp='$date' where report_id=$reportid";
			return $this->query($strQuery);
		}

	function getAReport($reportid){
		$strQuery="SELECT e.approved_timestamp,e.audience_category,u.firstname,u.lastname,e.date_to_be_organized,e.event_id,e.eventtitle,e.eventtopic,e.expected_audience_attendance,e.is_approved,e.is_verified,e.logistics,e.mode_of_outreach,r.regionname,e.town,e.verification_comments,e.verified_timestamp,p.complaints_raised,p.date_reported,p.event_summary,p.folder_paths,p.is_approved as reportapprove,p.picture_paths,p.report_id,p.team_challenges,p.verification_comments as reportverificationcomments ,p.verified_timestamp as reportverifiedtimestamp FROM events as e inner join region as r on r.region_id = e.region inner join users as u on u.userid = e.creator inner join reports as p on p.event_id = e.event_id where report_id = '$reportid'";
	return $this->query($strQuery);
	}

	function editEvent($eventtitle,$topic,$date,$audience,$expected_audience_attendance,$region,$town,$logistics,$mode_of_outreach,$reporter,$eventid){

		$strQuery="update events set
						eventtitle='$eventtitle',
						eventtopic='$topic',
						date_to_be_organized='$date',
						audience_category='$audience',
						expected_audience_attendance='$expected_audience_attendance',
						region='$region',
						town='$town',
						logistics='$logistics',
						mode_of_outreach='$mode_of_outreach',
						is_verified='0',
						is_approved='0',
						creator='$reporter' 
						where event_id='$eventid'";

		return $this->query($strQuery);
	}

	function editReport($event_id,$challenges,$complaints,$verifiedComments,$summary,$picpath,$foldpath,$reportid){

		$strQuery="update reports set
						event_id='$event_id',
						team_challenges='$challenges',
						complaints_raised='$complaints',
						is_approved=0,
						verification_comments='$verifiedComments',
						event_summary='$summary',
						picture_paths='$picpath',
						folder_paths='$foldpath' 
						where report_id='$reportid'";

		return $this->query($strQuery);
	}		
	
	function addTeamMembers($event_id,$name){
		$strQuery="insert into reportmembers set
						event_id='$event_id',
						name='$name' ";

		return $this->query($strQuery);
	}	

	}
?>
