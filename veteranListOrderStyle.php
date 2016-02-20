<?php
/*

*	File:			veteranListOrderStyle.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script is the same as companyListOrder.php
*	except with linked stylesheet
*
*
*=============================================================
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

if ($dbSuccess) {

	//	external style sheet 
	echo '<link rel="stylesheet" href="../css/alphacrm.css" type="text/css" />';
	
	$thisScriptName = 'veteranListOrderStyle.php';
	
	
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
	$header_Veteran_ID = '<a href="'.$thisScriptName.'?orderClause=Veteran_ID"><span class="tableHeader">Veteran ID</span></a>';
	$header_Last_Name = '<a href="'.$thisScriptName.'?orderClause=Last_Name"><span class="tableHeader">Last Name</span></a>';
	$header_First_Name = '<a href="'.$thisScriptName.'?orderClause=First_Name"><span class="tableHeader">First Name</span></a>';
	$header_City = '<a href="'.$thisScriptName.'?orderClause=City"><span class="tableHeader">City</span></a>';
	$header_Gender = '<a href="'.$thisScriptName.'?orderClause=Gender"><span class="tableHeader">Gender</span></a>';
	$header_Entry_Dt = '<a href="'.$thisScriptName.'?orderClause=Entry_Dt"><span class="tableHeader">Entry Date</span></a>';
    $header_Exit_Dt = '<a href="'.$thisScriptName.'?orderClause=Exit_Dt"><span class="tableHeader">Exit Date</span></a>';
	
	{	//		create a div for the whole rendering 
	echo '<div class="textNormal">';
	
		echo '<h2>Veteran List</h2>';
					
		echo '<table border="1">';	
			echo '<tr class="tableHeader" height="40px">';		
				echo '<td>'.$header_Veteran_ID.'</td>';
				
				echo '<td>'.$header_Last_Name.'</td>';
                echo '<td>'.$header_First_Name.'</td>';
				echo '<td>SSN</td>';
				echo '<td>'.$header_City.'</td>';
				echo '<td>'.$header_Gender.'</td>';
				echo '<td>'.$header_Entry_Dt.'</td>';
				echo '<td>'.$header_Exit_Dt.'</td>';

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
				$linkToList = '<a href="veteranEditForm.php?veteranID='.$Veteran_ID.'">'.$Veteran_ID.'</a>';
				
				//		Set row style
				if (($indx % 2) == 1) {$rowClass = 'class="trOdd"'; } else { $rowClass = 'class="trEven"'; }
				echo '<tr '.$rowClass.'>';
				
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
		echo ' &nbsp;&nbsp;^ click ID to edit record';

	echo '</div>';
	//		END: create a div for the whole rendering 
	}
	
	}	//		END: //		Output 
	
	mysql_free_result($veteran_SQLselect_Query);	
	
}

echo '<br /><hr /><br />';

echo '<a href="../index.php">Quit - to homepage</a>';

?>