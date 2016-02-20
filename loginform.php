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
		include('../../htdocs/forms/dbConfig1.php'); 
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

$thisScriptName = "loginform.php";

echo "<center><span><h2>Login Form for Veterans</h2></span></center>";
					
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
				
					$S_username = strtoupper($username);					
					echo "<h3>WELCOME ".$S_username."</h3></br>";
					//echo " ".$username."<br /><br /><br />";
					
					
					//echo '<h3>WELCOME </h3> <br /><br />';
					echo '<a href="'.$thisScriptName.'">Logout</a></br></br></br>';	
					
					echo '<a href="http://localhost/forms/veteranDetails_Entry.php">INPUT FORMS</a>';	
								
			} else {
				echo "Access denied.<br /><br />";		
				echo '<a href="'.$thisScriptName.'">Try again</a>';			
			}
		}
		
	} else {
		
	

		echo '<img src="../../forms/pic.png" style="position:fixed; right:30px; top:30px; border:none;" float: left />';
		
		echo '<form name="postLoginHid" action="'.$thisScriptName.'" method="post" align="center">';	
				echo '
				
					<P>User name: 
					<INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16 ></P>
					<P>Password: 
					<INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
					<input type="submit"  value="Login" />
				';
		echo '</form>';

	}
	
//echo '<h2>--------- END Login Form --------</h2>';

?>