<!DOCTYPE html>
<html>
<head>
<title>Catalog Cleanup and Authority Control Tools</title>
<!--<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1812745-6', 'auto');
  ga('send', 'pageview');

</script>
-->
		<?php
			require('time/weeks.php');
			//require('time/months.php');
			require('config/db.php'); //DB creds
			require('functions/first_time_functions.php'); //Functions
			ini_set('memory_limit', '1024M'); //increase memory limit if needed	
			$filename = "queries/subject_topics.sql"; //SQL file
			$baseURL = "subject_topics.php"; //PHP file
		?>
		
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-1812745-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-1812745-6');
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/grid/">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
				<script src="https://code.jquery.com/jquery-3.4.0.js" ></script>	

      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	  <!-- UD Custom CSS -->
      <link rel="stylesheet" href="css/stylesheet.css">
	  <!-- Our Custom CSS -->
	  <<link rel="stylesheet" href="css/custom1.css">
</head>
<style>
</style>

<body>
		<?php 
			include('includes/header.php');
		?>
		
<!-- start wrapper -->
<div class="d-flex" id="wrapper">
    <!-- start page content wrapper -->
    <div id="page-content-wrapper">
		<!-- start container fluid -->
      <div class="container-fluid">

   <h5>Subject Indexed - Topic Headings Report</h5>


   <form action="subject_topics.php">
      <select name="m">
         <?php for($i=0; $i< count($menu); $i++) { ?>
         <option value="<?php echo $i;?>" <?php if (isset($_GET['m']) && ($_GET['m'] == $i)) echo ' selected="selected"'; ?>> <?php echo $menu[$i];?></option>
         <?php } ?>		
      </select>
      <button type="submit" class="btn btn-primary">Submit</button>
   </form>
   <a href="menu.php">Main Menu</a>
   <br>
   <?php
      //CONNECT TO DATABASE.
      $connection = pg_connect("host=$host dbname=$database port=$port user=$user password=$password") 
      	or die("Failed to create connection to database: ". pg_last_error(). "<br/>");	
      
      // GET FORM SELECTION
      if (ISSET($_GET['m']))  {				
      	$m = $_GET['m']; // week index
      	$url = clean(getURL($baseURL,$m)); // remove unwanted characters
      	$max = count($menu);
      	checkInterval($m, $max); // remove unwanted numbers for URL
      	
      		// GET MENU CRITERIA BASED ON SELECTION
      		for ($i = 0; $i < count($menu); $i++) {
      			if ($m == $i) {
      				$interval = $query[$m]; // menu array option
      			}
      		}
      
      		// READ SQL FILE depending on week selected
      		$sort = " ORDER BY 1 ASC ";	// sort order in SQL query				
      		$query = readQuery($filename, $interval, $sort);
      
      		//GET SQL HEADING RESULTS
      		$results = pg_query($query);
      		if (!$results) {
      			echo "An error occurred.\n";
      			exit;
      		}
      		
      		$headings = pg_fetch_all($results);	
      		
      		//PRINT RESULTS
      		tableHeaders();			
      		printTable($headings);			
      	
      }
      //CLOSE DATABASE
      pg_close($connection);
	?>	  
	
      </div> <!-- end container fluid -->
    </div>
	<!-- end page content wrapper -->
  
	</div>
	<!-- end  wrapper -->

</div>	
<!-- end  container -->	

<?php 
	include('includes/footer.php');
?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>