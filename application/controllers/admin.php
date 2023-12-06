<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
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
        $data['title'] = 'Login Admin';
        $this->load->view('admin/login', $data);
    }

    public function dashboard()
    {
        if (empty($this->session->userdata('username'))) {
            redirect('admin');
        }

        $data['admin'] = $this->db->get_where('admin', ['username' =>
		$this->session->userdata('username')])->row_array();

        $data['jmlwisata']= $this->Join_tabel->hitung_wisata();
        $data['jmlrating']= $this->Join_tabel->hitung_rating();
        $data['jmlrek']= $this->Join_tabel->hitung_rekomendasi();
        $data['jmluser']= $this->Join_tabel->hitung_user();
      
        $data['user'] = $this->Madmin->get_all_data('admin')->result();

        $data['title'] = 'Dashboard';
        $this->load->view('admin/layout/header',$data);
        $this->load->view('admin/layout/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/layout/footer');
    }



    public function masuk()
    {
        $this->load->model('Madmin');
        $u = $this->input->post('username');
        $p = $this->input->post('password');

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'The Username field is required.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Validasi gagal, kembali ke halaman login dengan pesan error
            $this->load->view('admin/login');
        } else {
            $cek = $this->Madmin->cek_login($u, $p);

            if ($cek->num_rows() == 1) {
                $data_session = array(
                    'username' => $u,
                    'status' => 'login'
                );
                $this->session->set_userdata($data_session);
                $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
                Berhasil Login.Selamat Datang! 
             </div>');
                redirect('admin/dashboard');
            } else {
                // Validasi sukses, tetapi login gagal, tampilkan pesan error
                $this->session->set_flashdata('not', '<div class="alert alert-danger" role="alert">
                Username atau Password Salah!
             </div>');
                $data['title'] = 'Login Admin';
                $this->load->view('admin/login', $data);
            }
        }
    }


    public function register()
    {
        $data['title'] = 'Register';
        $this->load->view('admin/register', $data);
    }

    public function process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => 'The Username field is required.'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            // Validasi gagal, kembali ke halaman login dengan pesan error
            $this->load->view('admin/register');
        } else {
            // Sukses validasi, lakukan proses registrasi (simpan ke database, dll.)
            // Sesuaikan dengan kebutuhan aplikasi Anda

            // Contoh penyimpanan ke database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );

            $this->Madmin->insert('admin', $data);

            $this->session->set_flashdata('not', '<div class="alert alert-success" role="alert">
                Registrasi Berhasil.Silahkan Login!
             </div>');
            redirect('admin');
        }
    }


    public function logout()
    {
        $this->session->sess_destroy();
        redirect('beranda_user');
    }
}
