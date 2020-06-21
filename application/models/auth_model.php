<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model
{
  public function getKontruksi($id = null)
  {
    $this->db->select('k.*,i.kategori');
    $this->db->from('kontruksi k ');
    $this->db->join('kategori  i', 'k.id_kategori=i.id_kategori');
    $this->db->order_by('k.id_kontruksi', 'DESC');
    if ($id != null) {
      $this->db->where('k.id_kontruksi' , $id);
      return $this->db->get_where()->row_array();
    }else {
      return $this->db->get_where()->result_array();
    }
  }
  public function getView($type,$id)
  {
    if ($type ==  'header') {
      $this->db->select('i.*,k.kategori');
      $this->db->from('kontruksi i');
      $this->db->join('kategori k', 'i.id_kategori=k.id_kategori');
      $this->db->where('i.id_kontruksi' , $id);
      return $this->db->get_where()->row_array();
    }else if ($type == 'proyek') {
      $this->db->select('p.*,k.nama_kontruksi, j.nama_jasa');
      $this->db->from('proyek p');
      $this->db->join('kontruksi k', 'p.id_kontruksi=k.id_kontruksi');
      $this->db->join('jasa_kontruksi j', 'p.id_jasa=j.id_jasa');
      $this->db->order_by('p.id_proyek', 'DESC');
      $this->db->where('k.id_kontruksi' , $id);
      return $this->db->get_where()->result_array();
    }
  }
  public function getBangunanView($type,$id)
  {
    if ($type ==  'header') {
      return $this->db->get_where('bangunan', ['id_bangunan' => $id])->row_array();
    }else if ($type == 'proyek') {
      $this->db->select('p.*,k.nama_kontruksi');
      $this->db->from('proyek_bangunan p');
      $this->db->join('bangunan b', 'p.id_bangunan=b.id_bangunan');
      $this->db->join('kontruksi k', 'p.id_kontruksi=k.id_kontruksi');
      $this->db->order_by('p.id_proyek', 'DESC');
      $this->db->where('b.id_bangunan' , $id);
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
