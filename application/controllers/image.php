<?php
defined('BASEPATH') or exit('No direct script access allowed');

class image extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('Join_tabel');
        $this->load->model('Join_tabel');
    }

    public function index()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }
        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['image'] = $this->Join_tabel->join_image();
        $data['wisata'] = $this->Madmin->get_all_data('wisata')->result();


        $data['title'] = 'Foto';
        $this->load->view('admin/layout/header', $data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/image/hal_image_admin', $data);
        $this->load->view('admin/layout/footer');
    }
   
    public function upload_gambar()
    {
        $id_wisata = $this->input->post('id_wisata');

        $config['upload_path']   = './assets/images/';
        $config['allowed_types'] = 'gif|jpg|png';


        $this->load->library('upload', $config);

        // Mendapatkan jumlah file yang diupload
        $number_of_files = count($_FILES['gambar']['name']);

        // Konfigurasi untuk setiap file
        for ($i = 0; $i < $number_of_files; $i++) {
            $_FILES['userfile']['name']    = $_FILES['gambar']['name'][$i];
            $_FILES['userfile']['type']    = $_FILES['gambar']['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES['gambar']['error'][$i];
            $_FILES['userfile']['size']     = $_FILES['gambar']['size'][$i];

            $this->upload->initialize($config);

            // Proses upload
            if ($this->upload->do_upload('userfile')) {
                $data = $this->upload->data();
                $nama_file = $data['file_name'];


                $this->Madmin->insert_gambar([
                    'id_wisata' => $id_wisata,
                    'image' => $nama_file,
                    'date_created' => date('Y-m-d H:i:s'),

                ]);
            } else {

                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Gagal!</h4>
           Upload Foto Gagal
          </div>');
                redirect('image');
            }
        }
        $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
   Foto Berhasil DiTambah!
  </div>');
        redirect('image');
    }

    public function delete($id_image)
    {
        $this->Madmin->delete('image', 'id_image', $id_image);
        
        redirect('image');
    }

}
