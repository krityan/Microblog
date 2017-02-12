<?php 
class Messages_model extends CI_Model {

	//loads the database when the model is loaded
	public function __construct() 
	{
		parent::__construct();
		$this->load->database();
	}
	
	//returns an array of all messages posted by the username provided
	public function getMessagesByPoster($name)
	{
		$sql = "SELECT user_username,text,posted_at FROM Messages WHERE user_username = ? ORDER BY posted_at DESC";
		$query = $this->db->query($sql,$name);
		$result = $query->result_array();
		return $result;
	}
	
	//returns an array of all messages where the text contains the string provided
	public function searchMessages($string)
	{
		$string = "%".$string."%";
		$sql = "SELECT user_username,text,posted_at FROM Messages WHERE text LIKE ? ORDER BY posted_at DESC";
		$query = $this->db->query($sql,$string);
		$result = $query->result_array();
		return $result;
	}
	
	//inserts a new entry into the messages table, returns true if it succeeds. 
	public function insertMessage($poster, $string)
	{
		$time = date('Y:m:d h:i:s');
		$sql = "INSERT INTO Messages SET user_username=?, text=?, posted_at=?";
		$query = $this->db->query($sql, array($poster, $string, $time));
		return ($this->db->affected_rows() > 0);
	}
	
	//returna an array of all messages where the provided user is followed the one who posted the message
	public function getFollowedMessages($name)
	{
		$sql = "SELECT user_username,text,posted_at FROM Messages,User_Follows WHERE follower_username = ? AND followed_username = user_username ORDER BY posted_at DESC";
		$query = $this->db->query($sql, $name);
		return $query->result_array();
	}
}
?>