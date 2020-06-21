<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {
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
  $data['kategori']=  $this->db->get('kategori')->result_array();

  $this->form_validation->set_rules('kategori','kategori','required|trim',[
      'required' => 'Nama kontruksi kosong'
  ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data pelaksanan kontruksi';
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('kategori/index', $data);
      $this->load->view('Templates/footer', $data);
      $data['js'] = 'kategori.js';
      $this->load->view('Templates/javascript', $data);
    }else {
      $data = [
        'kategori' => htmlspecialchars($this->input->post('kategori', true))
      ];
      $this->db->insert('kategori', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil ditambahkan
          </div>');
        redirect('kategori');
    }
}

public function update()
{
  $this->form_validation->set_rules('kategori','kategori','required|trim',[
      'required' => 'tidak boleh  kosong'
  ]);
  if ($this->form_validation->run() == false) {
    redirect('jasa_Kontruksi');
  }else {
    $data = [
      'id_kategori' => htmlspecialchars($this->input->post('id_kategori', true)),
      'kategori' => htmlspecialchars($this->input->post('kategori', true))
    ];
    $this->db->where('id_kategori', $data['id_kategori']);
    $this->db->update('kategori', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil di Update
        </div>');
      redirect('kategori');
  }
}

public function dataKategori()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('kategori', ['id_kategori' => $id])->row_array();
  echo json_encode($data);
}
public function hapus($id)
{
  $this->db->where('id_kategori', $id);
  $this->db->delete('kategori');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('kategori');
}



}
