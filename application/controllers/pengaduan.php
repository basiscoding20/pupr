<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model','User_');
    $this->load->model('Image_model','Image_');
    $this->load->model('auth_model','auth_');
  }
  //kecamatan
public function index()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  $data['pengaduan']=  $this->auth_->getPengaduan();
  $data['title'] = 'Data Pengaduan Masyarakat';
  $this->load->view('Templates/header', $data);
  $this->load->view('Templates/sidebar', $data);
  $this->load->view('Templates/topbar', $data);
  $this->load->view('pengaduan/index', $data);
  $this->load->view('Templates/footer', $data);
  $data['js'] = 'pengaduan.js';
  $this->load->view('Templates/javascript', $data);
}
public function dataKontruksi()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('kontruksi', ['id_kontruksi' => $id])->row_array();
  echo json_encode($data);
}
public function hapusjalan($id)
{
  $data['kontruksi'] =  $this->db->get_where('kontruksi' , ['id_kontruksi' => $id])->row_array();
  $data = [
    'url' => './assets/img/kontruksi/',
    'oldImage' => $data['kontruksi']['image']
  ];
  $this->Image_->deleteImage($data);

  $this->db->where('id_kontruksi', $id);
  $this->db->delete('kontruksi');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('kontruksi');
}


}
