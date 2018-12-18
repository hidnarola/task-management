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
		$this->load->view('admin/users/users');
		$this->load->view('admin/templetes/dashboard/footer');
	}
	
	public function get_users(){
		$final['recordsTotal'] = $this->users_model->list_users('count');
		$final['redraw'] = 1;
		$final['recordsFiltered'] = $final['recordsTotal'];
		$menu = $this->users_model->list_users('result')->result_array();		
		$start = $this->input->get('start') + 1;
		foreach ($menu as $key => $val) {
			$menu[$key] = $val;
			$menu[$key]['sr_no'] = $start++;
			$menu[$key]['action'] = "";
		}
		$final['data'] = $menu;
		echo json_encode($final);
	}

	public function add(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			$password = $this->generatePassword();
			$user_detail = array(
				'username' => $this->input->post('username'),
				'password' => hash('sha256', $password),
				'first_name' => $this->input->post('first_name'),
				'last_name' => $this->input->post('last_name'),
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'user_role' => "1"
			);
			$result = $this->users_model->add_new_user($user_detail);
			$user_detail['password'] = $password;
			$user_detail['portal_link'] = base_url()."admin/login";
			$config['protocol'] = 'smtp';
			$config['smtp_host'] = 'ssl://smtp.gmail.com';
			$config['smtp_user'] = 'demo.narola@gmail.com';
			$config['smtp_pass'] = '!123Narola123';
			$config['smtp_port'] = 465;
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('task-management@narola.email', 'Task management');
			$this->email->to($this->input->post('email'));			
			$this->email->subject('Task Managemant: Login Details');
			$message = $this->load->view('admin/templetes/emails/login_details',$user_detail,true);
			$this->email->message($message);
			if($this->email->send()){
				$this->session->set_flashdata('success_msg', 'User has been added successfully!. Ask User to check email.');				
			}else{
				echo "failed!!";die;
			}			
		}
		$data['title'] = "Add New User";
		$this->load->view('admin/templetes/dashboard/header',$data);
		$this->load->view('admin/users/add_user');
		$this->load->view('admin/templetes/dashboard/footer');
	}
	
	public function generatePassword($length=9, $strength=0) {
		$vowels = 'aeuy';
		$consonants = 'bdghjmnpqrstvz';
		if ($strength & 1) {
			$consonants .= 'BDGHJLMNPQRSTVWXZ';
		}
		if ($strength & 2) {
			$vowels .= "AEUY";
		}
		if ($strength & 4) {
			$consonants .= '23456789';
		}
		if ($strength & 8) {
			$consonants .= '@#$%';
		}
		$password = '';
		$alt = time() % 2;
		for ($i = 0; $i < $length; $i++) {
			if ($alt == 1) {
				$password .= $consonants[(rand() % strlen($consonants))];
				$alt = 0;
			} else {
				$password .= $vowels[(rand() % strlen($vowels))];
				$alt = 1;
			}
		}
		return $password;
	}

	public function edit($id=''){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			$result = $this->users_model->edit_user(base64_decode($id));
			$this->session->set_flashdata('success_msg', 'User has been updated successfully!');
			redirect('admin/users');
		}
		$data['user'] = $this->users_model->get_user(base64_decode($id))->row_array();
		$data['title'] = "Edit User";
		$this->load->view('admin/templetes/dashboard/header',$data);
		$this->load->view('admin/users/edit_user');
		$this->load->view('admin/templetes/dashboard/footer');
	}

	public function delete($id=''){
		$result = $this->users_model->delete_user(base64_decode($id));
		$this->session->set_flashdata('success_msg', 'User has been deleted successfully!');
		redirect('admin/users');
	}

	public function view($id=''){
		$data['user'] = $this->users_model->get_user(base64_decode($id))->row_array();
		$data['title'] = "View User";
		$this->load->view('admin/templetes/dashboard/header',$data);
		$this->load->view('admin/users/view_user');
		$this->load->view('admin/templetes/dashboard/footer');	}

}

