
		<?php		
     //*********START FUNCTIONS************************************************************************************************************
      function clean($string) {
         $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
         return preg_replace('/[^A-Za-z0-9?.=&\-]/', '', $string); // Removes special chars.
      }
      
      function getURL($baseURL, $m) {
		$baseURL = $baseURL."?";
      	$u = $baseURL.http_build_query(array("m"=>$m));
      	return $u;
      }
      
      function checkInterval($m, $max) {
      	if (($m < 0)||($m > $max)) {
      		exit;
      	}
      }			
      
      function readQuery($fn, $interval, $sort) {
      	// Read the SQL file
      	$fcommand = fopen($fn, "r");
      	$q = fread($fcommand, filesize($fn));				
      	// Add criteria to SQL file query
      	$q .= $interval;
      	$q .= $sort;			
      	return $q;
      }			  
      
      function tableHeaders() {
      		// Start table headers
      		echo '<table id = "myTable">';
      		echo "<tr>";
      			echo "<th>#</th>";
      			echo "<th>Heading</th>";
      			echo "<th>MARC Tag</th>";
      			//echo "<th>Title</th>";
      			echo "<th>Record #</th>";
      			//echo "<th>OCLC #</th>";
      			echo "<th>Processing Date</th>";
      		echo "</tr>";	
      		// End table headers
      }
      function printTable($h) {
      		// Loop through each bib record element
      		$i = 0;
      		$c = $i + 1;
      		while ($i < count($h)) {
				echo '<tr>'; // start row
      				echo '<td>'.$c.'</td>';
					echo '<td>'.'<u><a href="https://id.loc.gov/search/?q='.$h[$i]['entry'].'">'.$h[$i]['entry'].'</a></u></td>';
      				echo '<td>'.$h[$i]['marc'].'</td>';
					echo '<td>'.$h[$i]['record_num'].'</td>';
      				//echo '<td>'.'<u><a href="https://flyers.udayton.edu/record='.$h[$i]['record_num'].'">'.$h[$i]['title'].'</td>';
      				//echo '<td>'.'<u><a href="https://flyers.udayton.edu/record='.$h[$i]['record_num'].'">'.$h[$i]['record_num'].'</a></u></td>';				
				    //check is control number is OCLC Number, if not do not create URL Hyperlink
				    //if (is_null($h[$i]['oclc_bool'])) {
					//	echo '<td>'.$h[$i]['oclc_num'].'</td>';
					//}
					//else {
					//	echo '<td>'.'<u><a href="https://www.worldcat.org/oclc/'.$h[$i]['oclc_num'].'">'.$h[$i]['oclc_num'].'</a></u></td>';
					//}
					echo '<td>'.$h[$i]['process_date'].'</td>';			
				echo '</tr>'; // end row
				$i++; // loop to next row
				$c++; // count + 1
			}
			echo '</table>'; // end table
			echo "<br><br>";
		}	
								
			//*********END FUNCTIONS************************************************************************************************************		
		?>								