<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Search</title>
<link rel="stylesheet" type="text/css" href=<?php echo base_url()."css/style.css"?>>
</head>
<body>
	<!-- loading navbar -->
	<?php $this->load->view('navbar'); ?>
	<!-- visible title of the page -->
	<h2 id="titling">Search</h2>
	<div id="content">
	<!-- form for entering text to search for -->
	<form id="entryform" action=<?php echo base_url()."index.php/search/doSearch"?> method="get">
		<input type="text" name="searchS"> <br />
		<input type="submit" value="Submit">
	</form>
	</div>
</body>
</html>