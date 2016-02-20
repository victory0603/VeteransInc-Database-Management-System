<?php
/*

*	File:			staffEditForm.php
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

$thisScriptName = "staffEditForm.php";

if ($dbSuccess) {

	if (isset($_POST["saveClicked"])) {$saveClicked = $_POST["saveClicked"]; }
	
	{	//	SAVE button was clicked 
		if (isset($saveClicked)) {
			unset($saveClicked);
			
			$staff_ID = $_POST["staff_ID"];	
			
			$S_First_Name = $_POST["S_First_Name"];	
			$S_Last_Name = $_POST["S_Last_Name"];	
			$username = $_POST["username"];	
			$password = $_POST["password"];	
			$Office_ID = $_POST["Office_ID"];	
			$Staff_Type_ID = $_POST["Staff_Type_ID"];			
	
			$staff_SQLupdate = "UPDATE staff SET ";
				
			$staff_SQLupdate .=  "S_First_Name = '".$S_First_Name."', ";
			$staff_SQLupdate .=  "S_Last_Name = '".$S_Last_Name."', ";
			$staff_SQLupdate .=  "username = '".$username."', ";
			$staff_SQLupdate .=  "password = '".$password."', ";	
			$staff_SQLupdate .=  "Office_ID = '".$Office_ID."', ";
			$staff_SQLupdate .=  "Staff_Type_ID = '".$Staff_Type_ID."' ";
	
			$staff_SQLupdate .=  "WHERE Staff_ID = '".$staff_ID."' "; 	
	
			if (mysql_query($staff_SQLupdate))  {	
				echo header("Location: StaffAddEdit.php?staff_ID=".$staff_ID);
			} else {
				echo '<span style="color:red; ">FAILED to update the staff.</span><br /><br />';
				
			}				
		}	
	//	END:  SAVE button was clicked 	ie. if (isset($saveClicked))
	}		
	
	{	//  Get the details of the staff selected 
			$staff_ID = $_GET["staff_ID"];	
					
			$staff_SQLselect = "SELECT * ";
			$staff_SQLselect .= "FROM ";
			$staff_SQLselect .= "staff ";
			$staff_SQLselect .= "WHERE Staff_ID = '".$staff_ID."' ";
			
			$staff_SQLselect_Query = mysql_query($staff_SQLselect);	
			
			while ($row = mysql_fetch_array($staff_SQLselect_Query, MYSQL_ASSOC)) {
				$current_S_First_Name = $row['S_First_Name'];
				$current_S_Last_Name = $row['S_Last_Name'];
				$current_username = $row['username'];
				$current_password = $row['password'];
				$current_Office_ID = $row['Office_ID'];
				$current_Staff_Type_ID = $row['Staff_Type_ID'];
				
			}
			
			mysql_free_result($staff_SQLselect_Query);			
	//  END: Get the details of the staff selected 
	}

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Staff EDIT Form
			</h2>';
	
	{	//		FORM postStaff
			
		$fld_staff_ID = '<input type="hidden" name="staff_ID" value="'.$staff_ID.'"/>';
	
		$fld_saveClicked = '<input type="hidden" name="saveClicked" value="1"/>';

		$fld_S_First_Name = '<input type="text" name="S_First_Name" value="'.$current_S_First_Name.'"/>';
		$fld_S_Last_Name = '<input type="text" name="S_Last_Name" value="'.$current_S_Last_Name.'"/>';
		$fld_username = '<input type="text" name="username" value="'.$current_username.'"/>';
		$fld_password = '<input type="text" name="password" value="'.$current_password.'"/>';
		$fld_Office_ID = '<input type="text" name="Office_ID" value="'.$current_Office_ID.'"/>';
		$fld_Staff_Type_ID = '<input type="text" name="Staff_Type_ID" value="'.$current_Staff_Type_ID.'"/>';
		

		echo '<form name="postStaff" action="'.$thisScriptName.'" method="post">';
		
				echo $fld_staff_ID;
		
				echo $fld_saveClicked;
				echo '
				<table>
					<tr>
						<td>First Name</td>
						<td>'.$fld_S_First_Name.'</td>
					</tr>
					<tr>
						<td>Last Name</td>
						<td>'.$fld_S_Last_Name.'</td>
					</tr>
					<tr>
						<td>Username</td>
						<td>'.$fld_username.'</td>
					</tr>
					<tr>
						<td>Password</td>
						<td>'.$fld_password.'</td>
					</tr>
					<tr>
						<td>Office</td>
						<td>'.$fld_Office_ID.'</td>
					</tr>
					<tr>
						<td>Staff Type</td>
						<td>'.$fld_Staff_Type_ID.'</td>
					</tr>
						<td></td>
						<td align="right"><input type="submit"  value="Save" /></td>
					</tr>					
				</table>
				';
					
		echo '</form>';
		

	//	END:	FORM postStaff
	}
	
	echo "<br /><hr /><br />";
	
	
}

?>