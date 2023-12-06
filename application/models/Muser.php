<?php

class Muser extends CI_Model
{

    public function detail_wisata($id = null)
    {
        $query = $this->db->get_where('wisata', array('id_wisata' => $id))->row();
        return $query;
    }

    public function getUserIdByUsername($username,$password)
    {
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('username', $username);
        $this->db->where('Password', $password);

        $query = $this->db->get();

        // Jika ditemukan satu baris, kembalikan ID pelanggan
        if ($query->num_rows() == 1) {
            $result = $query->row();
            return $result->id_user;
        }

        // Jika tidak ditemukan, kembalikan null atau nilai yang sesuai
        return null;
    }

    public function isUserRated($id_user, $id_wisata) {
        $this->db->where('id_user', $id_user);
        $this->db->where('id_wisata', $id_wisata);
        $query = $this->db->get('rating');

        return $query->num_rows() > 0;
    }
    
    public function foto($id = null)
    {
        $this->db->select('*');
        $this->db->where('id_wisata', $id);
        $query = $this->db->get('image');
        return $query->result();
    }
    public function get_categories_with_counts()
    {
        $this->db->select('kategori.id_kategori, kategori.Nama_kategori,kategori.Gambar, COUNT(wisata.id_wisata) as jumlah_wisata');
        $this->db->from('kategori');
        $this->db->join('wisata', 'wisata.id_kategori = kategori.id_kategori', 'left');
        $this->db->group_by('kategori.id_kategori');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getProdukByKategori($id)
    {
        $this->db->select('wisata.*, kategori.Nama_kategori');
        $this->db->from('wisata');
        $this->db->join('kategori', 'wisata.id_kategori = kategori.id_kategori');

        // Menambahkan kondisi where untuk id_kategori
        $this->db->where('wisata.id_kategori', $id);

        // Melakukan query dan mengembalikan hasil
        $query = $this->db->get();
        return $query->result();
    }
    public function getAllwisata()
    {
        $query = $this->db->query('SELECT id_wisata, nama_wisata, lokasi,gambar,Date_created FROM wisata ORDER BY RAND() LIMIT 0,10');
        return $query->result();
    }

    public function get_average_rating()
    {
        $this->db->select_avg('rating');
        $query = $this->db->get('rating');
        return $query->row()->rating;
    }

    public function getAverageRating($id)
    {
        $this->db->select_avg('rating', 'average_rating');
        $this->db->where('id_wisata', $id);
        $query = $this->db->get('rating');
        $result = $query->row();
        return $result->average_rating;
    }
    public function ulasan()
    {
        $this->db->select('*');
        $this->db->from('rating');
        $this->db->join('user', 'user.id_user = rating.id_user', 'left');
        return $this->db->get()->result();
    }

    public function cariData($keyword)
    {
        $this->db->like('nama_wisata', $keyword);
        $query = $this->db->get('wisata');
        return $query->result();
    }
}
