<?php
   $start = time(); //start week range
   $end = time(); // end week range
   $next = 0; // flag
   
   //loop through each week range, from newest to oldest
   $loops = 100;
   
	//$month_ini = new DateTime("first day of last month");
	//$month_end = new DateTime("last day of last month");

	//echo $month_ini->format('m-d-Y'); // 2012-02-01
	//echo $month_end->format('m-d-Y'); // 2012-02-29  
   
   for ($i = 0; $i <= $loops; $i++) {

   	  $start = strtotime('first day of last month', $start); //Example: 05-27-2019
   	  $end = strtotime('first day of this month', $end); //Example: 06-03-2019
   	  //$last_week[] = date("m-d-Y", $start); // create "start" range for "last week"
   	  //$this_week[] = date("m-d-Y", $end); // create "end" range for "this week"
	  
   	  //$start = new DateTime("first day of last month"); //Example: 05-27-2019
   	  //$end = new DateTime("last day of last month"); //Example: 06-03-2019	  
	  $last_month[]= date("m-d-Y", $start); // create "start" range for "last week"
   	  $this_month[] = date("m-d-Y", $end); // create "end" range for "this week"
	  
   	  // if this is the 1st loop, use the most recent week range as "this week"	
   	  if ($next == 0) {
   		$this_month[$i] = $this_month[0];
   	  }
   	  else {
   		$this_month[$i] = $last_month[$next-1]; // else use "last week" of previous loop as "this week"
   	  }
   	  $menu[] = $last_month[$i].' to '.$this_month[$i];
   	  $next = $next + 1; 
   // "this week" will become "last_week" for next loop
   //next week range will be 05-20-2019 to 05-27-2019
   
   	  //SQL WHERE Limits based on week index
   	  //$month_query[] = " AND ((c.process_gmt <= date_trunc('WEEK',now())::DATE - '".$i." week'::INTERVAL)  AND (c.process_gmt > date_trunc('WEEK',now())::DATE - '".$next." week'::INTERVAL)) ";
	  $query[] = " AND ((c.process_gmt <= date_trunc('MONTH',now())::DATE - '".$i." month'::INTERVAL)  AND (c.process_gmt > date_trunc('MONTH',now())::DATE - '".$next." month'::INTERVAL)) ";
	  //$next = 2;
	  //$month_query[] = " AND ((c.process_gmt <= date_trunc('WEEK',now())::DATE - '".$i." week'::INTERVAL)  AND (c.process_gmt > date_trunc('WEEK',now())::DATE - '".$next." week'::INTERVAL)) ";
	  
   	}
   ?>