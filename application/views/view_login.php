<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<link rel="stylesheet" type="text/css" href=<?php echo base_url()."css/style.css"?>>
</head>
<body>
	<!-- loading navbar -->
	<?php $this->load->view('navbar'); ?>
	<!-- visible title of the page -->
	<h2 id="titling">Login</h2>
	<div id="content">
	<!-- login form -->
	<form id="entryform" action=<?php echo base_url()."index.php/user/doLogin"?> method="post">
		Name:
		<input type="text" name="username"> <br />
		Password:
		<input type="password" name="pass"> <br />
		<input type="submit" value="Submit">
	</form>
	<p> <?php if ($error != null)
	{
		echo $error;
	} ?>
	</p>
	</div>
</body>
</html>