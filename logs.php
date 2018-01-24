<?php
include_once("database.php");

	class logs extends database
	{

		/**
		* Creates a new constructor of the class
		*/
		function logs(){

		}

		/**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function addUserLog($eventid,$userid,$action){

			$strQuery="insert into eventlogs set
							event_id='$eventid',
							user_id='$userid',
              action='$action' ";

							// echo $strQuery;
			return $this->query($strQuery);
		}

    /**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function getLogs(){
			$strQuery="select * from eventlogs";
      return $this->query($strQuery);
		}


		/**
		* get user id
		* @param user's name
		* @return user's Id
		*/
		function getID($eventid){
			$strQuery="Select ID from eventlogs where event_id = '$eventid'";
			return $this->query($strQuery);
		}







    /**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function addUserLog($actor,$actedon,$action){

			$strQuery="insert into userlogs set
							acted_id='$eventid',
							acted_on_id='$userid',
              action='$action' ";
							// echo $strQuery;
			return $this->query($strQuery);
		}

    /**
		* adds new user to the database
		* @param [all attributes needed to create a user]
		* @return boolean showing success or failure
		*/
		function getLogs(){
			$strQuery="select * from userlogs";
      return $this->query($strQuery);
		}


		/**
		* get user id
		* @param user's name
		* @return user's Id
		*/
		function getID($id){
			$strQuery="Select ID from userlogs where actor_id = '$id'";
			return $this->query($strQuery);
		}


	}
?>
