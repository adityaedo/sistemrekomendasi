<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datawisata extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_wisata');
    }

    public function index() {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

        $data['data_wisata'] = $this->M_wisata->join_wisata();
        
        $data['title'] = 'Data Wisata';
        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/wisata/tampilwisata',$data);
        $this->load->view('admin/layout/footer');
    }
    public function tambah($id_wisata) {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }
        $data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

        $data['data_wisata'] = $id_wisata;
        $data['wisata'] = $this->M_wisata->tambahWisata('wisata')->result();
        $this->load->view('admin/layout/header');
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/wisata/tambah',$data);
        $this->load->view('admin/layout/footer');
    }
 
    public function edit($id_wisata) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = array(
                'nama_wisata' => $this->input->post('nama_wisata'),
                'deskripsi' => $this->input->post('deskripsi'),
                'kategori' => $this->input->post('kategori'),
                'lokasi' => $this->input->post('lokasi'),
                'gambar' => $this->input->post('gambar'), // Sesuaikan dengan field gambar
            );

            $result = $this->M_wisata->editWisata($id_wisata, $data);

            if ($result) {
                redirect('datawisata');
            } else {
                echo "Gagal mengedit data.";
            }
        } else {
            $data['wisata'] = $this->M_wisata->getWisataById($id_wisata);

            if (!$data['wisata']) {
                show_404();
            }

            $data['title'] = '';
            $this->load->view('admin/layout/header');
            $this->load->view('admin/layout/sidebar');
            $this->load->view('admin/wisata/edit',$data);
            $this->load->view('admin/layout/footer');
        }
    }
    public function delete($id_wisata)
    {
        $this->M_wisata->delete('wisata', 'id_wisata', $id_wisata);
        
        redirect('datawisata');
    }

    
}

