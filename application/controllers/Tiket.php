<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Film_model');
    }

    public function cari() {
        $this->load->view('templates/header');
        $this->load->view('tiket/cari');
        $this->load->view('templates/footer');
    }

    public function hasil() {
        $keyword = $this->input->post('keyword');
        $data['film'] = $this->Film_model->cari_film($keyword);
        $this->load->view('templates/header');
        $this->load->view('tiket/hasil', $data);
        $this->load->view('templates/footer');
    }
}