<?php

class Join_tabel extends CI_Model{

    public function hitung_wisata()
    {
        $query = $this->db->query("SELECT COUNT(*) as jumlah_wisata FROM wisata");
        return $query->row()->jumlah_wisata;
    }
    public function hitung_rating()
    {
        $query = $this->db->query("SELECT COUNT(*) as jmlrating FROM rating");
        return $query->row()->jmlrating;
    }
    public function hitung_rekomendasi()
    {
        $query = $this->db->query("SELECT COUNT(*) as jmlrekomendasi FROM rekomendasi");
        return $query->row()->jmlrekomendasi;
    }
    public function hitung_user()
    {
        $query = $this->db->query("SELECT COUNT(*) as jmluser FROM user");
        return $query->row()->jmluser;
    }

    public function join_rating(){
        $this->db->select('*');
        $this->db->from('rating');
        $this->db->join('user', 'user.id_user = rating.id_user', 'left');
        $this->db->join('wisata', 'wisata.id_wisata = rating.id_wisata', 'left');
        return $this->db->get()->result();
    }
    public function join_rekomendasi(){
        $this->db->select('*');
        $this->db->from('rekomendasi');
        $this->db->join('user', 'user.id_user = rekomendasi.id_user', 'left');
        $this->db->join('wisata', 'wisata.id_wisata = rekomendasi.id_wisata', 'left');
        return $this->db->get()->result();
    }
    public function join_image(){
        $this->db->select('*');
        $this->db->from('image');
        $this->db->join('wisata', 'wisata.id_wisata = image.id_wisata', 'left');
        return $this->db->get()->result();
    }
}