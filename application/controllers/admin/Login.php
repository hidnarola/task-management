<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->model('admin/login_model');
	}

	public function index(){
		if ($this->session->userdata('id') != '') {	
            redirect('admin/dashboard');
        } else {
			$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
	        $this->form_validation->set_rules('password', 'Password', 'trim|required');
	        if ($this->form_validation->run() == TRUE) {
	            $email = $this->input->post('email');
	            $password = hash('sha256', $this->input->post('password'));
				$user_detail = $this->login_model->get_user($email);
	            if(!empty($user_detail)){
	            	if($user_detail['password'] == $password){
	                    $this->session->set_userdata($user_detail);
	                    redirect('admin/dashboard', $user_detail);
	            	}else{
	            		$this->session->set_flashdata('error_msg', 'Invalid Login Crdentials.');
	            		redirect('admin/login');
	            	}
	            }
			}
			$this->load->view('admin/templetes/login/header');
			$this->load->view('admin/login');
			$this->load->view('admin/templetes/login/footer');
		}
	}
	
	public function forgot_password(){
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
		if ($this->form_validation->run() == TRUE) {
			$email = $this->input->post('email');
			$user_detail = $this->login_model->get_user($email);
			if(!empty($user_detail)){
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.gmail.com';
				$config['smtp_user'] = 'demo.narola@gmail.com';
				$config['smtp_pass'] = '!123Narola123';
				$config['smtp_port'] = 465;
 				$config['charset'] = 'utf-8';
				$config['newline'] = "\r\n";
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('hda@narola.email', 'Task management');
				$this->email->to($email);			
				$this->email->subject('Forgot Password?');
				$this->email->message('Testing the email class.');
				if($this->email->send()){
					echo "Success!!";die;
				}else{
					echo "failed!!";die;
				}
			}		
		}	
		$this->load->view('admin/templetes/login/header');
		$this->load->view('admin/forgot_password');
		$this->load->view('admin/templetes/login/footer');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
