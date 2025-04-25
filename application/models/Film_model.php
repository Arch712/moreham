<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Film_model extends CI_Model {

    public function cari_film($keyword) {
        $this->db->like('judul', $keyword);
        return $this->db->get('film')->result();
    }

    public function get_all_jadwal() {
        $this->db->select('jadwal_film.*, film.judul');
        $this->db->from('jadwal_film');
        $this->db->join('film', 'film.id = jadwal_film.film_id');
        return $this->db->get()->result();
    }

    public function tambah_jadwal($data) {
        $film = [
            'judul' => $data['judul'],
            'deskripsi' => '',
            'durasi' => 120,
            'genre' => '',
            'poster' => ''
        ];
        $this->db->insert('film', $film);
        $film_id = $this->db->insert_id();

        $jadwal = [
            'film_id' => $film_id,
            'tanggal_tayang' => $data['tanggal_tayang'],
            'jam' => $data['jam'],
            'studio' => $data['studio']
        ];
        return $this->db->insert('jadwal_film', $jadwal);
    }
}