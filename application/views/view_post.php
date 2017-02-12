<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Post</title>
<link rel="stylesheet" type="text/css" href=<?php echo base_url()."css/style.css"?>>
</head>
<body>
	<!-- loading navbar -->
	<?php $this->load->view('navbar'); ?>
	<!-- visible title of the page -->
	<h2 id="titling">Post</h2>
	<div id="content">
	<!-- form for entering text to post -->
	<form id="entryform" action=<?php echo base_url()."index.php/message/doPost"?> method="post">
		<input type="text" name="postcontent"> <br />
		<input type="submit" value="Submit">
	</form>
	</div>
</body>
</html>