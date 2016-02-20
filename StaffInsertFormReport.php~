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
		
			header("Location: StaffAddEditFormReports.php?staff_ID=".$staff_ID);
			
		} else {
			
			echo '<span style="color:red; ">FAILED to add new staff.</span><br /><br />';
			echo "<br /><hr /><br />";
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			echo '<a href="HomePage.php">Quit - to homepage</a>';
			
		}	

}

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