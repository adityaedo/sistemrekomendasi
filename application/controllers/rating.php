<?php
defined('BASEPATH') or exit('No direct script access allowed');

class rating extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_wisata');
        $this->load->model('Madmin');
        $this->load->model('Join_tabel');
    }
    public function index()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['rating'] = $this->Join_tabel->join_rating();

        $data['title'] = 'Rating user';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/rating/Tampil_rating_admin', $data);
        $this->load->view('admin/layout/footer');
    }

    public function hapus($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $this->Madmin->delete('rating', 'id_rating', $id);
        $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
       Data Berhasil Diubah!
      </div>');
        redirect('rating');
    }
}
