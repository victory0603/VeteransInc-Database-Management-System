<?php
/*

*	File:			veteranEditForm.php
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

$thisScriptName = "veteranEditForm.php";

if ($dbSuccess) {

	if (isset($_POST["saveClicked"])) {$saveClicked = $_POST["saveClicked"]; }
	
	{	//	SAVE button was clicked 
		if (isset($saveClicked)) {
			unset($saveClicked);
			
			$state_ID = $_POST["state_ID"];	
			
			$veteranID = $_POST["veteranID"];	
			$lastname = $_POST["lastname"];	
			$firstname = $_POST["firstname"];	
			$SSN = $_POST["SSN"];	
			$city = $_POST["city"];	
			$contactno = $_POST["contactno"];	
			$gender = $_POST["gender"];	
			$vetstatus = $_POST["vetstatus"];	
			$oifoef = $_POST["oifoef"];
			$lessAMI = $_POST["lessAMI"];
			$headHH = $_POST["headHH"];	
			$children = $_POST["children"];
			$eligibleSSVF = $_POST["eligibleSSVF"];
			$entryDt = $_POST["entryDt"];
			$exitDt = $_POST["exitDt"];			
	
			$veteran_SQLupdate = "UPDATE veterans_details SET ";
				
			$veteran_SQLupdate .=  "Last_Name = '".$lastname."', ";
			$veteran_SQLupdate .=  "First_Name = '".$firstname."', ";
			$veteran_SQLupdate .=  "SSN = '".$SSN."', ";
			$veteran_SQLupdate .=  "State_ID = '".$state_ID."', ";	
			$veteran_SQLupdate .=  "City = '".$city."', ";
			$veteran_SQLupdate .=  "Contact_No = '".$contactno."', ";
			$veteran_SQLupdate .=  "Gender = '".$gender."', ";
			$veteran_SQLupdate .=  "Vet_Status = '".$vetstatus."', ";
			$veteran_SQLupdate .=  "OIF_OEF = '".$oifoef."', ";
			$veteran_SQLupdate .=  "Less_AMI = '".$lessAMI."', ";
			$veteran_SQLupdate .=  "Head_HH = '".$headHH."', ";
			$veteran_SQLupdate .=  "Children = '".$children."', ";
			$veteran_SQLupdate .=  "Eligible_SSVF = '".$eligibleSSVF."', ";
			$veteran_SQLupdate .=  "Entry_Dt = '".$entryDt."', ";
			$veteran_SQLupdate .=  "Exit_Dt = '".$exitDt."' ";
			$veteran_SQLupdate .=  "WHERE Veteran_ID = '".$veteranID."' "; 	
	
			if (mysql_query($veteran_SQLupdate))  {	
				echo header("Location: veteransStatewise.php?state_ID=".$state_ID);
			} else {
				echo '<span style="color:red; ">FAILED to update the veteran.</span><br /><br />';
				
			}				
		}	
	//	END:  SAVE button was clicked 	ie. if (isset($saveClicked))
	}		
	
	{	//  Get the details of the veteran selected 
			$veteranID = $_GET["veteranID"];	
					
			$veteran_SQLselect = "SELECT * ";
			$veteran_SQLselect .= "FROM ";
			$veteran_SQLselect .= "veterans_details ";
			$veteran_SQLselect .= "WHERE Veteran_ID = '".$veteranID."' ";
			
			$veteran_SQLselect_Query = mysql_query($veteran_SQLselect);	
			
			while ($row = mysql_fetch_array($veteran_SQLselect_Query, MYSQL_ASSOC)) {
				$current_Last_Name = $row['Last_Name'];
				$current_First_Name = $row['First_Name'];
				$current_SSN = $row['SSN'];
				$current_State_ID = $row['State_ID'];
				$current_City = $row['City'];
				$current_Contact_No = $row['Contact_No'];
				$current_Gender = $row['Gender'];
				$current_Vet_Status = $row['Vet_Status'];
				$current_OIF_OEF = $row['OIF_OEF'];
				$current_Less_AMI = $row['Less_AMI'];
				$current_Head_HH = $row['Head_HH'];
				$current_Children = $row['Children'];
				$current_Eligible_SSVF = $row['Eligible_SSVF'];
				$current_Entry_Dt = $row['Entry_Dt'];
				$current_Exit_Dt = $row['Exit_Dt'];
				
				 
			}
			
			mysql_free_result($veteran_SQLselect_Query);			
	//  END: Get the details of the person selected 
	}

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" >
				Veteran EDIT Form
			</h2>';
	
	{	//		FORM postVeteran 
			
		$fld_veteranID = '<input type="hidden" name="veteranID" value="'.$veteranID.'"/>';
	
		$fld_saveClicked = '<input type="hidden" name="saveClicked" value="1"/>';

		$fld_Last_Name = '<input type="text" name="lastname" value="'.$current_Last_Name.'"/>';
		$fld_First_Name = '<input type="text" name="firstname" value="'.$current_First_Name.'"/>';
		$fld_SSN = '<input type="text" name="SSN" value="'.$current_SSN.'"/>';
		$fld_State_ID = '<input type="text" name="state_ID" value="'.$current_State_ID.'"/>';
		$fld_City = '<input type="text" name="city" value="'.$current_City.'"/>';
		$fld_Contact_No = '<input type="text" name="contactno" value="'.$current_Contact_No.'"/>';
		$fld_Gender = '<input type="text" name="gender" value="'.$current_Gender.'"/>';
		$fld_Vet_Status = '<input type="text" name="vetstatus" value="'.$current_Vet_Status.'"/>';
		$fld_OIF_OEF = '<input type="text" name="oifoef" value="'.$current_OIF_OEF.'"/>';
		$fld_Less_AMI = '<input type="text" name="lessAMI" value="'.$current_Less_AMI.'"/>';
		$fld_Head_HH = '<input type="text" name="headHH" value="'.$current_Head_HH.'"/>';
		$fld_Children = '<input type="text" name="children" value="'.$current_Children.'"/>';
		$fld_Eligible_SSVF = '<input type="text" name="eligibleSSVF" value="'.$current_Eligible_SSVF.'"/>';
		$fld_Entry_Dt = '<input type="text" name="entryDt" value="'.$current_Entry_Dt.'"/>';
		$fld_Exit_Dt = '<input type="text" name="exitDt" value="'.$current_Exit_Dt.'"/>';
		

		echo '<form name="postVeteran" action="'.$thisScriptName.'" method="post">';
		
				echo $fld_veteranID;
		
				echo $fld_saveClicked;
				echo '
				<table>
					<tr>
						<td>Last Name</td>
						<td>'.$fld_Last_Name.'</td>
					</tr>
					<tr>
						<td>First Name</td>
						<td>'.$fld_First_Name.'</td>
					</tr>
					<tr>
						<td>SSN</td>
						<td>'.$fld_SSN.'</td>
					</tr>
					<tr>
						<td>State ID</td>
						<td>'.$fld_State_ID.'</td>
					</tr>
					<tr>
						<td>City</td>
						<td>'.$fld_City.'</td>
					</tr>
					<tr>
						<td>Contact Number</td>
						<td>'.$fld_Contact_No.'</td>
					</tr>
					<tr>
						<td>Gender</td>
						<td>'.$fld_Gender.'</td>
					</tr>
					<tr>
						<td>Veteran_Status</td>
						<td>'.$fld_Vet_Status.'</td>
					</tr>
					<tr>
						<td>OIF/OEF</td>
						<td>'.$fld_OIF_OEF.'</td>
					</tr>
					<tr>
						<td>Less AMI</td>
						<td>'.$fld_Less_AMI.'</td>
					</tr>
					<tr>
						<td>Head of Household</td>
						<td>'.$fld_Head_HH.'</td>
					</tr>
					<tr>
						<td>Children</td>
						<td>'.$fld_Children.'</td>
					</tr>
					<tr>
						<td>Eligible for SSVF</td>
						<td>'.$fld_Eligible_SSVF.'</td>
					</tr>
					<tr>
						<td>Entry Date</td>
						<td>'.$fld_Entry_Dt.'</td>
					</tr>
					<tr>
						<td>Exit Date</td>
						<td>'.$fld_Exit_Dt.'</td>
					</tr>
					<tr>
						<td></td>
						<td align="right"><input type="submit"  value="Save" /></td>
					</tr>					
				</table>
				';
					
		echo '</form>';
		

	//	END:	FORM postVeteran 
	}
	
	echo "<br /><hr /><br />";
	
	
}

?>