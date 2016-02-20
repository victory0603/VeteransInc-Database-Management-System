<?php
/*

*	File:			veteransStatewise.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script uses a dropdown to select a company from tCompany;
*		*	tests it with isset and displays company details
*		*	with a list of people associated
*		*	provide an 'edit' link to edit a tPerson record
*		*	and an 'add' FORM at the end to Add a new tPerson
*		*	with selected company as companyID value 
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
			} 	
		}
		//	END	Secure Connection Script
}

// $thisScriptName separated out as it's now used several times
$thisScriptName = "veteransStatewise.php";

if ($dbSuccess) {
		if(!isset($_POST["state_ID"])) {

$_POST = 0; }	
		$state_ID = $_POST["state_ID"];

		if (isset($state_ID) AND $state_ID > 0){

	{	//  Get the details of the state selected
										
					$state_SQLselect = "SELECT * ";
					$state_SQLselect .= "FROM ";
					$state_SQLselect .= "state ";
					$state_SQLselect .= "WHERE State_ID = '".$state_ID."' ";
					
					$state_SQLselect_Query = mysql_query($state_SQLselect);	
					
					while ($row = mysql_fetch_array($state_SQLselect_Query, MYSQL_ASSOC)) {
						$State_ID = $row['State_ID'];
						$State_Desc = $row['State_Desc'];
														 
					}					
					mysql_free_result($state_SQLselect_Query);			
			}		
		
		
			{	//  Get the details of all associated Person records
				//		and store in array:  personArray  with key >$indx
				 
					$indx = 0;
				
					$veterans_SQLselect = "SELECT * ";
					$veterans_SQLselect .= "FROM ";
					$veterans_SQLselect .= "veterans_details ";
					$veterans_SQLselect .= "WHERE State_ID = '".$state_ID."' ";
					
					$veterans_SQLselect_Query = mysql_query($veterans_SQLselect);	
					
					while ($row = mysql_fetch_array($veterans_SQLselect_Query, MYSQL_ASSOC)) {
						
						//		we need this to pass to veteranEdit.php
						$veteransArray[$indx]['Veteran_ID'] = $row['Veteran_ID'];
						//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
						
						$veteransArray[$indx]['Last_Name'] = $row['Last_Name'];
						$veteransArray[$indx]['First_Name'] = $row['First_Name'];
						$veteransArray[$indx]['SSN'] = $row['SSN'];
						$veteransArray[$indx]['City'] = $row['City'];
						$veteransArray[$indx]['Contact_No'] = $row['Contact_No'];
						$veteransArray[$indx]['Gender'] = $row['Gender'];
						$veteransArray[$indx]['Vet_Status'] = $row['Vet_Status'];
						$veteransArray[$indx]['OIF_OEF'] = $row['OIF_OEF'];
						$veteransArray[$indx]['Less_AMI'] = $row['Less_AMI'];
						$veteransArray[$indx]['Head_HH'] = $row['Head_HH'];
						$veteransArray[$indx]['Children'] = $row['Children'];
						$veteransArray[$indx]['Eligible_SSVF'] = $row['Eligible_SSVF'];
						$veteransArray[$indx]['Entry_Dt'] = $row['Entry_Dt'];
						$veteransArray[$indx]['Exit_Dt'] = $row['Exit_Dt'];
						
							
						$indx++;			 
					}
		
					$numVeterans = sizeof($veteransArray);
							
					mysql_free_result($veterans_SQLselect_Query);			
			}
		
			{	//		Output 

					$tdOdd = 'style = "background-color: #FF8F8F;"';
					$tdEven = 'style = "background-color: #76E9FF;"';
					
					echo '<div style=" font-family: arial, helvetica, sans-serif; ">';
		
							{	//		Table to render State	
							echo 	  '<table>
											<tr valign="top">								
												<td style=" font-size: 24; 
																font-weight: bold;" 
																>
														'.$State_Desc.'
												</td>
												
											</tr>
										</table>';
							//		END: Table to render State
							}
															
							echo '<div style="margin-left: 100; ">';
				
							{	//		Table of veterans records
							echo '<table border="1" padding="5">';
								echo '<tr>
											<td>Last Name</td>
											<td>First Name</td>
											<td>SSN</td>
											<td>City</td>
											<td>Contact Number</td>
											<td>Gender</td>
											<td>Veteran Status</td>
											<td>OIF/OEF</td>
											<td>Less AMI</td>
											<td>Head of Household</td>
											<td>Children</td>
											<td>Eligible for SSVF</td>
											<td>Entry Date</td>
											<td>Exit Date</td>
																			
											<td width="90"></td>
										</tr>	';	
																		
								for ($indx = 0; $indx < $numVeterans; $indx++) {
									$thisID = $veteransArray[$indx]['Veteran_ID'];
									$veteranEditLink = '<a href="veteranEditForm.php?veteranID='.$thisID.'">Edit</a>';
									
		        					if (($indx % 2) == 1) {$rowClass = $tdOdd; } else { $rowClass = $tdEven; }  
		 
									echo '<tr '.$rowClass.' height="20">
									
												<td>'.$veteransArray[$indx]['Last_Name'].'</td>
												
												<td>'.$veteransArray[$indx]['First_Name'].'</td>
		
												<td>'.$veteransArray[$indx]['SSN'].'</td>
		
												<td>'.$veteransArray[$indx]['City'].'</td>
												
												<td>'.$veteransArray[$indx]['Contact_No'].'</td>
	
												<td>'.$veteransArray[$indx]['Gender'].'</td>
		
												<td>'.$veteransArray[$indx]['Vet_Status'].'</td>
			
												<td>'.$veteransArray[$indx]['OIF_OEF'].'</td>
				
												<td>'.$veteransArray[$indx]['Less_AMI'].'</td>
					
												<td>'.$veteransArray[$indx]['Head_HH'].'</td>
						
												<td>'.$veteransArray[$indx]['Children'].'</td>
							
												<td>'.$veteransArray[$indx]['Eligible_SSVF'].'</td>
								
												<td>'.$veteransArray[$indx]['Entry_Dt'].'</td>
									
												<td>'.$veteransArray[$indx]['Exit_Dt'].'</td>												
												
												<td>'.$veteranEditLink.'</td>
												
											</tr>	';			     
								}
							echo '</table>';
							//		END:  Table of veterans records
							}	
																				
																								
							echo '</div>';		//		END:  <div style="margin-left: 100; ">
							
					echo '</div>';				//		END:	<div style=" font-family...">
		
			//		END: Output section 
			}
				
		} else {

			{	//	Select state from dropdowm
				
				$state_SQLselect = "SELECT *";
				$state_SQLselect .= "FROM ";
				$state_SQLselect .= "state ";
				$state_SQLselect .= "Order By State_Desc ";
					
				$state_SQLselect_Query = mysql_query($state_SQLselect);	
				
				echo '<form action="'.$thisScriptName.'" method="post">';
				
				echo '<select name="state_ID">';
				
					echo '<option value="0" label="coyvalue" selected="selected">Select State</option>';
			 	
						while ($row = mysql_fetch_array($state_SQLselect_Query, MYSQL_ASSOC)) {
						    $State_ID = $row['State_ID'];
						    $State_Desc = $row['State_Desc'];
						    
						    echo '<option value="'.$State_ID.'">'.$State_Desc.'</option>';
						}
					
						mysql_free_result($state_SQLselect_Query);		
				
						echo '</select>';
				
						echo '<input type="submit" />';
						
				echo '</form>';
				//	END:  Select state from Dropdown
			}
			
		}
		
//		END:	if ($dbSuccess)
}

echo "<br /><hr /><br />";

unset($stateID);
echo '<a href="companyListOrder.php">Company List</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="'.$thisScriptName.'">Select Another</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="../index.php">Quit - to homepage</a>';

?>