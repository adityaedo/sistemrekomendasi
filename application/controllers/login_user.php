<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login_user extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }
	public function index(){
        $this->load->view('userr/login');
        
		
	}

	public function dashboard(){
		if(empty($this->session->userdata('username'))){
			redirect('login_user');
		}
      //  $data['title'] = 'Template';
        $data['user'] = $this->Madmin->get_all_data('tbl_user')->result();
        
        $this->load->view('userr/layout/header');
        $this->load->view('userr/dashboard',$data);
        $this->load->view('userr/layout/footer');
	
	}

	
   /* public function masuk()
{
    $this->load->model('Madmin');
    $u = $this->input->post('username');
    $p = $this->input->post('password');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required', array(
        'required' => 'The Email/Username field is required.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Validasi gagal, kembali ke halaman login dengan pesan error
        $this->load->view('admin/login');
    } else {
        $user = $this->Madmin->get_user_by_username($u);

        if ($user && password_verify($p, $user->password)) {
            $data_session = array(
                'userName' => $u,
                'status' => 'login'
            );
            //$this->session->set_userdata($data_session);
            redirect('loginadmin/dashboard');
        } else {
            // Validasi sukses, tetapi login gagal, tampilkan pesan error
            $data['error'] = 'Invalid username or password.';
            $this->load->view('admin/login', $data);
        }
    }
}
*/


public function masuk()
{
    $this->load->model('Madmin');
    $u = $this->input->post('username');
    $p = $this->input->post('password');

    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required', array(
        'required' => 'The Email/Username field is required.'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
        // Validasi gagal, kembali ke halaman login dengan pesan error
        $this->load->view('login_user/login');
    } else {
        $cek = $this->Madmin->cek_login($u, $p);

        if ($cek->num_rows() == 1) {
            $data_session = array(
                'username' => $u,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect('login_user/dashboard');
        } else {
            // Validasi sukses, tetapi login gagal, tampilkan pesan error
            $data['error'] = 'Invalid username or password.';
            $this->load->view('login_user/login', $data);
        }
    }
}


	public function logout(){
		$this->session->sess_destroy();
		redirect('login_user');
	}


    
}