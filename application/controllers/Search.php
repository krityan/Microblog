<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller 
{
	//loads the search page for user to enter their search term
	public function index()
	{
		$this->load->view('view_search');
	}
	
	//called from search page, sends search term to controller, then opens message view with the result
	public function dosearch()
	{
		$this->load->model('messages_model');
		$searchString = $this->input->get('searchS');
		$result = $this->messages_model->searchMessages($searchString);
		$data = array('result' => $result, 'name' => 'Search for '.$searchString, 'following' => true);
		$this->load->view('view_messages', $data);
	}
}