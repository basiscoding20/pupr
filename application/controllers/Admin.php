<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model','User_');
  }
public function index()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  if ($data['user']['akses'] != 1) {
  redirect('auth/login');
  }
  $data['title'] = 'Dashboard Admin';
  $this->load->view('Templates/header', $data);
  $this->load->view('Templates/sidebar', $data);
  $this->load->view('Templates/topbar', $data);
  $this->load->view('Admin/index', $data);
  $this->load->view('Templates/footer', $data);
  $this->load->view('Templates/javascript', $data);
}
public function Profile()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
    if ($data['user']['akses'] != 1) {
    redirect('auth/login');
    }
  $this->form_validation->set_rules('nama','nama','required|trim',[
      'required' => 'Tidak boleh kosong'
    ]);
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Profile';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('admin/Profile', $data);
    $this->load->view('Templates/footer', $data);
    $this->load->view('Templates/javascript', $data);
  }else {
    $data = [
      'id_user' => htmlspecialchars($this->input->post('id_user', true)),
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true))
    ];
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('user' , $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil diubah !
        </div>');
      redirect('admin/profile');
  }
}
public function grafik($type)
  {
    $data['user']= $this->User_->getUser($this->session->userdata('email'));
    if ($data['user']['akses'] != 1) {
      $this->db->join('jalan  j', 'p.id_jalan=j.id_jalan');
      $this->db->join('desa  d', 'd.id_desa=j.id_desa');
      $this->db->where('d.id_user' , $data['user']['id_user']);
    }
    if ($type == 'area') {
      $this->db->select('monthname(p.pelaksanaan) as bulan,year(p.pelaksanaan) as year, count(p.pelaksanaan) as jumlah');
      $this->db->group_by("month(p.pelaksanaan), year(p.pelaksanaan)",);
      $this->db->order_by("p.pelaksanaan", "ESC");
      $this->db->limit(12);
    }elseif ($type == 'pie') {
      $bln = date('m');
      $yr = date('Y');
      $this->db->select('p.kategori, count(p.kategori) as jumlah');
      $this->db->group_by("p.kategori",);
      $this->db->where('month(p.pelaksanaan)' , $bln);
      $this->db->where('year(p.pelaksanaan)' , $yr);
    }
    $this->db->from('proyek p');
    $query = $this->db->get_where()->result_array();
    // var_dump($query);
      echo json_encode($query);
  }

public function dataUser()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  if ($data['user']['akses'] != 1) {
  redirect('auth/login');
  }
  $data['dataUser']=  $this->db->get_where('user', ['akses !=' =>1])->result_array();
  $this->form_validation->set_rules('nama','nama','required|trim',[
      'required' => 'Nama tidak boleh  kosong'
  ]);
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Data User';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Admin/user', $data);
    $this->load->view('Templates/footer', $data);
    $data['js'] = 'user.js';
    $this->load->view('Templates/javascript', $data);
  }else {
    $password = $this->input->post('password', true);
    if ($password != null) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $this->db->set('password', $password);
    }

    $data = [
      'id_user' => htmlspecialchars($this->input->post('id_user', true)),
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'aktif' => htmlspecialchars($this->input->post('aktif', true))
    ];
    $this->db->set('nama', $data['nama']);
    $this->db->set('no_tlp', $data['no_tlp']);
    $this->db->set('email', $data['email']);
    $this->db->set('aktif', $data['aktif']);
    $this->db->where('id_user', $data['id_user']);
    $this->db->update('user');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil diubah !
        </div>');
      redirect('admin/dataUser');
  }

}
public function DataJalan()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  if ($data['user']['akses'] != 1) {
  redirect('auth/login');
  }
  $this->db->select('j.*, d.nama_desa');
  $this->db->from('jalan j ');
  $this->db->join('desa  d', 'j.id_desa=d.id_desa');
  $this->db->order_by('d.nama_desa', 'DESC');
  $data['jalan']=   $this->db->get_where()->result_array();

  $this->form_validation->set_rules('nama_jalan','nama_jalan','required',[
      'required' => 'Tidak boleh kosong'
    ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data Jalan';
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('admin/jalan', $data);
      $this->load->view('Templates/footer', $data);
      $data['js'] = 'jalan.js';
      $this->load->view('Templates/javascript', $data);
    }else {
    $this->uploadImage();
    }
}
public function dataDesa()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  if ($data['user']['akses'] != 1) {
  redirect('auth/login');
  }
    $this->db->select('d.*,u.nama,k.kecamatan');
    $this->db->from('desa d');
    $this->db->join('user  u', 'u.id_user=d.id_user');
    $this->db->join('kecamatan  k', 'd.id_kecamatan=k.id_kecamatan');
    $this->db->order_by("d.id_desa", "ESC");
    $data['desa'] = $this->db->get_where()->result_array();
    $data['title'] = 'Data Desa';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('Admin/desa', $data);
    $this->load->view('Templates/footer', $data);
    $data['js'] = 'user.js';
    $this->load->view('Templates/javascript', $data);
}
public function laporan()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  $this->load->view('Admin/laporan', $data);
}
public function getData()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('user', ['id_user' => $id])->row_array();
  echo json_encode($data);
}
public function deletUser($id)
{
  $this->db->where('id_user', $id);
  $this->db->delete('user');
  $this->db->where('id_user', $id);
  $this->db->delete('desa');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('admin/dataUser');
}

}
