<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Madmin');
        $this->load->model('Muser');
        $this->load->model('Join_tabel');
        $this->load->library('Tfidf');
        $this->Tfidf = new Tfidf();
    }

    public function index()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('beranda_user/Login');
        }

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('userName')])->row_array();

        $data['wisata'] = $this->Madmin->get_all_data('wisata')->result();
        $data['average_rating'] = $this->Muser->get_average_rating();

        $data['title'] = 'Destinasi';
        $this->load->view('User/layout/header', $data);
        $this->load->view('User/Wisata_user/Hal_destinasi_user', $data);
        $this->load->view('User/layout/footer');
    }


    public function detail($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('beranda_user/Login');
        }

        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('userName')])->row_array();

        $detail = $this->Muser->detail_wisata($id);
        $data['detail'] = $detail;

        $data['wisata'] = $this->Muser->getAllwisata();
        $data['gambar'] = $this->Muser->foto($id);
        $data['average_rating'] = $this->Muser->getAverageRating($id);

        $this->processDataWithtfidf($data['wisata'], $id);


        $data['title'] = 'Detail Wisata';
        $this->load->view('User/layout/header', $data);
        $this->load->view('User/Wisata_user/Hal_detail_wisata', $data);
        $this->load->view('User/layout/footer');
    }
    public function rating()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('beranda_user/Login');
        }

        if ($this->Muser->isUserRated($id_user, $id_wisata)) {
         
            $this->session->set_flashdata('not', '<div class="alert alert-danger" role="alert">
        Mohon Maff, Anda Sudah Melakukan Penilaian.
      </div>');
      return;
        }

            $id_wisata =  $this->input->post('id_wisata');
            $rating = $this->input->post('rating_value');
            $ulasan = $this->input->post('ulasan');

            $datainput = array(
                'id_user' => $this->session->userdata('id_user'),
                'id_wisata' => $id_wisata,
                'rating' => $rating,
                'ulasan' => $ulasan,
                'waktu_rating' => date('Y-m-d H:i:s'),
            );

            $this->Madmin->insert('rating', $datainput);
            $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
        Trimakasih atas Ketersedianannya Mengisi Rating Wisata Ini.
      </div>');
            redirect('wisata_user/detail/' . $id_wisata);
        }

    private function processDataWithtfidf($wisata, $id)
    {
        $data = [];
        foreach ($wisata as $val) {
            $data[$val->id_wisata] = $this->pre_process($val->nama_wisata . ' ' . $val->lokasi . '' . $val->gambar . '' . $val->Date_created);
        }

        $this->Tfidf->create_index($data);
        $this->Tfidf->idf();
        $w = $this->Tfidf->weight();
        $r = $this->Tfidf->similarity($id);
        $n = 8;

        $data['w'] = $w;
        $data['r'] = $r;
        $data['n'] = $n;
    }
    private function pre_process($str)
    {
        return strtolower($str);
    }
}
