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
error_reporting(0);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Veteran Inc</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
    <link href="css/homepagestyle.css" rel="stylesheet">
       <!-- Custom styles for this template -->
    <link href="css/operation.css" rel="stylesheet">
      
        
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    
  <body>
      
      
    <nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
      <div id="logo">

            <img src="images/pic_burned.png">

        </div>

      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    
        
        <a class="navbar-brand" href="#">Veterans Inc</a>
    </div>

      
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">ABOUT US <span class="sr-only">(current)</span></a></li>
        <li><a href="#">SERVICES</a></li>
         <li><a href="#">VOLUNTEERS</a></li>
         <li><a href="#">DONATIONS</a></li>
       
      </ul>
        
      
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
         <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            <input type="text" class="form-control" placeholder="Search">
        </div>
          
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>CONTACT US</a></li>
       
      </ul>
    </div><!-- /.navbar-collapse -->
       </div><!-- /.container -->
</nav>
      
 
      <!--
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    SELECT OPERATION AREA
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Desert Storm</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Granada</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Korea</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">OEF/OIF</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Panama</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Peacetime</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Vietnam</a></li>
      
  </ul>
    <button type="submit" class="btn btn-default">Submit</button>
</div> -->

<?php

// $thisScriptName separated out as it's now used several times
$thisScriptName = "StaffAddEditFormReports.php";

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
											<tr valign="center">								
												<td style=" font-size: 24px; margin-left: 50px;
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
															
							echo '<div style="margin-left: 100px; align="center">';
				
							{	//		Table of staff records
							echo '<table border="1" padding="5">';
								echo '<tr align="center">
											<td width="90"><strong>Staff ID</td>
											<td width="90"><strong>First Name</td>
											<td width="90"><strong>Last Name</td>
											<td width="90"><strong>Username</td>
                                            <td width="90"><strong>Password</td>
                                            <td width="90"><strong>Office ID</td>
                                            <td width="90"><strong>Staff Type ID</td>
											<td width="90"></td>
											<td width="90"></td>
										</tr>	';	
																		
								for ($indx = 0; $indx < $numStaff; $indx++) {
									$thisID = $staffArray[$indx]['Staff_ID'];
									$staffEditLink = '<a href="StaffEditFormReports.php?staff_ID='.$thisID.'">Edit</a>';
                                    $staffDeleteLink = '<a href="StaffDeleteFormReports.php?staff_ID='.$thisID.'">Delete</a>';
									
		        					if (($indx % 2) == 1) {$rowClass = $tdOdd; } else { $rowClass = $tdEven; }  
		 
									echo '<tr '.$rowClass.' height="20" align = "center">
									
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

							echo '<form action="StaffInsertFormReport.php" method="post">';
								
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
											</tr>	
										<td>First Name</td>
										<td> Last Name</td>
										<td> Username</td>
										<td> Password</td>
										<td> Office ID</td>';
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

echo '<a href="'.$thisScriptName.'">Select Another</a>';
echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
echo '<a href="HomePage.php">Quit - to homepage</a>';

?>

?>
      
    
        
              
   <!-- FOOTER -->
        <footer>
        <img src="Images/1428151255_flag_usa.png">
        
        <nav>
            <ul>
                <li><a href="http://www.veteransinc.org/about-us/">About Us</a></li>
                <li><a href="https://interland3.donorperfect.net/weblink/weblink.aspx?name=vetsinc&id=1">Donations</a></li>
                <li><a href="http://www.veteransinc.org/volunteers/">Volunteers</a></li>
                
            </ul>
        </nav>
   

        <p class="pull-right"><a href="#">Back to top</a></p>

        <p>&copy; 2015 Veterans Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>

      </footer>
        

      </div><!-- /.container -->

      
 
      
       <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>