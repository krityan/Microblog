<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Messages</title>
<link rel="stylesheet" type="text/css" href=<?php echo base_url()."css/style.css"?>>
</head>
<body>
	<!-- loading navbar -->
	<?php $this->load->view('navbar'); ?>
	<!-- visible title of the page -->
	<h2 id="titling"><?php if ($name != null){ echo $name; }?></h2>
	<div id="content">
	<!-- if the user isn't following the person whose page they are visiting, then it shows a follow button -->
	<?php 
		if (!$following)
		{?> 
			<form id="followuser" action=<?php echo base_url()."index.php/user/follow/".$name?>>
				<input type="submit" value="Follow" />
			</form> 
		<?php }
	?>
	<!-- table that shows all the messages sent by the controller -->
	<table id="messagetable">
		<tr>
			<th>Message</th><th>Posted At</th><th>By</th>
		</tr>
	<?php		
		foreach ($result as $row) { ?>
			<tr>
			<td id="message"><?php echo $row['text']?></td>
			<td id="time"><?php echo $row['posted_at']?></td>
			<td id="author"><a href=<?php echo base_url()."index.php/user/view/".$row['user_username']?>><?php echo $row['user_username']?></td>
			</tr>
		<?php }
	?>		
	</table>
	</div>
</body>
</html>