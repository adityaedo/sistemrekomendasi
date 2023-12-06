<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rekomendasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_wisata');
        $this->load->model('Madmin');
        $this->load->model('Join_tabel');
    }

    public function index(){
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['rekomendasi'] = $this->Join_tabel->join_rekomendasi();

        $data['title'] = 'Hasil Rating';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/rekomendasi/Tampil_rekomendasi_admin', $data);
        $this->load->view('admin/layout/footer');

    }


}