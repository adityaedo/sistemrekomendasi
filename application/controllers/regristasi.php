<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load library dan helper yang diperlukan
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index() {
        // Menampilkan halaman registrasi
        $this->load->view('userr/register');
    }

    public function process() {
        // Set aturan validasi form
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('address', 'Address', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // Gagal validasi, kembali ke halaman registrasi dengan pesan error
            $this->load->view('register');
        } else {
            // Sukses validasi, lakukan proses registrasi (simpan ke database, dll.)
            // Sesuaikan dengan kebutuhan aplikasi Anda

            // Contoh penyimpanan ke database
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address')
            );

            // Panggil model atau lakukan proses penyimpanan data ke database
            // $this->load->model('user_model');
            // $this->user_model->register($data);

            // Redirect ke halaman login atau halaman lainnya
            redirect('login');
        }
    }
}
?>
