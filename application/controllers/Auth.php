<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Image_model','Image_');
    $this->load->model('auth_model','auth_');
    $this->load->model('User_model','user_');
  }
public function index()
{
  $data['title'] = 'Home';
  $data['proyek'] = $this->user_->getProyek();
  $this->load->view('Auth/index' , $data);
}
public function pengaduan_masyarakat()
{
  $data['kontruksi']=  $this->auth_->getKontruksi();
  $data['title'] = 'Pengaduan Masyarakat';
  $this->form_validation->set_rules('nama_masyarakat','nama_masyarakat','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  if ($this->form_validation->run() == false) {
    $data['script'] = 'pengaduan.js';
    $this->load->view('Auth/pengaduan_masyarakat' , $data);
  }else {
    $image = '';
    $data = [
      'Timage' => $_FILES['image']['name'],
      'url' => './assets/img/pengaduan/',
      'do_upload' => 'image',
      'redirect' => 'auth/pengaduan_masyarakat'
    ];
    $image = $this->Image_->tambahImage($data);
  if ($image == '') {
    $image = 'default.png';
  }
    $data = [
      'id_kontruksi' => htmlspecialchars($this->input->post('id_kontruksi', true)),
      'nama_masyarakat' => htmlspecialchars($this->input->post('nama_masyarakat', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
      'image' => htmlspecialchars($image),
      'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
    ];
    $this->db->insert('pengaduan_masyarakat', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil ditambahkan
        </div>');
      redirect('auth/view/'.$data['id_kontruksi']);
  }
}
public function view($id)
{
  $data['header']= $this->auth_->getView('header',$id);
  $data['proyek']= $this->auth_->getView('proyek',$id);
  $data['pengaduan_masyarakat']= $this->db->get_where('pengaduan_masyarakat', ['id_kontruksi' => $id])->result_array();
  $data['title'] = $data['header']['nama_kontruksi'];
  $data['script'] = 'view.js';
  $this->load->view('Auth/view' , $data);
}
public function getData()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('kontruksi' , ['id_kontruksi' => $id])->row_array();
  echo json_encode($data);
}
public function getDataPengaduan()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('pengaduan_masyarakat' , ['id_pengaduan' => $id])->row_array();
  echo json_encode($data);
}
public function getDataDetails()
{
  $id = $this->input->post('id');
  $data= $this->auth_->getDetails($id);
  echo json_encode($data);
}
public function login()
{
  if ($this->session->userdata('email')) {
      redirect ('admin');
    }
  $this->form_validation->set_rules('email','Email', 'trim|required|trim|valid_email',[
    'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('password','Password', 'required|trim',[
    'required' => 'Tidak boleh kosong',
  ]);
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Form login';
    $this->load->view('Auth/auth_header', $data);
    $this->load->view('Auth/login');
    $this->load->view('Auth/auth_footer');
  }else {
    $this->_login();
  }
}
private function _login()
{
  $email = $this->input->post('email');
  $password = $this->input->post('password');

  $user = $this->db->get_where('user', ['email' => $email])->row_array();

  if ($user) {
    if (password_verify($password, $user['password'])) {
      $data = [
        'email' => $user['email']
      ];
      $this->session->set_userdata($data);
      redirect('admin');
    }else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
              Password salah!
            </div>');
            redirect('auth/login');
    }

  }else {
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Email belum Terdaftar!
        </div>');
        redirect('auth/login');
  }
}
public function logout()
{
  $this->session->unset_userdata('email');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
     Anda telah log out!
    </div>');
  redirect('auth/login');
}

}
