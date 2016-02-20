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
    <title>Veteran Report</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
      <link href="css/report.css" rel="stylesheet">

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
         
      <li><form action="HomePage.php" class="logout-form" method="post"><div style="margin:0;margin-bottom:10px;padding:0;display:inline"> <button class="btn btn-default"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
      </button></div></form> 
          </li>
         </ul>
       
        
        </li> 
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>
     
      
      <!-- table -->
    
          <div class="table-responsive">
            <table class="table table-striped">
  
               <tbody>
                <tr>
                  <td action="/table" class="input-table" method="post"><span class="highlighted"><a href ="http://localhost/Lynn/veteranDetails_Entry.php">Veteran Input Forms</a></span></td>
                  <td>Enter the detail of veteran information.</td>
                    
                </tr>
                <tr>
                 <td action="/table" class="input-table" method="post"><span class="highlighted"><a href ="http://localhost/Lynn/Statewise.php">State Report</a></span></td>
                  <td>Provide reports based on veteran's state for management staff.</td>
            
                </tr>
                <tr>
                  <td action="/table" class="input-table" method="post"><span class="highlighted"><a href ="http://localhost/Lynn/Operations.php">Operation Report</a></span></td>
                  <td>Provide report based on veteran's operation area for management staff.</td>
              
                </tr>
                <tr>
                   <td action="/table" class="input-table" method="post"><span class="highlighted"><a href ="http://localhost/Lynn/StaffAddEditFormReports.php">Staff Report</a></span></td>
                  <td>Provide staff work book which records staff's efforts in an assigned work.</td>
                </tr>
                
                <tr>
                   <td action="/table" class="input-table" method="post"><span class="highlighted"><a href ="http://localhost/Lynn/ListOrderStyle.php">Orderwise Report</a></span></td>
                  <td>Provide reports in alphabetical order.</td>
                </tr>
         
              </tbody>
            </table>
          </div>
      
      <!-- /.table -->
      
      
      

   <!-- FOOTER -->
        <footer>
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

      
 
      
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>