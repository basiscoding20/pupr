<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontruksi extends CI_Controller {
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
  $data['kontruksi']=  $this->auth_->getKontruksi();
  $data['kategori']=  $this->db->get('kategori')->result_array();

  $this->form_validation->set_rules('nama_kontruksi','nama_kontruksi','required',[
      'required' => 'Tidak boleh kosong'
    ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data Kontruksi';
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('Kontruksi/index', $data);
      $this->load->view('Templates/footer', $data);
      $data['js'] = 'kontruksi.js';
      $this->load->view('Templates/javascript', $data);
    }else {
    $this->uploadImage();
    }
}

public function uploadImage()
{
  $image = '';
  $data = [
    'Timage' => $_FILES['image']['name'],
    'url' => './assets/img/kontruksi/',
    'do_upload' => 'image',
    'redirect' => 'kontruksi'
  ];
  $image = $this->Image_->tambahImage($data);
if ($image == '') {
  $image = 'default.png';
}
  $data = [
    'id_kategori' => htmlspecialchars($this->input->post('kategori', true)),
    'nama_kontruksi' => htmlspecialchars($this->input->post('nama_kontruksi', true)),
    'luas' => htmlspecialchars($this->input->post('luas', true)),
    'latitude' => htmlspecialchars($this->input->post('latitude', true)),
    'longitude' => htmlspecialchars($this->input->post('longitude', true)),
    'image' => htmlspecialchars($image)
  ];
  var_dump($data);
  $this->db->insert('kontruksi', $data);
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil ditambahkan
      </div>');
    redirect('kontruksi');
}
public function update()
  {
    $this->form_validation->set_rules('nama_kontruksi','nama_kontruksi','required');
    if ($this->form_validation->run() == false) {
      redirect('kontruksi');
    }else {
      $id = $this->input->post('id_kontruksi',true);
      $data['kontruksi'] =  $this->db->get_where('kontruksi' , ['id_kontruksi' => $id])->row_array();
      $data = [
        'Timage' => $_FILES['image']['name'],
        'url' => './assets/img/kontruksi/',
        'redirect' => 'kontruksi',
        'do_upload' => 'image',
        'oldImage' => $data['kontruksi']['image']
      ];
        $image = $this->Image_->updateImage($data);
        if ($image != null) {
          $this->db->set('image', $image);
        }
          $data = [
            'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
            'nama_kontruksi' => htmlspecialchars($this->input->post('nama_kontruksi', true)),
            'luas' => htmlspecialchars($this->input->post('luas', true)),
            'latitude' => htmlspecialchars($this->input->post('latitude', true)),
            'longitude' => htmlspecialchars($this->input->post('longitude', true))
          ];
          $this->db->set('nama_kontruksi', $data['nama_kontruksi']);
          $this->db->set('luas', $data['luas']);
          $this->db->set('latitude', $data['latitude']);
          $this->db->set('longitude', $data['longitude']);
          $this->db->where('id_kontruksi', $id);
          $this->db->update('kontruksi');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
              Berhasil diubah !
              </div>');
            redirect('kontruksi');
    }
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
