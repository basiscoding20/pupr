<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jalan extends CI_Controller {
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
  if ($data['user']['akses'] != 3) {
  redirect('auth/login');
  }
  $data['desa']=  $this->db->get_where('desa', ['id_user' => $data['user']['id_user']])->row_array();
  $this->db->select('j.*');
  $this->db->from('jalan j ');
  $this->db->order_by('j.id_jalan', 'DESC');
  $this->db->where('j.id_desa' , $data['desa']['id_desa']);
  $data['jalan']=   $this->db->get_where()->result_array();

  $this->form_validation->set_rules('nama_jalan','nama_jalan','required',[
      'required' => 'Tidak boleh kosong'
    ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data Jalan';
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/desa_sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('jalan/index', $data);
      $this->load->view('Templates/footer', $data);
      $data['js'] = 'jalan.js';
      $this->load->view('Templates/javascript', $data);
    }else {
    $this->uploadImage();
    }
}

public function uploadImage()
{
  $image1 = '';
  $image2 = '';
  $data1 = [
    'Timage' => $_FILES['image1']['name'],
    'url' => './assets/img/jalan',
    'do_upload' => 'image1',
    'redirect' => 'jalan'
  ];
  $image1 = $this->Image_->tambahImage($data1);
  $data2 = [
    'Timage' => $_FILES['image2']['name'],
    'url' => './assets/img/jalan',
    'do_upload' => 'image2',
    'redirect' => 'jalan'
  ];
  $image2 = $this->Image_->tambahImage($data2);
  if ($image1 == '') {
    $image1 = 'default.png';
  }
  if ($image2 == '') {
    $image2 = 'default.png';
  }
  $data = [
    'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
    'nama_jalan' => htmlspecialchars($this->input->post('nama_jalan', true)),
    'panjang' => htmlspecialchars($this->input->post('panjang', true)),
    'lebar' => htmlspecialchars($this->input->post('lebar', true)),
    'pekerasan' => htmlspecialchars($this->input->post('pekerasan', true)),
    'latitude' => htmlspecialchars($this->input->post('latitude', true)),
    'longitude' => htmlspecialchars($this->input->post('longitude', true)),
    'image1' => htmlspecialchars($image1),
    'image2' => htmlspecialchars($image2)
  ];
  $this->db->insert('jalan', $data);
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil ditambahkan
      </div>');
    redirect('jalan');
}
public function update()
  {
    $this->form_validation->set_rules('nama_jalan','nama_jalan','required');
    if ($this->form_validation->run() == false) {
      redirect('jalan');
    }else {
      $id = $this->input->post('id_jalan',true);
      $data['jalan'] =  $this->db->get_where('jalan' , ['id_jalan' => $id])->row_array();
      $data1 = [
        'Timage' => $_FILES['image1']['name'],
        'url' => './assets/img/jalan/',
        'redirect' => 'jalan',
        'do_upload' => 'image1',
        'oldImage' => $data['jalan']['image1']
      ];
        $image1 = $this->Image_->updateImage($data1);
        $data2 = [
          'Timage' => $_FILES['image2']['name'],
          'url' => './assets/img/jalan/',
          'redirect' => 'jalan',
          'do_upload' => 'image2',
          'oldImage' => $data['jalan']['image2']
        ];
          $image2 = $this->Image_->updateImage($data2);
      if ($image1 != null) {
        $this->db->set('image1', $image1);
      }
      if ($image2 != null) {
        $this->db->set('image2', $image2);
      }
          $data = [
            'nama_jalan' => htmlspecialchars($this->input->post('nama_jalan', true)),
            'panjang' => htmlspecialchars($this->input->post('panjang', true)),
            'lebar' => htmlspecialchars($this->input->post('lebar', true)),
            'pekerasan' => htmlspecialchars($this->input->post('pekerasan', true)),
            'latitude' => htmlspecialchars($this->input->post('latitude', true)),
            'longitude' => htmlspecialchars($this->input->post('longitude', true))
          ];
          $this->db->set('nama_jalan', $data['nama_jalan']);
          $this->db->set('panjang', $data['panjang']);
          $this->db->set('lebar', $data['lebar']);
          $this->db->set('pekerasan', $data['pekerasan']);
          $this->db->set('latitude', $data['latitude']);
          $this->db->set('longitude', $data['longitude']);
          $this->db->where('id_jalan', $id);
          $this->db->update('jalan');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
              Berhasil diubah !
              </div>');
            redirect('jalan');
    }
  }
public function dataJalan()
{
  $id = $this->input->post('id');
  $this->db->select('j.*, d.nama_desa');
  $this->db->from('jalan j ');
  $this->db->join('desa  d', 'j.id_desa=d.id_desa');
  $this->db->order_by('d.nama_desa', 'DESC');
  $this->db->where('j.id_jalan' , $id);
  $data=  $this->db->get_where()->row_array();
  echo json_encode($data);
}
public function hapusjalan($id)
{
  $data['jalan'] =  $this->db->get_where('jalan' , ['id_jalan' => $id])->row_array();
  $data1 = [
    'url' => './assets/img/jalan/',
    'oldImage' => $data['jalan']['image1']
  ];
  $this->Image_->deleteImage($data1);
  $data2 = [
    'url' => './assets/img/jalan/',
    'oldImage' => $data['jalan']['image2']
  ];
  $this->Image_->deleteImage($data2);

  $this->db->where('id_jalan', $id);
  $this->db->delete('jalan');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('jalan');
}


}
