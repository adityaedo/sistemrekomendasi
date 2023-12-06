<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('Join_tabel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', array(
            'required' => 'Masukan Nama Kategori Anda!'
        ));

        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Kategori';
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/layout/sidebar');
            $this->load->view('admin/kategori/Kategori_admin', $data);
            $this->load->view('admin/layout/footer');
        } else {
            $kategori = $this->input->post('kategori');

            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_file = $this->upload->data();
                $dataInput = array(
                    'Nama_kategori' => $kategori,
                    'Gambar' => $data_file['file_name'],
                );
            
                $this->Madmin->insert('kategori', $dataInput);
                $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                Data Berhasil Ditambah!
              </div>');
                redirect('kategori');
            }
        }
    }
    public function hapus($id_kategori)
    {

        $this->Madmin->delete('kategori', 'id_kategori', $id_kategori);
        $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
        Data Berhasil Dihapus!
      </div>');
        redirect('kategori');
    }
}
