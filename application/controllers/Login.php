<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('form', 'url'));
    }

    public function index() {
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }
        $this->load->view('templates/header');
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    public function auth() {
        // Debugging: pastikan ini hanya muncul sementara
        // echo "AUTH BERJALAN"; exit;
    
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        // Cek kredensial (username & password)
        if ($username === 'admin' && $password === '123') {
            // Set session login
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('username', $username);
            
            // Debugging: Cek apakah redirect akan terjadi
            log_message('debug', 'Login berhasil, redirect ke admin.');
    
            // Redirect ke halaman admin
            redirect('admin');
        } else {
            // Pesan error jika login gagal
            $this->session->set_flashdata('error', 'Username atau password salah');
            redirect('login');
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}