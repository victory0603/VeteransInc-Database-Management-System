<?php
/*

*	File:			staffDeleteForm.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form to load person details
*	and POST changed fields back to this form and UPDATE
*	If UPDATE is good then use header(Location: ...
*	to return to the companyPeopleEdit form
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
	
			$staff_ID = $_GET["staff_ID"];
            
			$staff_SQLdelete = "DELETE FROM staff WHERE Staff_ID = '".$staff_ID."' ";
            echo $staff_SQLdelete;	
	
            if (mysql_query($staff_SQLdelete))  {	
				echo header("Location: staffAddEdit.php?staff_ID=".$staff_ID);
			} else {
				echo '<span style="color:red; ">FAILED to delete the staff.</span><br /><br />';
				
			}				
		}
        
	
	echo "<br /><hr /><br />";

	

?>