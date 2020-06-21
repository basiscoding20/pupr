<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
  public function getUser($email)
  {
    return $this->db->get_where('user', ['email' => $email])->row_array();
  }
  public function getProyek($id = null)
  {
    $this->db->select('p.*, k.nama_kontruksi,j.nama_jasa ');
    $this->db->from('proyek p');
    $this->db->join('kontruksi k', 'p.id_kontruksi=k.id_kontruksi');
    $this->db->join('jasa_kontruksi j', 'p.id_jasa=j.id_jasa');
    $this->db->order_by('p.id_proyek', 'DESC');
    if ($id == null) {
      return $this->db->get_where()->result_array();
    }else {
    $this->db->where('p.id_proyek', $id);
    return $this->db->get_where()->row_array();
    }
  }

}
