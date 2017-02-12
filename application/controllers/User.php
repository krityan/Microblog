<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
	//initialises the controller
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	
	//if the name enterred is not null, gets the messages for the user and opens the messages view to display them
	public function view($name)
	{
		if ($name == null){
			echo "Error: Name cannot be null!";
		} 
		else {
			$this->load->model('messages_model');
			$this->load->model('users_model');
			$result = $this->messages_model->getMessagesByPoster($name);
			if($this->session->loggedin)
			{
				if (strcmp($name, $this->session->username) == 0)
				{
					$following = true;
				}
				else 
				{
					$following = $this->users_model->isFollowing($this->session->username, $name);
				}
			}
			else 
			{
				$following = false;
			}
			$data = array('result' => $result, 'name' => $name, 'following'=>$following);
			$this->load->view('view_messages',$data);
		}
	}
	
	//opens the login page
	public function login()
	{
		$data = array('error' => null);
		$this->load->view('view_login', $data);
	}
	
	//attempts to log the user in, if successful opens the users messages, else redirects to the login page again
	public function doLogin()
	{
		$this->load->model('users_model');
		$user = $this->input->post('username');
		$pass = $this->input->post('pass');
		if ($this->users_model->checkLogin($user, $pass))
		{
			$data = array('username' => $user, 'loggedin' => true);
			$this->session->set_userdata($data);
			redirect('/user/view/'.$this->session->username);
		}
		else 
		{
			$data = array('error' => "Incorrect username or password.");
			$this->load->view('view_login', $data);
		}
	}
	
	//logs the user out and redirects them to the login page
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/user/login');
	}
	
	//gets all the messages from all the users the current user follows then opens the messages view to display them to the user
	public function feed($name)
	{
		if ($name == null)
		{
			redirect('/user/login');
		} 
		else
		{
			$this->load->model('messages_model');
			$result = $this->messages_model->getFollowedMessages($name);
			$name = $name."'s feed";
			$data = array('result' => $result, 'name' => $name, 'following' => true);
			$this->load->view('view_messages',$data);
		}
	}
	
	//tells the users model to make the current user follow the specified user
	public function follow($followed)
	{
		if ($this->session->loggedin)
		{
			$this->load->model('users_model');
			$this->users_model->follow($followed);
			redirect('/user/feed/'.$this->session->username);
		}
		else
		{
			redirect('/user/login');
		}
	}
}