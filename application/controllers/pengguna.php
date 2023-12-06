<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengguna extends CI_Controller {
	
    function __construct(){
        parent::__construct();
        $this->load->model('Madmin');
    }
    public function about(){
        $this->load->view('userr/layout/header');
        $this->load->view('userr/about');
        $this->load->view('userr/layout/footer');
	}

    public function testimonial(){
        $this->load->view('userr/layout/header');
        $this->load->view('userr/testimonial');
        
        $this->load->view('userr/layout/footer');
	}

    public function blog(){
        $this->load->view('userr/layout/header');
        $this->load->view('userr/blog');
        
        $this->load->view('userr/layout/footer');
	}

    public function contact(){
        $this->load->view('userr/layout/header');
        $this->load->view('userr/contact');
        
        $this->load->view('userr/layout/footer');
	}


    public function contact2(){
		if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $this->load->view('userr/layout/header');
        $this->load->view('userr/layout/menu');
        $this->load->view('userr/dashboard');
        $this->load->view('userr/layout/footer');
	
	}

	public function dashboard(){
		if(empty($this->session->userdata('username'))){
			redirect('admin');
		}
        $this->load->view('userr/layout/header');
        $this->load->view('userr/layout/menu');
        $this->load->view('userr/dashboard');
        $this->load->view('userr/layout/footer');
	
	}
}