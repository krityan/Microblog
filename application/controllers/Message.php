<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller 
{
	//initializes the controller
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	//if the user is logged in, opens the page for them to post a new message, else opens the login page
	public function index()
	{
		if($this->session->loggedin)
		{
			$this->load->view('view_post');
		}
		else 
		{
			$data = array('error' => "You must be logged in to post.");
			$this->load->view('view_login', $data);
		}
	}
	
	//called from the post page, sends the post data to the message model to be added to the database then opens the user's messages.
	public function doPost()
	{
		if($this->session->loggedin)
		{
			$this->load->model('messages_model');
			$this->messages_model->insertMessage($this->session->username, $this->input->post('postcontent'));
			redirect('/user/view/'.$this->session->username);
		}
		else 
		{
			$data = array('error' => "You must be logged in to post.");
			$this->load->view('view_login', $data);
		}
	}
}