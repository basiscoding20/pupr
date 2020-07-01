<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model
{
  public function getKontruksi($id = null)
  {
    $this->db->select('j.*,d.nama_desa');
    $this->db->from('jalan j ');
    $this->db->join('desa  d', 'd.id_desa=j.id_desa');
    $this->db->order_by('j.id_jalan', 'DESC');
    if ($id != null) {
      $this->db->where('j.id_jalan' , $id);
      return $this->db->get_where()->row_array();
    }else {
      return $this->db->get_where()->result_array();
    }
  }
  public function getPengaduan($id = null)
  {
    $this->db->select('p.*,k.nama_jalan');
    $this->db->from('pengaduan_masyarakat p ');
    $this->db->join('jalan  k', 'k.id_jalan=p.id_jalan');
    $this->db->order_by('p.id_pengaduan', 'DESC');
    if ($id != null) {
      $this->db->where('k.id_pengaduan' , $id);
      return $this->db->get_where()->row_array();
    }else {
      return $this->db->get_where()->result_array();
    }
  }
  public function getView($type,$id)
  {
    if ($type ==  'header') {
      $this->db->select('j.*,d.nama_desa');
      $this->db->from('jalan j');
      $this->db->join('desa d', 'j.id_desa=d.id_desa');
      $this->db->where('j.id_jalan' , $id);
      return $this->db->get_where()->row_array();
    }else if ($type == 'proyek') {
      $this->db->select('p.*,k.nama_jalan, j.nama_jasa');
      $this->db->from('proyek p');
      $this->db->join('jalan k', 'p.id_jalan=k.id_jalan');
      $this->db->join('jasa_kontruksi j', 'p.id_jasa=j.id_jasa');
      $this->db->order_by('p.id_proyek', 'DESC');
      $this->db->where('k.id_jalan' , $id);
      return $this->db->get_where()->result_array();
    }
  }


  public function getDetails($id)
  {
    $this->db->select('p.*,k.nama_jasa');
    $this->db->from('proyek p');
    $this->db->join('jasa_kontruksi k', 'p.id_jasa=k.id_jasa');
    $this->db->where('p.id_proyek' , $id);
    return $this->db->get_where()->row_array();
  }


}
