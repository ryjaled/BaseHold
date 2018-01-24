<?php
include_once("database.php");

	class events extends database
	{

		/**
		* Creates a new constructor of the class
		*/
		function events(){

		}




		/**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function addEvent($eventtitle,$date,$region,$town,$audiencecat,$attendance,$challenges,$complaints,$isVerified,$isApproved,$verifiedComments,$summary,$picpath,$reporter,$foldpath){

			$strQuery="insert into reports set
							eventtitle='$eventtitle',
							date_organized='$date',
							region='$region',
							town='$town',
							audience_category='$audiencecat',
							audience_attendance='$attendance',
							team_challenges='$challenges',
							complaints_raised='$complaints',
							is_verified='$isVerified',
							is_approved='$isApproved',
							verification_comments='$verifiedComments',
							event_summary='$summary',
							picture_paths='$picpath',
							reporter='$reporter',
							folder_paths='$foldpath' ";

							// echo $strQuery;
			return $this->query($strQuery);
		}

		function addPendingEvent($eventtitle,$date,$region,$town,$audiencecat,$reporter){

			$strQuery="insert into pending set
							eventtitle='$eventtitle',
							date_to_be_organized='$date',
							region='$region',
							town='$town',
							audience_category='$audiencecat',
							reporter='$reporter' ";

							// echo $strQuery;
			return $this->query($strQuery);
		}

    /**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function getEvents(){
			$strQuery="select * from reports where is_approved =1";
      return $this->query($strQuery);
		}

    function getAnEvent($eventid){
			$strQuery="select r.report_id,r.eventtitle,r.date_organized,a.regionname as region,r.town,r.audience_category,r.audience_attendance,r.team_challenges,r.complaints_raised,r.is_verified,r.is_approved,r.verification_comments,r.event_summary,r.picture_paths,r.folder_paths,r.reporter from reports as r inner join region as a on a.region_id = r.region where report_id=$eventid";
      return $this->query($strQuery);
		}

		function getAPendingEvent($eventid){
			$strQuery="select p.eventtitle,p.date_to_be_organized,r.regionname as region,p.town,p.pending_id FROM `pending` as p INNER JOIN region as r on r.region_id = p.region where p.pending_id = '$eventid'";
      return $this->query($strQuery);
		}

		function getRegions(){
			$strQuery="select * from region";
      return $this->query($strQuery);
		}

		function getDashRegionFigures(){
			$strQuery="select r.regionname as regname, count(p.region) as figures from reports as p inner join region as r on r.region_id = p.region where is_approved = 1 group by p.region ORDER BY r.regionname ASC";
      return $this->query($strQuery);
		}

		function getDashTotalAttendees(){
			$strQuery="select sum(audience_attendance) as total from reports where is_approved = 1";
			return $this->query($strQuery);
		}

		function getDashTotalEvents(){
			$strQuery="select count(region) as total from reports where is_approved = 1";
			return $this->query($strQuery);
		}

		function getDashTopRegion(){
			$strQuery="select r.regionname as region, count(p.region) as total from reports as p inner join region as r on r.region_id = p.region where is_approved = 1 group by p.region order by count(p.region) desc limit 1";
			return $this->query($strQuery);
		}

		function getDashGraphEventData(){
			$strQuery="select count(DATE(date_organized)) as totals, DATE(date_organized) as date, date_organized from reports where is_approved = 1 group by DATE(reports.date_organized)";
			return $this->query($strQuery);
		}

		function getDashPieEventData(){
			$strQuery="select count(audience_category) as totals, audience_category as audience from reports where is_approved = 1 group by audience_category";
			return $this->query($strQuery);
		}

		function getDashRegionNameData(){
			$strQuery="select p.region as regnum, r.regionname as name from reports as p inner join region as r on r.region_id = p.region where p.is_approved = 1 group by p.region ORDER by r.regionname asc";
			return $this->query($strQuery);
		}

		function getDashRegionAudienceData(){
			$strQuery="select audience_category from reports where is_approved=1 group by audience_category";
			return $this->query($strQuery);
		}

		function getDashRegionAudienceFullData($region,$aud){
			$strQuery="select sum(audience_attendance) as count from reports where region = '$region' and audience_category = '$aud' and is_approved=1";
			return $this->query($strQuery);
		}

    function toggleEvent($eventid, $approval){
      echo $approval;
      echo $eventid;
      // $newapproval = "";
      if($approval == "0"){
        $newapproval = "1";
      } else {
        $newapproval = "0";
      }
      echo $newapproval;
			$strQuery="update reports set is_approved='$newapproval' where report_id=$eventid";
      return $this->query($strQuery);
		}

    function toggleVerify($eventid, $verify, $verifycomments){
      //echo $verify;
      //echo $eventid;
      // $newapproval = "";
      if($verify == "0"){
        $newverify = "1";
      } else {
        $newverify = "0";
      }
      echo $newapproval;
      $strQuery="update reports set is_verified='$newverify', verification_comments='$verifycomments'  where report_id=$eventid";
      return $this->query($strQuery);
    }

		function getDashTopAudienceCategory(){
			$strQuery="select audience_category, count(audience_category) as total from reports where is_approved=1 group by audience_category order by count(audience_category) desc limit 1";
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


	}
?>
