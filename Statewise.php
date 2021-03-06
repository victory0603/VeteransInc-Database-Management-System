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
error_reporting(0);

// $thisScriptName separated out as it's now used several times

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
    <link href="css/state.css" rel="stylesheet">
      
        
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
    SELECT STATE
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CT</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">MA</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">ME</a></li>
    <li role="presentation"><a role="menuitem" tabindex="-1" href="#">NH</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">RI</a></li>
        <li role="presentation"><a role="menuitem" tabindex="-1" href="#">VT</a></li>
      
  </ul>
    <button type="submit" class="btn btn-default">Submit</button>
</div>
    -->
 <?php   
    $thisScriptName = "Statewise.php";

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
											<tr valign="center">								
												<td style=" font-size: 24; 
																font-weight: bold;" 
																>
														'.$State_Desc.'
												</td>
												
											</tr>
										</table>';
							//		END: Table to render State
							}
															
							echo '<div style="margin-left: 100px; margin-right: 90px ">';
				
							{	//		Table of veterans records
							echo '<table border="1" padding="5">';
								echo '<tr align = "center">
											<td width = "90">Last Name</td>
											<td width = "90">First Name</td>
											<td width = "90">SSN</td>
											<td width = "90">City</td>
											<td width = "90">Contact Number</td>
											<td width = "90">Gender</td>
											<td width = "90">Veteran Status</td>
											<td width = "90">OIF/OEF</td>
											<td width = "90">Less AMI</td>
											<td width = "90">Head of Household</td>
											<td width = "90">Children</td>
											<td width = "90">Eligible for SSVF</td>
											<td width = "90">Entry Date</td>
											<td width = "90">Exit Date</td>
																			
											<td width="90"></td>
										</tr>	';	
																		
								for ($indx = 0; $indx < $numVeterans; $indx++) {
									$thisID = $veteransArray[$indx]['Veteran_ID'];
									$veteranEditLink = '<a href="veteranEditForm.php?veteranID='.$thisID.'">Edit</a>';
									
		        					if (($indx % 2) == 1) {$rowClass = $tdOdd; } else { $rowClass = $tdEven; }  
		 
									echo '<tr '.$rowClass.' height="20" align = "center">
									
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
			
			echo "<br /><hr /><br />";
			echo "<br /><hr /><br />";
			echo '<a href="'.$thisScriptName.'">Select Another</a>';
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '<a href=".HomePage.php">Quit - to homepage</a>';
			}
				
		} else {

			{	//	Select state from dropdowm
				
				$state_SQLselect = "SELECT *";
				$state_SQLselect .= "FROM ";
				$state_SQLselect .= "state ";
				$state_SQLselect .= "Order By State_Desc ";
					
				$state_SQLselect_Query = mysql_query($state_SQLselect);	
				
				echo '<form action="'.$thisScriptName.'" method="post" align="center">';
				
				echo '<select name="state_ID">';
				
					echo '<option value="0"  selected="selected">Select State</option>';
			 	
						while ($row = mysql_fetch_array($state_SQLselect_Query, MYSQL_ASSOC)) {
						    $State_ID = $row['State_ID'];
						    $State_Desc = $row['State_Desc'];
						    
						    echo '<option value="'.$State_ID.'">'.$State_Desc.'</option>';
						}
					
						mysql_free_result($state_SQLselect_Query);		
				
						echo '</select>';
				
						echo '<input type="submit" />';
						
				echo '</form>';
				
				echo "<br /><hr /><br />";
				echo '<img src="images/statesMap.jpg" class="featurette-image img-responsive center-block"  />';
				//	END:  Select state from Dropdown
			}
			
		}
		
//		END:	if ($dbSuccess)
}

echo "<br /><hr /><br />";

unset($stateID);


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