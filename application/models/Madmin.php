<?php

class Madmin extends CI_Model{
	
	public function cek_login($u, $p){
		
		$q = $this->db->get_where('admin', array('username'=>$u, 'password'=>$p));
		return $q;
	}
	public function cek_login_user($u, $p){
		
		$q = $this->db->get_where('user', array('username'=>$u, 'password'=>$p));
		return $q;
	}

    /*public function cek_login($u, $p){
        $q = $this->db->get_where('tb_admin', array('userName'=>$u));
        $user = $q->row_array();

        if ($user && password_verify($p, $user['password'])) {
            return $q;
        } else {
            return false;
        }
    }*/


	public function get_all_data($tabel){
		$q=$this->db->get($tabel);
		return $q;
	}

    public function get_member_data($id)
{
    $this->db->where('id', $id);
    $query = $this->db->get('user');

    if ($query->num_rows() > 0) {
        return $query->row_array();
    } else {
        return false;
    }
}


	public function insert($tabel, $data){
		$this->db->insert($tabel, $data);
	}


    public function get_user_by_username($username)
{
    return $this->db->get_where('admin', ['username' => $username])->row();
}


	public function get_by_id($tabel, $id){
		return $this->db->get_where($tabel, $id);
	}

	public function update($table, $data, $pk, $id){
		$this->db->where($pk, $id);
		$this->db->update($table, $data);
	}

	public function delete($tabel, $id, $val){
		$this->db->delete($tabel, array($id => $val)); 
	}

    public function cek_username($table, $username)
{
    $this->db->where('username', $username);
    $query = $this->db->get($table);
    return $query->num_rows() > 0;
}

	public function cek_loginuser($u,$p){
        $q = $this->db->get_where('user',array('username'=>$u,'password'=>$p));
        return $q;
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function insert_template($data){
        
        $this->db->insert('tb_template', $data);
    }

    public function insert_member($data){
        
        $this->db->insert('tb_member', $data);
    }
    public function insert_gambar($data)
    {
        $this->db->insert('image', $data);
    }

    public function updateEmail($user_id, $new_email) {
        $this->db->set('email', $new_email);
        $this->db->where('id_user', $user_id);
        $this->db->update('user');
    }

}