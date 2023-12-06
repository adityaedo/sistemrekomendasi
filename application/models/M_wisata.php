<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wisata extends CI_Model {

    public function getWisata() {
        $query = $this->db->get('wisata');
        return $query->result();
    }

    public function getWisataById($id_wisata) {
        $query = $this->db->get_where('wisata', array('id_wisata' => $id_wisata));
        return $query->row();
    }

    public function insert_data($table, $data) {
        $this->db->insert($table, $data);
    }

    public function editWisata($id_wisata, $data) {
        $this->db->update('wisata', $data, array('id_wisata' => $id_wisata));
        return $this->db->affected_rows();
    }
    
    public function delete($tabel, $id, $val)
    {
        $this->db->delete($tabel, array($id => $val));
    }
    
    public function join_wisata(){
        $this->db->select('*');
        $this->db->from('wisata');
        $this->db->join('kategori', 'kategori.id_kategori = wisata.id_kategori', 'left');
        return $this->db->get()->result();
    }
}


