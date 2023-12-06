<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
    }

    public function index(){
        if(empty($this->session->userdata('username'))){
            redirect('admin');        
        }
        $data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

        $data['user']=$this->Madmin->get_all_data('user')->result();

        $data['title'] = 'User'; 
        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar',$data);
        $this->load->view('admin/user/Tampil_user_admin',$data);
        $this->load->view('admin/layout/footer');
    }

    public function get_by_id($id_user){
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $dataWhere = array('id_user' =>$id_user);
        $data['user'] = $this->Madmin->get_by_id('user', $dataWhere)->row_object();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/user/formedit',$data);
        $this->load->view('admin/layout/footer');
    }
    //tambahkan fangsen edit seperti kode berikut
    public function edit(){
        if(empty($this->session->userdata('userName'))){
            redirect('adminpanel');
        }
        $idKonsumen = $this->input->post('idKonsumen');
        $username = $this->input->post('username');
        $namaKonsumen = $this->input->post('namaKonsumen');
        $alamat = $this->input->post('alamat');
        $email= $this->input->post('email');
        $tlpn= $this->input->post('tlpn');
        $dataUpdate = array('idKonsumen'=>$idKonsumen,'username'=>$username,'namaKonsumen'=>$namaKonsumen,'alamat'=>$alamat,'email'=>$email,'tlpn'=>$tlpn);
        $this->Madmin->update('tbl_member', $dataUpdate, 'idKonsumen', $idKonsumen);
        redirect('member');
    }

    public function delete($id){
        if(empty($this->session->userdata('username'))){
            redirect('admin');
        }
        $this->Madmin->delete('user', 'id_user', $id);
        redirect('user');
    }

}