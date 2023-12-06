<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda_user extends CI_Controller
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

        $data['categories'] = $this->Muser->get_categories_with_counts();

        $data['wisata'] = $this->Muser->getAllwisata();
        $data['average_rating'] = $this->Muser->get_average_rating();

        $data['rating'] = $this->Muser->ulasan();


        $this->processDataWithtfidf($data['wisata']);

        $data['title'] = 'Beranda';
        $this->load->view('User/layout/header', $data);
        $this->load->view('User/Beranda_user/Hal_beranda', $data);
        $this->load->view('User/layout/footer');
    }
    private function processDataWithtfidf($wisata)
    {
        $data = [];
        foreach ($wisata as $val) {
            $data[$val->id_wisata] = $this->pre_process($val->nama_wisata . ' ' . $val->lokasi . '' . $val->gambar . '' . $val->Date_created);
        }

        $this->Tfidf->create_index($data);
        $this->Tfidf->idf();
    }
    private function pre_process($str)
    {
        return strtolower($str);
    }

    public function kategori($id)
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('beranda_user/Login');
        }
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('userName')])->row_array();


        $data['kategori_wisata'] = $this->Muser->getProdukByKategori($id);
        $data['average_rating'] = $this->Muser->get_average_rating();

        $data['title'] = 'Kategori';
        $this->load->view('User/layout/header', $data);
        $this->load->view('User/Beranda_user/Hal_kategori', $data);
        $this->load->view('User/layout/footer');
    }

    public function pencarian()
    {
        if (empty($this->session->userdata('userName'))) {
            redirect('beranda_user/Login');
        }
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('userName')])->row_array();

        $keyword = $this->input->get('keyword');
        $data['pencarian'] = $this->Muser->cariData($keyword);

        $data['average_rating'] = $this->Muser->get_average_rating();
     

        $data['title'] = 'Cari';
        $this->load->view('User/layout/header', $data);
        $this->load->view('User/Beranda_user/Hal_pencarian_user', $data);
        $this->load->view('User/layout/footer');
    }

    public function update_email(){
        $new_email =$this->input->post('email');
        $user_id =$this->session->userdata('id_user');

        $this->Madmin->updateEmail($user_id, $new_email);

        $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
        Data Email Anda Tersimpan.
      </div>');
      redirect('beranda_user');
    }

    public function login()
    {
      

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'Masukan username anda!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Masukan password anda!'
        ));

        if ($this->form_validation->run() === FALSE) {
            // Validasi gagal, kembali ke halaman login dengan pesan error
            $data['title'] = 'Login';
            $this->load->view('User/Login_user', $data);
        } else {
            $usernama = $this->input->post('username');
            $password = $this->input->post('password');

            $id_user = $this->Muser->getUserIdByUsername($usernama, $password);

            if ($id_user) {
                // Set sesi dengan ID pelanggan
                $this->session->set_userdata('id_user', $id_user);
                $this->session->set_userdata('userName', $usernama);
                $this->session->set_userdata('status', 'login');

                redirect('beranda_user');
            } else {
                // Validasi sukses, tetapi login gagal, tampilkan pesan error
                $this->session->set_flashdata('not', ' <div class="alert alert-danger alert-dismissible" role="alert">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h6><i class="fa fa-ban"></i><b> Gagal!</b></h6>
                Email atau Password anda Salah.Silahkan Coba Lagi!
              </div>');
              redirect('beranda_user/login');
            }
        }
    }
    public function registrasi()
    {

        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'Masukan Username Anda!'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => 'Masukan Email Anda!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => 'Masukan Password Anda!'
        ));

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Registrasi';
            $this->load->view('User/Registrasi', $data);
        } else {

            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|png';


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_file = $this->upload->data();
                $dataInput = array(
                    'username' => $username,
                    'email' => $email,
                    'password' => $password,
                    'foto_profil' => $data_file['file_name'],
                    'Date_created' => date('Y-m-d H:i:s')
                );

                $this->Madmin->insert('user', $dataInput);
                $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
            Registrasi Berhasil! Silahkan Login.
          </div>');
                redirect('beranda_user/login');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('beranda_user/login');
    }
}
