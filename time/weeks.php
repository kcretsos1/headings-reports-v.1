<?php
   $start = time(); //start week range
   $end = time(); // end week range
   $next = 0; // flag
   
   //loop through each week range, from newest to oldest
   $loops = 100;
   
   for ($i = 0; $i <= $loops; $i++) {
   	  $start = strtotime('last week', $start); //Example: 05-27-2019
   	  $end = strtotime('this week', $end); //Example: 06-03-2019
   	  $last_week[] = date("m-d-Y", $start); // create "start" range for "last week"
   	  $this_week[] = date("m-d-Y", $end); // create "end" range for "this week"
   	  
   	  // if this is the 1st loop, use the most recent week range as "this week"	
   	  if ($next == 0) {
   		$this_week[$i] = $this_week[0];
   	  }
   	  else {
   		$this_week[$i] = $last_week[$next-1]; // else use "last week" of previous loop as "this week"
   	  }
   	  $menu[] = $last_week[$i].' to '.$this_week[$i];
   	  $next = $next + 1; 
   // "this week" will become "last_week" for next loop
   //next week range will be 05-20-2019 to 05-27-2019
   
   	  //SQL WHERE Limits based on week index
   	  $query[] = " AND ((c.process_gmt <= date_trunc('WEEK',now())::DATE - '".$i." week'::INTERVAL)  AND (c.process_gmt > date_trunc('WEEK',now())::DATE - '".$next." week'::INTERVAL)) ";
   	}
   ?>