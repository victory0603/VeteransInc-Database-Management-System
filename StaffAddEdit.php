<?php
/*

*	File:			StaffAddEdit.php
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
$thisScriptName = "StaffAddEdit.php";

if ($dbSuccess) {
		

			{	//  Get the details of the staff
					
                    $indx = 0;
                        					
					$staff_SQLselect = "SELECT * ";
					$staff_SQLselect .= "FROM ";
					$staff_SQLselect .= "staff ";

					$staff_SQLselect_Query = mysql_query($staff_SQLselect);	
					
					while ($row = mysql_fetch_array($staff_SQLselect_Query, MYSQL_ASSOC)) {

                        //		we need this to pass to staffEditForm.php
						$staffArray[$indx]['Staff_ID'] = $row['Staff_ID'];
						$staffArray[$indx]['S_First_Name'] = $row['S_First_Name'];
						$staffArray[$indx]['S_Last_Name'] = $row['S_Last_Name'];
						
						$staffArray[$indx]['username'] = $row['username'];
						$staffArray[$indx]['password'] = $row['password'];
						$staffArray[$indx]['Office_ID'] = $row['Office_ID'];
						$staffArray[$indx]['Staff_Type_ID'] = $row['Staff_Type_ID'];

                        $indx++;
														 
					}	
                    
                    $numStaff = sizeof($staffArray);
                        				
					mysql_free_result($staff_SQLselect_Query);			
			}
	
		
			{	//		Output 

					$tdOdd = 'style = "background-color: #FF8F8F;"';
					$tdEven = 'style = "background-color: #76E9FF;"';
					
					echo '<div style=" font-family: arial, helvetica, sans-serif; ">';
		
							{	//		Table to render staff
							echo 	  '<table>
											<tr valign="top">								
												<td style=" font-size: 24; 
																font-weight: bold;" 
																>
                                                                <br>
														        Staff Details Report
                                                                <br><br>
												</td>
											</tr>
										</table>';
							//		END: Table to render staff detail
							}
															
							echo '<div style="margin-left: 100; ">';
				
							{	//		Table of staff records
							echo '<table border="1" padding="5">';
								echo '<tr>
											<td><strong>Staff ID</td>
											<td><strong>First Name</td>
											<td><strong>Last Name</td>
											<td><strong>Username</td>
                                            <td><strong>Password</td>
                                            <td><strong>Office ID</td>
                                            <td><strong>Staff Type ID</td>
											<td width="90"></td>
										</tr>	';	
																		
								for ($indx = 0; $indx < $numStaff; $indx++) {
									$thisID = $staffArray[$indx]['Staff_ID'];
									$staffEditLink = '<a href="staffEditForm.php?staff_ID='.$thisID.'">Edit</a>';
                                    $staffDeleteLink = '<a href="staffDeleteForm.php?staff_ID='.$thisID.'">Delete</a>';
									
		        					if (($indx % 2) == 1) {$rowClass = $tdOdd; } else { $rowClass = $tdEven; }  
		 
									echo '<tr '.$rowClass.' height="20">
									
												<td>'.$staffArray[$indx]['Staff_ID'].'</td>
												
												<td>'.$staffArray[$indx]['S_First_Name'].'</td>
		
												<td>'.$staffArray[$indx]['S_Last_Name'].'</td>
		
												<td>'.$staffArray[$indx]['username'].'</td>

                                                <td>'.$staffArray[$indx]['password'].'</td>

                                                <td>'.$staffArray[$indx]['Office_ID'].'</td>

                                                <td>'.$staffArray[$indx]['Staff_Type_ID'].'</td>
												
												<td>'.$staffEditLink.'</td>

                                                <td>'.$staffDeleteLink.'</td>

                                                
												
											</tr>	';			     
								}
							echo '</table>';
							//		END:  Table of staff records
							}	
																				
							{	//		FORM to INSERT staff		

								{	//		Create the staffAdd form fields
						
								$fld_S_First_Name = '<input type="text" name="S_First_Name"  size="10" maxlength="50"/>';
								$fld_S_Last_Name = '<input type="text" name="S_Last_Name"  size="10" maxlength="50"/>';
								$fld_username = '<input type="text" name="username"  size="10" maxlength="50"/>';
                                $fld_password = '<input type="text" name="password"  size="10" maxlength="50"/>';	
                                $fld_Office_ID = '<input type="text" name="Office_ID"  size="10" maxlength="50"/>';	
                                $fld_Staff_Type_ID = '<input type="text" name="Staff_Type_ID"  size="10" maxlength="50"/>';				
								
		{	//	create the Staff_Type_ID DROPDOWN  FIELD 
			$staffType_ID_SQL =  "SELECT Staff_Type_Desc FROM staff_type ";
			$staffType_ID_SQL .= "ORDER By Staff_Type_Desc ";
			
			$staffType_ID_SQL_Query = mysql_query($staffType_ID_SQL);	

			$fld_Staff_Type_ID = '<select name="Staff_Type_ID">';
	 	
				while ($row = mysql_fetch_array($staffType_ID_SQL_Query, MYSQL_ASSOC)) {
				    $staff_Type_Desc_Value = $row['Staff_Type_Desc'];
				    
				    $fld_Staff_Type_ID .= '<option'."".'>'.$staff_Type_Desc_Value.'</option>';
				}
			
				mysql_free_result($staffType_ID_SQL_Query);		
	
			$fld_Staff_Type_ID .= '</select>';
			
		//	END: create the Staff Type DROPDOWN  FIELD 
		}	


								
								
								//		END: Create the staffAdd form fields
								
								
								}						

							echo '<form action="staffInsert.php" method="post">';
								
								echo '<table>';		
										echo '<tr>
												<td colspan="10"></td>
											</tr>	';	
										echo '<tr>
												<td colspan="5"><hr /></td>
											</tr>	';	
										echo '<tr>
												<td colspan="5"></td>
											</tr>	';	
										echo '<tr>
												<td>'.$fld_S_First_Name.'</td>
												<td>'.$fld_S_Last_Name.'</td>
												<td>'.$fld_username.'</td>
												<td>'.$fld_password.'</td>
                                                <td>'.$fld_Office_ID.'</td>
                                                <td>'.$fld_Staff_Type_ID.'</td>
												<td><input type="submit" value="Add" /></td>
											</tr>	';	
								echo '</table>';
							echo '</form>';
							//		END: FORM to INSERT staff		
							}
																								
							echo '</div>';		//		END:  <div style="margin-left: 100; ">
							
					echo '</div>';				//		END:	<div style=" font-family...">
		
			//		END: Output section 
			}
				
		} 
		
//		END:	if ($dbSuccess)

echo "<br /><hr /><br />";

unset($companyID);
echo '<a href="companyListOrder.php">Company List</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="'.$thisScriptName.'">Select Another</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="../index.php">Quit - to homepage</a>';

?>