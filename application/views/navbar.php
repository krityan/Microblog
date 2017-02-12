<!-- the navbar that appears at the top of every page -->

<ul id='navbar'>
	<?php if($this->session->loggedin) 
	{ ?>
		<li><a href=<?php echo base_url()."index.php/user/logout"?>>Logout</a></li>
	<?php } 
	else 
	{ ?>
		<li><a href=<?php echo base_url()."index.php/user/login"?>>Login</a></li>
	<?php } ?>
	<li><a href=<?php echo base_url()."index.php/search"?>>Search</a></li>
	<li><a href=<?php echo base_url()."index.php/message"?>>Post</a></li>
	<li><a href=<?php echo base_url()."index.php/user/feed/".$this->session->username?>>Feed</a></li>
</ul>