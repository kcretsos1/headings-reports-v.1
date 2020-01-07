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

   <h4>Authority Control and Catalog Cleanup Reports</h4>
   <br>
   <h5>First Time Author Headings</h5>
   <!--<ul class="collapse list-unstyled" id="NameHeadingsSubmenu"> -->
      <li><a href="author_Diff.php">Author Indexed - Name Headings - Differentiated</a></li>
      <li><a href="author_Undiff.php">Author Indexed - Name Headings - Undifferentiated</a></li>
	  <br>
   <h5>First Time Subject Headings</h5>
   <!--<ul class="collapse list-unstyled" id="SubjectHeadingsSubmenu"> -->
      <li><a href="subject_names_Diff.php">Subject Indexed - Name Headings - Differentiated</a></li>
	  <li><a href="subject_names_Undiff.php">Subject Indexed - Name Headings - Undifferentiated</a></li>
      <li><a href="subject_topics.php">Subject Indexed - Topic Headings</a></li>
      <li><a href="subject_titles.php">Subject Indexed - Title Headings</a></li>
	  <br>
   <h5>First Time Title Headings</h5>
   <!--<ul class="collapse list-unstyled" id="SubjectHeadingsSubmenu"> -->
      <li><a href="title_headings.php">Title Indexed - Title Headings</a></li>
	  <br>
   <h5>Blind Headings</h5>
   <!--<ul class="collapse list-unstyled" id="BlindHeadingsSubmenu"> -->
      <li><a href="blind_headings.php">Blind Headings</a></li>
	  <br><br>
	
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