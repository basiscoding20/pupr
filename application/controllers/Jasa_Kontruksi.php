<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jasa_Kontruksi extends CI_Controller {
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
  if ($data['user']['akses'] != 1) {
  redirect('auth/login');
  }
  $data['jasa']=  $this->db->get('jasa_Kontruksi')->result_array();

  $this->form_validation->set_rules('nama_jasa','nama_jasa','required|trim',[
      'required' => 'Nama kontruksi kosong'
  ]);
  $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[jasa_Kontruksi.email]',[
    'required' => 'Tidak boleh kosong',
    'is_unique' => 'Email sudah terdaftar'
  ]);
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data pelaksanan kontruksi';
      $this->load->view('Templates/header', $data);
      $this->load->view('Templates/sidebar', $data);
      $this->load->view('Templates/topbar', $data);
      $this->load->view('jasa_Kontruksi/index', $data);
      $this->load->view('Templates/footer', $data);
      $data['js'] = 'jasa_Kontruksi.js';
      $this->load->view('Templates/javascript', $data);
    }else {
      $data = [
        'nama_jasa' => htmlspecialchars($this->input->post('nama_jasa', true)),
        'alamat' => htmlspecialchars($this->input->post('alamat', true)),
        'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
        'email' => htmlspecialchars($this->input->post('email', true))
      ];
      $this->db->insert('jasa_kontruksi', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil ditambahkan
          </div>');
        redirect('jasa_Kontruksi');
    }
}

public function update()
{
  $this->form_validation->set_rules('nama_jasa','nama_jasa','required|trim',[
      'required' => 'Nama jasa kosong'
  ]);
  if ($this->form_validation->run() == false) {
    redirect('jasa_Kontruksi');
  }else {
    $data = [
      'id_jasa' => htmlspecialchars($this->input->post('id_jasa', true)),
      'nama_jasa' => htmlspecialchars($this->input->post('nama_jasa', true)),
      'alamat' => htmlspecialchars($this->input->post('alamat', true)),
      'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
      'email' => htmlspecialchars($this->input->post('email', true))
    ];
    $this->db->where('id_jasa', $data['id_jasa']);
    $this->db->update('jasa_kontruksi', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil di Update
        </div>');
      redirect('jasa_Kontruksi');
  }
}

public function dataJasa()
{
  $id = $this->input->post('id');

  $data= $this->db->get_where('jasa_Kontruksi', ['id_jasa' => $id])->row_array();
  echo json_encode($data);
}
public function hapus($id)
{
  $this->db->where('id_jasa', $id);
  $this->db->delete('jasa_kontruksi');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('jasa_Kontruksi');
}
public function password()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  $this->form_validation->set_rules('password1','Password', 'required|trim|min_length[4]|matches[password2]',[
    'required' => 'Tidak boleh kosong',
    'min_length' => 'Terlalu pendek',
    'matches' => 'Password tidak sama'
  ]);
  $this->form_validation->set_rules('password2','Password', 'required|trim|matches[password1]');
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Ubah Password';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('auth/changePassword', $data);
    $this->load->view('Templates/footer', $data);
    $this->load->view('Templates/javascript', $data);
  }else {
    $this->db->set('password', password_hash($this->input->post('password1'), PASSWORD_DEFAULT));
    $this->db->where('id_user', $this->input->post('id_user'));
    $this->db->update('user' );
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Password  Berhasil diubah !
        </div>');
      redirect('auth/logout');
  }
}


}
