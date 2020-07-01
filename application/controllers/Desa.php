<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Desa extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model','User_');
  }
  public function index()
  {
    $data['user']= $this->User_->getUser($this->session->userdata('email'));
    if ($data['user']['akses'] != 3) {
    redirect('auth/login');
    }
    $data['title'] = 'Dashboard Admin';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/desa_sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('desa/index', $data);
    $this->load->view('Templates/footer', $data);
    $this->load->view('Templates/javascript', $data);
  }
  public function dataProyek()
  {
    $data['user']= $this->User_->getUser($this->session->userdata('email'));
    if ($data['user']['akses'] != 3) {
    redirect('auth/login');
    }
    $this->db->select('p.*,j.nama_jalan,k.nama_jasa');
    $this->db->from('proyek p');
    $this->db->join('jalan  j', 'p.id_jalan=j.id_jalan');
    $this->db->join('desa  d', 'd.id_desa=j.id_desa');
    $this->db->join('jasa_kontruksi  k', 'p.id_jasa=k.id_jasa');
    $this->db->where('d.id_user' , $data['user']['id_user']);
    $data['proyek_jalan']=  $this->db->get_where()->result_array();

    $data['title'] = 'Proyek jalan';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/desa_sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('desa/dataProyek', $data);
    $this->load->view('Templates/footer', $data);
    $data['js'] = 'desa.js';
    $this->load->view('Templates/javascript', $data);
  }
public function Profile()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  if ($data['user']['akses'] != 3) {
  redirect('auth/login');
  }
  $this->db->select('d.*,k.kecamatan');
  $this->db->from('desa d ');
  $this->db->join('kecamatan  k', 'k.id_kecamatan=d.id_kecamatan');
  $this->db->where('d.id_user', $data['user']['id_user']);
  $data['desa']= $this->db->get_where()->row_array();
  $data['kd_desa'] = $this->db->get_where('desa' , ['id_user' => $data['user']['id_user']])->row_array();
  $data['kecamatan']= $this->db->get('kecamatan')->result_array();
  $data['title'] = 'Desa';

  $this->form_validation->set_rules('nama_desa','nama_desa','required|trim',[
      'required' => 'Tidak boleh kosong'
    ]);
  if ($this->form_validation->run() == false) {
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/desa_sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('desa/Profile', $data);
    $this->load->view('Templates/footer', $data);
    $this->load->view('Templates/javascript', $data);
  }else {
    $data1 = [
      'id_desa' => htmlspecialchars($this->input->post('id_desa', true)),
      'id_kecamatan' => htmlspecialchars($this->input->post('id_kecamatan', true)),
      'nama_desa' => htmlspecialchars($this->input->post('nama_desa', true)),
      'alamat_kantor' => htmlspecialchars($this->input->post('alamat_kantor', true))
    ];
    $this->db->where('id_desa', $data1['id_desa']);
    $this->db->update('desa' , $data1);
    $data2 = [
      'id_user' => htmlspecialchars($this->input->post('id_user', true)),
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true))
    ];
    $this->db->where('id_user', $data2['id_user']);
    $this->db->update('user' , $data2);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil diubah !
        </div>');
      redirect('desa/profile');
  }
}


}
