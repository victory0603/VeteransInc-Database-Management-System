<?php
/*

*	File:			veteransOperationwise.php
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
      
 
      
<!--<div class="dropdown">
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
</div>
      -->
    
        <?php
        
$thisScriptName = "EditForm.php";

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
				echo header("Location: veteransOperationwise.php?operation_ID=".$operation_ID);
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

	echo '<h2 style="font-family: arial, helvetica, sans-serif;">
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
echo '<div style="margin-left: 100px; margin-right: 90px ">';				
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
              
   <!-- FOOTER -->
        <footer >
        <img src="Images/1428151255_flag_usa.png">
        
        <nav>
            <ul>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Donations</a></li>
                <li><a href="#">Volunteers</a></li>
                <li><a href="#">Careers</a></li>
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