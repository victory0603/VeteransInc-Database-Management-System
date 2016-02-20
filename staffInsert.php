<?php
/*

*	File:			staffInsert.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script INSERTS the supplied fields to tPerson
*	if INSERT is OK then use header to return to companyPeopleEdit
*	else report error
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		include('../../htdocs/forms2/dbConfig1.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} else {
				echo "DB Selection FAILed";
			}
		} else {
				echo "MySQL Connection FAILed";
		}
		//	END	Secure Connection Script
}


if ($dbSuccess) {

		$staff_ID = $_POST["staff_ID"];	
		$S_First_Name = $_POST["S_First_Name"];	
		$S_Last_Name = $_POST["S_Last_Name"];	
		$username = $_POST["username"];	
		$password = $_POST["password"];
        $Office_ID = $_POST["Office_ID"];	
		$Staff_Type_ID = $_POST["Staff_Type_ID"];	
	
	
		$staff_SQLinsert = "INSERT INTO staff (";			
		$staff_SQLinsert .=  "Staff_ID, ";
		$staff_SQLinsert .=  "S_First_Name, ";
		$staff_SQLinsert .=  "S_Last_Name, ";
		$staff_SQLinsert .=  "username, ";	
		$staff_SQLinsert .=  "password, ";
        $staff_SQLinsert .=  "Office_ID, ";
        $staff_SQLinsert .=  "Staff_Type_ID ";
		$staff_SQLinsert .=  ") ";
		
		$staff_SQLinsert .=  "VALUES (";
		$staff_SQLinsert .=  "'".$staff_ID."', ";
		$staff_SQLinsert .=  "'".$S_First_Name."', ";
		$staff_SQLinsert .=  "'".$S_Last_Name."', ";
		$staff_SQLinsert .=  "'".$username."', ";	
		$staff_SQLinsert .=  "'".$password."', ";
        $staff_SQLinsert .=  "'".$Office_ID."', ";	
        $staff_SQLinsert .=  "'".$Staff_Type_ID."' ";	
		$staff_SQLinsert .=  ") ";


		if (mysql_query($staff_SQLinsert))  {	
		
			header("Location: staffAddEdit.php?staff_ID=".$staff_ID);
			
		} else {
			
			echo '<span style="color:red; ">FAILED to add new staff.</span><br /><br />';
			echo "<br /><hr /><br />";
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '<a href="../index.php">Quit - to homepage</a>';
			
		}	

}

?>