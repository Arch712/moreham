<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Film_model');
    }

    public function index() {
        $data['jadwal'] = $this->Film_model->get_all_jadwal();
        $this->load->view('templates/header');
        $this->load->view('admin/jadwal_list', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        if ($_POST) {
            $data = [
                'judul' => $this->input->post('judul'),
                'tanggal_tayang' => $this->input->post('tanggal_tayang'),
                'jam' => $this->input->post('jam'),
                'studio' => $this->input->post('studio')
            ];
            $this->Film_model->tambah_jadwal($data);
            redirect('admin');
        } else {
            $this->load->view('templates/header');
            $this->load->view('admin/form_jadwal');
            $this->load->view('templates/footer');
        }
    }
}