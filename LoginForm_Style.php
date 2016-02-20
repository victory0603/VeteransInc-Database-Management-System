
<?php
	
/*

*	File:			loginForm.php
*		folder:	/forms/
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script is the login FORM for alpha CRM
*
*
*============================================================
*/

{ 		//	Secure Connection Script
		include('../../htdocs/forms2/dbConfig1.php'); 
		$dbSuccess = false;
		$dbConnected = mysql_connect($db['hostname'],$db['username'],$db['password']);
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db($db['database'],$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
				//echo 'DB connected ';
			} 	
		}
		//	END	Secure Connection Script
}

$thisScriptName = "LoginForm_Style.php";

//echo "<center><span><h2>Login Form for Veterans</h2></span></center>";
					
//echo '<h2>Login Form for Veterans</h2>';

	//$username = $_POST['username'];
		//$image_file = 'testImage.png';
		//$image_path = '../images/'.$image_file;
	if(isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		//$md5Password = md5($password);
		
		
		
		{	//		SELECT password for this user from the DB and see it it matches 
			$tUser_SQLselect = "SELECT password FROM staff ";
			$tUser_SQLselect .= "WHERE username = '".$username."' ";	

       //  $tUser_SQLselect = "SELECT password FROM staff WHERE username = '".$username."' ";	
			$tUser_SQLselect_Query = mysql_query($tUser_SQLselect); 	
			while ($row = mysql_fetch_array($tUser_SQLselect_Query, MYSQL_ASSOC)) {
			    $passwordRetrieved = $row['password'];
			    
			    
			  //  echo "passwordRetrieved = ".$passwordRetrieved."<br />";
			  //  echo "password = ".$md5Password."<br />";
			}
			mysql_free_result($tUser_SQLselect_Query);
						
			//if (!empty($passwordRetrieved) AND ($md5Password == $passwordRetrieved)) {
				if (!empty($passwordRetrieved) AND ($password == $passwordRetrieved)) {
				header('Location: http://localhost/Lynn/Report.php');
					
					$S_username = strtoupper($username);					
					echo "<h3>WELCOME ".$S_username."</h3></br>";
					//echo " ".$username."<br /><br /><br />";
					
					
					//echo '<h3>WELCOME </h3> <br /><br />';
					echo '<a href="http://localhost/Lynn/HomePage.php">Logout</a></br></br></br>';	
					
					echo '<a href="http://localhost/Lynn/veteranDetails_Entry.php">INPUT FORMS</a></br></br></br>';	
					
					
					
					
								
			} else {
				echo "Access denied.<br /><br />";		
				echo '<a href="'.$thisScriptName.'">Try again</a>';			
			}
		}
		
	} else {
		
	

		//echo '<img src="../../forms/pic.png" style="position:fixed; right:30px; top:30px; border:none;" float: left />';
		
	/*	echo '<form name="postLoginHid" action="'.$thisScriptName.'" method="post" align="center">';	
				echo '
				
					<P>User name: 
					<INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16 ></P>
					<P>Password: 
					<INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
					<input type="submit"  value="Login" />
				';
		echo '</form>'; */

	}
	
//echo '<h2>--------- END Login Form --------</h2>';

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
    <link href="css/login.css" rel="stylesheet">
      
        
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
        <li class="active"><a href="http://www.veteransinc.org/about-us/">ABOUT US <span class="sr-only">(current)</span></a></li>
        <li><a href="#">SERVICES</a></li>
         <li><a href="https://interland3.donorperfect.net/weblink/weblink.aspx?name=vetsinc&id=1">DONATIONS</a></li>
         <li><a href="http://www.veteransinc.org/volunteers/">VOLUNTEERS</a></li>
       
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
      
 
      <?php
      echo '<form name="postLoginHid" action="'.$thisScriptName.'" method="post" align="center">';	
				echo '
				
					<P>User name: 
					<INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16 ></P>
					<P>Password: 
					<INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
					<input type="submit"  value="Login" />
				';
		echo '</form>'; 
      ?>
 <!--<div class="container"> 
      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">User name</label> 
        <input type="username" id="inputUserName" value="" class="form-control" placeholder="Enter Your User Name" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
		 
        <input type="password" id="inputPassword" value="" class="form-control" placeholder="Enter Your Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label> 
          
        </div>-->
      ,<!--  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button> -->
      </form>
     
   

    </div> <!-- /container -->
      
    
        
              
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