<?php
defined('BASEPATH') or exit('No direct script access allowed');

class crud extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_wisata');
        $this->load->model('Madmin');
    }

   
    public function tambah()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $this->form_validation->set_rules('nama_wisata', 'Nama wista', 'required', array(
            'required' => 'Masukan Nama Wisata anda.'
        ));

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => 'Masukan Deskripsi anda.'
        ));

        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array(
            'required' => 'Masukan Lokasi yang dituju'
        ));
        $this->form_validation->set_rules('harga', 'Harga', 'required', array(
            'required' => 'Masukan Harga Tiket'
        ));

        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Tambah Data';
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/wisata/tambah', $data);
        } else {


            $nama_wisata = $this->input->post('nama_wisata');
            $deskripsi = $this->input->post('deskripsi');
            $kategori = $this->input->post('kategori');
            $lokasi = $this->input->post('lokasi');
            $harga = $this->input->post('harga');


            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_file = $this->upload->data();
                $dataInput = array(
                    'id_kategori' => $kategori,
                    'nama_wisata' => $nama_wisata,
                    'deskripsi' => $deskripsi,
                    'lokasi' => $lokasi,
                    'Harga' => $harga,
                    'gambar' =>  $data_file['file_name'],
                );
                $this->Madmin->insert('wisata', $dataInput);

                $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil!</h4>
                Data Berhasil Ditambah!
              </div>');
                redirect('crud/tambah');
            } else {

                redirect('crud/tambah');
            }
        }
    }

    public function edit($id)
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $this->form_validation->set_rules('nama_wisata', 'Nama wista', 'required', array(
            'required' => 'Masukan Nama Wisata anda.'
        ));
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
            'required' => 'Masukan Deskripsi anda.'
        ));
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required', array(
            'required' => 'Masukan Lokasi yang dituju'
        ));

        $data['admin'] = $this->db->get_where('admin', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['wisata'] = $this->Madmin->get_by_id('wisata', array('id_wisata' => $id))->row();

        $data['kategori'] = $this->Madmin->get_all_data('kategori')->result();


        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Edit Data';
            $this->load->view('admin/layout/header', $data);
            $this->load->view('admin/wisata/edit', $data);
        } else {

            $data['wisata'] = $this->Madmin->get_by_id('wisata', array('id_wisata' => $id))->row();
            $Gambar = $data['wisata']->gambar;

            if (!empty($_FILES['gambar']['name'])) {
             
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png';
           

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $data_file = $this->upload->data();
                    $Gambar = $data_file['file_name'];
                } else {
                    redirect('datawisata' . $id, 'refresh');
                }
            }

            $nama_wisata = $this->input->post('nama_wisata');
            $deskripsi = $this->input->post('deskripsi');
            $kategori = $this->input->post('kategori');
            $lokasi = $this->input->post('lokasi');
            $harga = $this->input->post('harga');

            $data_update = array(
                'id_kategori' => $kategori,
                'nama_wisata' => $nama_wisata,
                'deskripsi' => $deskripsi,
                'lokasi' => $lokasi,
                'Harga' => $harga,
                'gambar' => $Gambar,
            );
          

            $this->Madmin->update('wisata', $data_update, 'id_wisata', $id);

            $this->session->set_flashdata('not', ' <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
           Data Berhasil Diubah!
          </div>');
            redirect('datawisata');
        }
    }


    public function hapus($id_wisata)
    {
        $result = $this->M_wisata->hapusWisata($id_wisata);

        if ($result) {
            redirect('wisata');
        } else {
            echo "Gagal menghapus data.";
        }
    }
}
