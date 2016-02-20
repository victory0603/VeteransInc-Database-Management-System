<?php
/*

*	File:			veteranDetails_Entry.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script defines an HTML form using php 
*	for user to enter veteran details - POST to veteranSave.php
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
				//echo "DB SELECTED";
			} else {
				echo "DB Selection FAILed";
			}
		} else {
				echo "MySQL Connection FAILed";
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {

	echo '<h2 style="font-family: arial, helvetica, sans-serif;" align="center" >
				New Veteran Entry Form
			</h2>';

	echo "<br />";
	
	{	//	create the Ineligibility DROPDOWN  FIELD 
			$ineligibilityList_SQL =  "SELECT Ineligibility_ID, Ineligibility_Desc FROM ineligibility ";
			$ineligibilityList_SQL .= "ORDER By Ineligibility_Desc ";
			
			$ineligibilityList_SQL_Query = mysql_query($ineligibilityList_SQL);	

			$fld_ineligibilityID = '<select name="Ineligibility_ID">';
			$fld_ineligibilityID .= '<option value="0" selected="selected">Select Ineligibility Reason</option>';
	 	
			while ($row = mysql_fetch_array($ineligibilityList_SQL_Query, MYSQL_ASSOC)) {
					    $dd_ineligibilityID = $row['Ineligibility_ID'];
						 $dd_ineligibility_desc = $row['Ineligibility_Desc'];
				     
						 $fld_ineligibilityID .= '<option value="'.$dd_ineligibilityID.'">'.$dd_ineligibility_desc.'</option>';		    
		  
				}
			
				mysql_free_result($ineligibilityList_SQL_Query);		
	
			$fld_ineligibilityID .= '</select>';
			
		//	END: create the Ineligibility Reason DROPDOWN  FIELD 
		}	
	
	{	//	create the Area DROPDOWN  FIELD 
			$areaList_SQL =  "SELECT Area_ID, Area_Desc FROM area ";
			$areaList_SQL .= "ORDER By Area_Desc ";
			
			$areaList_SQL_Query = mysql_query($areaList_SQL);	

			$fld_areaID = '<select name="Area_ID">';
			$fld_areaID .= '<option value="0" label="coyvalue" selected="selected">Select Area Type</option>';
	 	
			while ($row = mysql_fetch_array($areaList_SQL_Query, MYSQL_ASSOC)) {
					    $dd_areaID = $row['Area_ID'];
						 $dd_area_desc = $row['Area_Desc'];
				     
						 $fld_areaID .= '<option value="'.$dd_areaID.'">'.$dd_area_desc.'</option>';		    
		  
				}
			
				mysql_free_result($areaList_SQL_Query);		
	
			$fld_areaID .= '</select>';
			
		//	END: create the Area DROPDOWN  FIELD 
		}	
		{	//	create the Race DROPDOWN  FIELD 
			$raceList_SQL =  "SELECT Race_ID, Race_Desc FROM race ";
			$raceList_SQL .= "ORDER By Race_Desc ";
			
			$raceList_SQL_Query = mysql_query($raceList_SQL);	

			$fld_raceID = '<select name="Race_ID">';
			$fld_raceID .= '<option value="0" label="coyvalue" selected="selected">Select Race Type</option>';
	 	
			while ($row = mysql_fetch_array($raceList_SQL_Query, MYSQL_ASSOC)) {
					    $dd_raceID = $row['Race_ID'];
						 $dd_race_desc = $row['Race_Desc'];
				     
						 $fld_raceID .= '<option value="'.$dd_raceID.'">'.$dd_race_desc.'</option>';		    
		  
				}
			
				mysql_free_result($raceList_SQL_Query);		
	
			$fld_raceID .= '</select>';
			
		//	END: create the Race DROPDOWN  FIELD 
		}
			{	//	create the Category DROPDOWN  FIELD 
			$categoryList_SQL =  "SELECT Category_ID, Category_Desc FROM category ";
			$categoryList_SQL .= "ORDER By Category_Desc ";
			
			$categoryList_SQL_Query = mysql_query($categoryList_SQL);	

			$fld_categoryID = '<select name="Category_ID">';
			$fld_categoryID .= '<option value="0" label="coyvalue" selected="selected">Select Category Type</option>';
	 	
			while ($row = mysql_fetch_array($categoryList_SQL_Query, MYSQL_ASSOC)) {
					    $dd_categoryID = $row['Category_ID'];
						 $dd_category_desc = $row['Category_Desc'];
				     
						 $fld_categoryID .= '<option value="'.$dd_categoryID.'">'.$dd_category_desc.'</option>';		    
		  
				}
			
				mysql_free_result($categoryList_SQL_Query);		
	
			$fld_categoryID .= '</select>';
			
		//	END: create the Category DROPDOWN  FIELD 
		}	
		{	//	create the Operation DROPDOWN  FIELD 
			$operationList_SQL =  "SELECT Operation_ID, Operation_Location FROM operation ";
			$operationList_SQL .= "ORDER By Operation_Location ";
			
			$operationList_SQL_Query = mysql_query($operationList_SQL);	

			$fld_operationID = '<select name="Operation_ID">';
			$fld_operationID .= '<option value="0" label="coyvalue" selected="selected">Select Operational location</option>';
	 	
			while ($row = mysql_fetch_array($operationList_SQL_Query, MYSQL_ASSOC)) {
					    $dd_operationID = $row['Operation_ID'];
						 $dd_operation_location = $row['Operation_Location'];
				     
						 $fld_operationID .= '<option value="'.$dd_operationID.'">'.$dd_operation_location.'</option>';		    
		  
				}
			
				mysql_free_result($operationList_SQL_Query);		
	
			$fld_operationID .= '</select>';
			
		//	END: create the Operation DROPDOWN  FIELD 
		}
		{	//	create the State DROPDOWN  FIELD 
			$stateList_SQL =  "SELECT State_ID, State_Desc FROM state ";
			$stateList_SQL .= "ORDER By State_Desc ";
			
			$stateList_SQL_Query = mysql_query($stateList_SQL);	

			$fld_stateID = '<select name="State_ID">';
			$fld_stateID .= '<option value="0" label="coyvalue" selected="selected">Select State</option>';
	 	
			while ($row = mysql_fetch_array($stateList_SQL_Query, MYSQL_ASSOC)) {
					    $dd_stateID = $row['State_ID'];
						 $dd_state_desc = $row['State_Desc'];
				     
						 $fld_stateID .= '<option value="'.$dd_stateID.'">'.$dd_state_desc.'</option>';		    
		  
				}
			
				mysql_free_result($stateList_SQL_Query);		
	
			$fld_stateID .= '</select>';
			
		//	END: create the State DROPDOWN  FIELD 
		}	
		
	{	//		FORM postVeteran 
		echo '<img src="../../forms/pic.png" style="position:fixed; right:30px; top:30px; border:none;" float: left />';		
		echo '<form name="postVeteran" action="veteranSave.php" method="post">';
		
				echo '
				<table>
						<tr>
							<td>Last Name</td>
							<td><input type="text" name="Last_Name" /></td>
							</tr>
					
					<tr>
						<td>First Name</td>
						<td><input type="text" name="First_Name" /></td>
						</tr>
						
						<td>SSN</td>
						<td><input type="text" name="SSN" /></td>
						</tr>
						
						<!--<td>State</td>
						<td><input type="text" name="State" /></td>
						</tr>
						<tr>-->
							<td>State</td>
							<td>'.$fld_stateID.'</td>
						</tr>
	
						<td>City</td>
						<td><input type="text" name="City" /></td>
						</tr>
	
						<td>Contact Number</td>
						<td><input type="text" name="Contact_No" /></td>					
						</tr>
						
						<!--<td>Gender</td>
						<td><input type="text" name="Gender" /></td>
					   </tr>-->
					   <td>Gender</td>
						<td><label for="male">Male</td>
						<td><input type="radio" name="Gender" id="male" value="male" checked="checked" style="margin-left: -320" /></td>
						<td><label for="female" style="margin-left: -300"/>Female</td>
						<td><input type="radio" name="Gender" id="female" value="female" style="margin-left: -240" /></td>
					   </tr>
					    
						<!--<td>Veteran Status</td>
						<td><input type="text" name="Vet_Status" /></td>-->
						<td>Veteran Status</td>
						<td><label for="yes"  >Yes</td>
						<td><input type="radio" name="Vet_Status" value="yes"style="margin-left: -320" /></td>
						<td><label for="no" style="margin-left: -300"/>No</td>
						<td><input type="radio" name="Vet_Status" value="no"style="margin-left: -270"  /></td>
						</tr>

						<!--<td>OIF/OEF</td>
						<td><input type="text" name="OIF_OEF" /></td>
						</tr>
						
						<td>Less than 30% AMI</td>
						<td><input type="text" name="Less_AMI" /></td>
						</tr>
											
						<td>Head of the household</td>
						<td><input type="text" name="Head_HH" /></td>
						</tr>
						
						<td>Do you have Children?</td>
						<td><input type="text" name="Children" /></td>
						</tr>
						
	 				<td>Eligible for SSVF?</td>
						<td><input type="text" name="Eligible_SSVF" /></td>
					   </tr> -->
					   <tr>
						<td>OIF/OEF</td>
					   <td><label for="yes">Yes</td>
						<td><input type="radio" name="OIF_OEF" value="yes"style="margin-left: -320" /></td>
						<td><label for="no" style="margin-left: -300"/>No</td>
						<td><input type="radio" name="OIF_OEF" value="no" style="margin-left: -270" /></td>
						</tr>
						
						<tr>
						<td>Less than 30% AMI</td>
					   <td><label for="yes">Yes</td>
						<td><input type="radio" name="Less_AMI" value="yes"style="margin-left: -320" /></td>
						<td><label for="no" style="margin-left: -300"/>No</td>
						<td><input type="radio" name="Less_AMI" value="no" style="margin-left: -270" /></td>
						</tr>
						
						<tr>					
						<td>Head of the household? </td>
						<td><label for="yes">Yes</td>
						<td><input type="radio" name="Head_HH" value="yes" style="margin-left: -320" /></td>
						<td><label for="no" style="margin-left: -300"/>No</td>
						<td><input type="radio" name="Head_HH" value="no" style="margin-left: -270" /></td>
						</tr>
						
						<tr>
						<td>Do you have Children?</td>
						<td><label for="yes">Yes</td>
						<td><input type="radio" name="Children" value="yes" style="margin-left: -320" /></td>
						<td><label for="no" style="margin-left: -300"/>No</td>
						<td><input type="radio" name="Children" value="no" style="margin-left: -270"/></td>
						</tr>
						
						<tr>
						<td>Eligible for SSVF?</td>
						<td><label for="yes">Yes</td>
						<td><input type="radio" name="Eligible_SSVF" value="yes" style="margin-left: -320" /></td>
						<td><label for="no"style="margin-left: -300"/>No</td>
						<td><input type="radio" name="Eligible_SSVF" value="no" style="margin-left: -270" /></td>
					   </tr>
					   
						
						</tr>
						
						<td>Entry Date</td>
						<td><input type="text" name="Entry_Dt" /></td>
						</tr>
						
						<td>Exit Date</td>
						<td><input type="text" name="Exit_Dt" /></td>
						</tr>
						
						<!--<td>Ineligibility reason</td>
						<td><input type="text" name="Ineligibility_ID" /></td>
						</tr> -->
						 <td>Ineligibility Reason </td>
						<td>'.$fld_ineligibilityID.'  </td></tr>
											
						<td>Destination</td>
						<td><input type="text" name="Destination_ID" /></td>
						</tr>
						
						<td>Housing Subsidy</td>
						<td><input type="text" name="H_Sub_ID" /></td>
						</tr>
											
						<!--<td>Area</td>
						<td><input type="text" name="Area_ID" /></td>
						</tr> -->
						<tr>					
						<td>Area</td>
						<td>'.$fld_areaID.'</td>
						</tr>
						
						<td>Staff</td>
						<td><input type="text" name="Staff_ID" /></td>
						</tr>
						
						<td>Ethinicity</td>
						<td><input type="text" name="Ethinicity_ID" /></td>
						</tr>
						
						<!--<td>Race</td>
						<td><input type="text" name="Race_ID" /></td>
						</tr> -->
						<tr>
						<td>Race</td>
						<td>'.$fld_raceID.'</td>
						</tr>
						
						<!--<td>Category</td>
						<td><input type="text" name="Category_ID" /></td>
						</tr> -->
						<tr>
						<td>Category</td>
						<td>'.$fld_categoryID.'</td>
						</tr>
						
						<td>Income Source</td>
						<td><input type="text" name="Income_ID" /></td>
						</tr>
						
						<!--<td>Operational Area</td>
						<td><input type="text" name="Operation_ID" /></td>
						</tr> -->
						<tr>
						<td>Operational Location</td>
						<td>'.$fld_operationID.'</td>
						</tr>
						
						<tr>
						<td></td>
						<td align="right"><input type="submit"  value="Save" /></td>
						</tr>
				</table>
				';
					
		echo '</form>';
	}

}
echo "<br /><hr /><br />";


echo '<a href="../index.php">Quit - to homepage</a>';

?>