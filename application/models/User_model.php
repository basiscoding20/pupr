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
    $this->db->select('p.*, j.nama_jalan,i.nama_jasa ');
    $this->db->from('proyek p');
    $this->db->join('jalan j', 'p.id_jalan=j.id_jalan');
    $this->db->join('jasa_kontruksi i', 'p.id_jasa=i.id_jasa');
    $this->db->order_by('p.id_proyek', 'DESC');
    if ($id == null) {
      return $this->db->get_where()->result_array();
    }else {
    $this->db->where('p.id_proyek', $id);
    return $this->db->get_where()->row_array();
    }
  }
  public function getProyek4()
  {
    $this->db->select('p.*, j.nama_jalan,i.nama_jasa ');
    $this->db->from('proyek p');
    $this->db->join('jalan j', 'p.id_jalan=j.id_jalan');
    $this->db->join('jasa_kontruksi i', 'p.id_jasa=i.id_jasa');
    $this->db->order_by('p.id_proyek', 'DESC');
      $this->db->limit(4);
      return $this->db->get_where()->result_array();
  }
  public function getJalan4()
  {
    $this->db->select('*');
    $this->db->from('jalan');
    $this->db->order_by('id_jalan', 'DESC');
      $this->db->limit(4);
      return $this->db->get_where()->result_array();
  }

}
