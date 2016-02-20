<?php
/*

*	File:			companyListOrderStyle.php
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
		include('../../htconfig/dbConfig.php'); 
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
	
	$thisScriptName = 'companyListOrderStyle.php';
	
	
	//		Get the sortorder with GET but default to Name
	$orderClause = $_GET["orderClause"];	
	if (!isset($orderClause)) {$orderClause = "Name"; }
	
	{	//		SELECT all companies in Name order and execute 
		$tCompany_SQLselect = "SELECT * ";
		$tCompany_SQLselect .= "FROM ";
		$tCompany_SQLselect .= "tCompany ";	
		$tCompany_SQLselect .= "ORDER BY ";
		$tCompany_SQLselect .= "tCompany.".$orderClause;

		$tCompany_SQLselect_Query = mysql_query($tCompany_SQLselect); 	

	}
	
	{	//		Output 
	
	//		make each header a link to $thisScriptName with querystring or orderclause 
	$header_ID = '<a href="'.$thisScriptName.'?orderClause=ID"><span class="tableHeader">ID</span></a>';
	$header_Name = '<a href="'.$thisScriptName.'?orderClause=Name"><span class="tableHeader">Company</span></a>';
	$header_Town = '<a href="'.$thisScriptName.'?orderClause=Town"><span class="tableHeader">Town</span></a>';
	$header_County = '<a href="'.$thisScriptName.'?orderClause=County"><span class="tableHeader">County</span></a>';
	$header_Postcode = '<a href="'.$thisScriptName.'?orderClause=Postcode"><span class="tableHeader">Postcode</span></a>';
	$header_COUNTRY = '<a href="'.$thisScriptName.'?orderClause=COUNTRY"><span class="tableHeader">COUNTRY</span></a>';
	
	{	//		create a div for the whole rendering 
	echo '<div class="textNormal">';
	
		echo '<h2>Company List</h2>';
					
		echo '<table border="1">';	
			echo '<tr class="tableHeader" height="40px">';		
				echo '<td>'.$header_ID.'</td>';
				echo '<td>&nbsp;</td>';
				echo '<td>'.$header_Name.'</td>';
				echo '<td>Address</td>';
				echo '<td>'.$header_Town.'</td>';
				echo '<td>'.$header_County.'</td>';
				echo '<td>'.$header_Postcode.'</td>';
				echo '<td>'.$header_COUNTRY.'</td>';

			echo '</tr>';
	
			$indx = 0;		//		count the rows to give alternating style 
			while ($row = mysql_fetch_array($tCompany_SQLselect_Query, MYSQL_ASSOC)) {
				
				$ID = $row['ID'];
				$preName = $row['preName'];
				$CompanyName = $row['Name'];
				$regType = $row['RegType'];				
				$CompanyFullName = trim($CompanyName." ".$regType);
				
				$StreetA = $row['StreetA'];
				$StreetB = $row['StreetB'];
				$StreetC = $row['StreetC'];			    
				$CompanyAddress = $StreetA;				
				if (!empty($StreetB)) { $CompanyAddress .=  ", ".$StreetB; }
				if (!empty($StreetC)) { $CompanyAddress .=  ", ".$StreetC; }		    
					
			   $Town = $row['Town'];
			   $County = $row['County'];
			   $Postcode = $row['Postcode'];
			   $COUNTRY = $row['COUNTRY'];
		
				//		Link to companyPeopleEdit.php?companyID=$ID
				$linkToList = '<a href="companyPeopleEdit.php?companyID='.$ID.'">'.$ID.'</a>';
				
				//		Set row style
				if (($indx % 2) == 1) {$rowClass = 'class="trOdd"'; } else { $rowClass = 'class="trEven"'; }
				echo '<tr '.$rowClass.'>';
				
					echo '<td>'.$linkToList.'&nbsp;</td>'; 
					echo '<td>'.$preName.'&nbsp;</td>'; 
					echo '<td>'.$CompanyFullName.'&nbsp;</td>';
					echo '<td>'.$CompanyAddress.'&nbsp;</td>';
					echo '<td>'.$Town.'&nbsp;</td>';
					echo '<td>'.$County.'&nbsp;</td>';
					echo '<td>'.$Postcode.'&nbsp;</td>';
					echo '<td>'.$COUNTRY.'&nbsp;</td>';
			
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
	
	mysql_free_result($tCompany_SQLselect_Query);	
	
}

echo '<br /><hr /><br />';

echo '<a href="../index.php">Quit - to homepage</a>';

?>