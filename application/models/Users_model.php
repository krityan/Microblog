<?php 
class Users_model extends CI_Model {

	//loads the database and session library when the model is loaded
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	//checks if the login name and password provided are present in the database, returns true if present
	public function checkLogin($user, $pass)
	{
		$password = SHA1($pass);
		$sql = "SELECT username,password FROM Users WHERE username = ? AND password = ?";
		$query = $this->db->query($sql, array($user, $password));
		$result = $query->result_array();
		return (count($result) > 0);
	}
	
	//checks if the follower is following the followed, returns true if the first user is following the second
	public function isFollowing($follower, $followed)
	{
		$sql = "SELECT * from User_Follows WHERE follower_username = ? AND followed_username = ?";
		$query = $this->db->query($sql, array($follower, $followed));
		$result = $query->result_array();
		if (empty($result))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	//enters the details of a new following, where the currently logged in user follows the user provided, returns true if successful
	public function follow($followed)
	{
		if ($this->session->loggedin)
		{
			$sql = "INSERT INTO User_Follows SET follower_username = ?, followed_username = ?";
			$query = $this->db->query($sql, array($this->session->username, $followed));
			return ($this->db->affected_rows() > 0);
		}
	}
}
?>