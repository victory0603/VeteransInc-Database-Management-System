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
 
if ($dbSuccess) {

	//	external style sheet 
	echo '<link rel="stylesheet" href="../css/alphacrm.css" type="text/css" />';
	
	$thisScriptName = 'ListOrderStyle.php';
	
	
	//		Get the sortorder with GET but default to Last Name
	$orderClause = $_GET["orderClause"];
   
	if (!isset($orderClause)) {$orderClause = "Last_Name"; }
	
	{	//		SELECT all veterans in Last Name order and execute 
		$veteran_SQLselect = "SELECT * ";
		$veteran_SQLselect .= "FROM ";
		$veteran_SQLselect .= "veterans_details ";	
		$veteran_SQLselect .= "ORDER BY ";
		$veteran_SQLselect .= "veterans_details.".$orderClause;

		$veteran_SQLselect_Query = mysql_query($veteran_SQLselect); 	

	}
	
	{	//		Output 
	
	//		make each header a link to $thisScriptName with querystring or orderclause 
	$header_Veteran_ID = '<a href="'.$thisScriptName.'?orderClause=Veteran_ID"><span class="tableHeader" >Veteran ID</span></a>';
	$header_Last_Name = '<a href="'.$thisScriptName.'?orderClause=Last_Name"><span class="tableHeader" >Last Name</span></a>';
	$header_First_Name = '<a href="'.$thisScriptName.'?orderClause=First_Name"><span class="tableHeader">First Name</span></a>';
	$header_City = '<a href="'.$thisScriptName.'?orderClause=City"><span class="tableHeader" >City</span></a>';
	$header_Gender = '<a href="'.$thisScriptName.'?orderClause=Gender"><span class="tableHeader" >Gender</span></a>';
	$header_Entry_Dt = '<a href="'.$thisScriptName.'?orderClause=Entry_Dt"><span class="tableHeader" >Entry Date</span></a>';
    $header_Exit_Dt = '<a href="'.$thisScriptName.'?orderClause=Exit_Dt"><span class="tableHeader" >Exit Date</span></a>';
	
	{	//		create a div for the whole rendering 
	echo '<div class="textNormal">';
	
		echo '<h2>Veteran List</h2>';
					
		echo '<table border="1" align = "center">';	
			echo '<tr class="tableHeader" height="40px align = "center"">';		
				echo '<td width = "90">'.$header_Veteran_ID.'</td>';
				
				echo '<td width = "90">'.$header_Last_Name.'</td>';
                echo '<td width = "90">'.$header_First_Name.'</td>';
				echo '<td width = "90">SSN</td>';
				echo '<td width = "90">'.$header_City.'</td>';
				echo '<td width = "90">'.$header_Gender.'</td>';
				echo '<td width = "90">'.$header_Entry_Dt.'</td>';
				echo '<td width = "90">'.$header_Exit_Dt.'</td>';

			echo '</tr>';
	
			$indx = 0;		//		count the rows to give alternating style 
			while ($row = mysql_fetch_array($veteran_SQLselect_Query, MYSQL_ASSOC)) {
				
				$Veteran_ID = $row['Veteran_ID'];
				$Last_Name = $row['Last_Name'];
				$First_Name = $row['First_Name'];
				$SSN = $row['SSN'];				
			
				$City = $row['City'];
				$Gender = $row['Gender'];
				$Entry_Dt = $row['Entry_Dt'];
				$Exit_Dt = $row['Exit_Dt'];			    		
		
				//		Link to veteranEditForm.php?companyID=$ID
				$linkToList = '<a href="EditForm.php?veteranID='.$Veteran_ID.'">'.$Veteran_ID.'</a>';
				
				//		Set row style
				if (($indx % 2) == 1) {$rowClass = 'class="trOdd"'; } else { $rowClass = 'class="trEven"'; }
				echo '<tr '.$rowClass.' align = "center">';
				
					echo '<td>'.$linkToList.'&nbsp;</td>'; 
					echo '<td>'.$Last_Name.'&nbsp;</td>'; 
					echo '<td>'.$First_Name.'&nbsp;</td>';
					echo '<td>'.$SSN.'&nbsp;</td>';
					echo '<td>'.$City.'&nbsp;</td>';
					echo '<td>'.$Gender.'&nbsp;</td>';
					echo '<td>'.$Entry_Dt.'&nbsp;</td>';
					echo '<td>'.$Exit_Dt.'&nbsp;</td>';
			
				echo '</tr>';
		  
		  		$indx++;
		   //	END: while
			}

		echo '</table>';	
		echo ' &nbsp;&nbsp; Click ID to Edit Record';

	echo '</div>';
	//		END: create a div for the whole rendering 
	}
	
	}	//		END: //		Output 
	
	mysql_free_result($veteran_SQLselect_Query);	
	
}

echo '<br /><hr /><br />';

echo '<a href="HomePage.php">Quit - to homepage</a>';
 
 
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