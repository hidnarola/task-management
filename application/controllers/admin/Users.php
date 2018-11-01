<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/users_model');
	}

	public function index(){
		
		//$data['users'] = $this->users_model->list_users();
		$data['title'] = "Manage Users";
		$this->load->view('admin/templetes/dashboard/header',$data);
		$this->load->view('admin/users');
		$this->load->view('admin/templetes/dashboard/footer');
	}

	public function get_users(){
		// Datatables Variables
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$users = $this->users_model->list_users();

		$data = array();

		foreach($users->result() as $r) {

			 $data[] = array(
				  $r->username,
				  $r->first_name,
				  $r->last_name,
				  $r->email,
				  $r->phone
			 );
		}

		$output = array(
			 "draw" => $draw,
			   "recordsTotal" => $users->num_rows(),
			   "recordsFiltered" => $users->num_rows(),
			   "data" => $data
		  );
		echo json_encode($output);
		exit();
	}
}

