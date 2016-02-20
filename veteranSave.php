
<?php
/*

*	File:			veteranSave.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from veteranDetails_Entry.php
*	and processes it
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

if ($dbSuccess) {
		
		{  //   collect the data with $_POST
		
			$Last_Name = $_POST['Last_Name'];	
			$First_Name = $_POST['First_Name'];	
			$SSN = $_POST['SSN'];	
			$State_ID = $_POST['State_ID'];	
			$City = $_POST['City'];	
			$Contact_No = $_POST['Contact_No'];	
			
			$Gender = $_POST['Gender'];	
			$Vet_Status = $_POST['Vet_Status'];	
			
			$OIF_OEF = $_POST['OIF_OEF'];	
			$Less_AMI = $_POST['Less_AMI'];
			$Head_HH = $_POST['Head_HH'];	
			
			$Children = $_POST['Children'];	
			$Eligible_SSVF = $_POST['Eligible_SSVF'];
			$Entry_Dt = $_POST['Entry_Dt'];
			$Exit_Dt = $_POST['Exit_Dt'];	
			
			$Ineligibility_ID = $_POST['Ineligibility_ID'];
			$Office_ID = $_POST['Office_ID'];	
			$Destination_ID = $_POST['Destination_ID'];	
			$H_Sub_ID = $_POST['H_Sub_ID'];	
			$Area_ID = $_POST['Area_ID'];	
			
			$Staff_ID = $_POST['Staff_ID'];	
		
			$Ethinicity_ID = $_POST['Ethinicity_ID'];	
			
			$Race_ID = $_POST['Race_ID'];
			
			$Category_ID = $_POST['Category_ID'];	
			$Income_ID = $_POST['Income_ID'];
			$Operation_ID = $_POST['Operation_ID'];
			$Referral_ID = $_POST['Referral_ID'];			
						
		}
			
		{  //   SQL:     $veterans_SQLinsert	
		
			$veterans_SQLinsert = "INSERT INTO veterans_details (";			
			$veterans_SQLinsert .=  "Last_Name, ";
			$veterans_SQLinsert .=  "First_Name, ";
			$veterans_SQLinsert .=  "SSN, ";
			$veterans_SQLinsert .=  "State_ID, ";
			$veterans_SQLinsert .=  "City, ";
			$veterans_SQLinsert .=  "Contact_No, ";
			
			
			$veterans_SQLinsert .=  "Gender, ";
			$veterans_SQLinsert .=  "Vet_Status, ";
				
			$veterans_SQLinsert .=  "OIF_OEF, ";	
			$veterans_SQLinsert .=  "Less_AMI, ";
			$veterans_SQLinsert .=  "Head_HH, ";
			
			
			$veterans_SQLinsert .=  "Children, ";
			$veterans_SQLinsert .=  "Eligible_SSVF, ";
			$veterans_SQLinsert .=  "Entry_Dt, ";
			$veterans_SQLinsert .=  "Exit_Dt , ";
			
			$veterans_SQLinsert .=  "Ineligibility_ID, ";
			$veterans_SQLinsert .=  "Office_ID, ";
			$veterans_SQLinsert .=  "Destination_ID, ";
			$veterans_SQLinsert .=  "H_Sub_ID, ";
			$veterans_SQLinsert .=  "Area_ID, ";
			
			$veterans_SQLinsert .=  "Staff_ID, ";
			
			$veterans_SQLinsert .=  "Ethinicity_ID, ";
			
			$veterans_SQLinsert .=  "Race_ID, ";
			
			$veterans_SQLinsert .=  "Category_ID, ";
			$veterans_SQLinsert .=  "Income_ID, ";
			$veterans_SQLinsert .=  "Operation_ID, ";
			$veterans_SQLinsert .=  "Referral_ID "; 
			$veterans_SQLinsert .=  ") ";
			
			$veterans_SQLinsert .=  "VALUES (";
			$veterans_SQLinsert .=  "'".$Last_Name."', ";
			$veterans_SQLinsert .=  "'".$First_Name."', ";
			$veterans_SQLinsert .=  "'".$SSN."', ";
			$veterans_SQLinsert .=  "'".$State_ID."', ";
			$veterans_SQLinsert .=  "'".$City."', ";
			$veterans_SQLinsert .=  "'".$Contact_No."' , ";
			
			$veterans_SQLinsert .=  "'".$Gender."', ";
			$veterans_SQLinsert .=  "'".$Vet_Status."',  ";
			
			$veterans_SQLinsert .=  "'".$OIF_OEF."', ";		
			$veterans_SQLinsert .=  "'".$Less_AMI."', ";
			$veterans_SQLinsert .=  "'".$Head_HH."' , ";
			
			$veterans_SQLinsert .=  "'".$Children."', ";
			$veterans_SQLinsert .=  "'".$Eligible_SSVF."', ";
			$veterans_SQLinsert .=  "'".$Entry_Dt."', ";
			$veterans_SQLinsert .=  "'".$Exit_Dt."' , ";
			
			$veterans_SQLinsert .=  "'".$Ineligibility_ID."' , ";
			$veterans_SQLinsert .=  "'".$Office_ID."' , ";
			$veterans_SQLinsert .=  "'".$Destination_ID."', ";
			$veterans_SQLinsert .=  "'".$H_Sub_ID."', ";
			$veterans_SQLinsert .=  "'".$Area_ID."', ";
			
			$veterans_SQLinsert .=  "'".$Staff_ID."' , ";
			
			$veterans_SQLinsert .=  "'".$Ethinicity_ID."' , ";
			
			$veterans_SQLinsert .=  "'".$Race_ID."' , ";
			
			$veterans_SQLinsert .=  "'".$Category_ID."', ";
			$veterans_SQLinsert .=  "'".$Income_ID."', ";
			$veterans_SQLinsert .=  "'".$Operation_ID."',  ";
			$veterans_SQLinsert .=  "'".$Referral_ID."'  "; 
			$veterans_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
		if (empty($Last_Name)) {
				echo '<span style="color:red; ">Cannot add veteran with no last name.</span><br /><br />'; 
			} else {
					echo '<span style = "text-decoration: underline;">
							SQL statement:</span>
							<br />'.$veterans_SQLinsert.'<br /><br />';
							
					if (mysql_query($veterans_SQLinsert))  {	
						echo 'used to Successfully add new veteran details.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to add new veteran.</span><br /><br />';
						
					}	
			}
		}

}

echo "<br /><hr /><br />";

echo '<a href="veteranDetails_Entry.php">Enter another veteran details</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="../index.php">Quit - to homepage</a>';

?>