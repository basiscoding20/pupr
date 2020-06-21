<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proyek extends CI_Controller {
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
  $data['proyek_jalan']=  $this->User_->getProyek();
  $data['title'] = 'Proyek jalan';
  $this->load->view('Templates/header', $data);
  $this->load->view('Templates/sidebar', $data);
  $this->load->view('Templates/topbar', $data);
  $this->load->view('proyek/index', $data);
  $this->load->view('Templates/footer', $data);
  $this->load->view('Templates/javascript', $data);
}
public function input()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  $data['proyek']=  $this->User_->getProyek();
  $data['kontruksi']=  $this->auth_->getKontruksi();
  $data['jasa_kontruksi']=  $this->db->get('jasa_kontruksi')->result_array();
  $this->form_validation->set_rules('id_kontruksi','id_kontruksi','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('id_jasa','id_jasa','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('kategori','kategori','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('tanggal_kontrak','tanggal_kontrak','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('akhir_kontrak','akhir_kontrak','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('pelaksanaan','pelaksanaan','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('sumber_dana','sumber_dana','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('tahun_anggaran','tahun_anggaran','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Proyek jalan';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('proyek/input', $data);
    $this->load->view('Templates/footer', $data);
    $data['js'] = 'Proyek.js';
    $this->load->view('Templates/javascript', $data);
  }else {
    $image1 = '';
    $image2 = '';
    $data1 = [
      'Timage' => $_FILES['image1']['name'],
      'url' => './assets/img/proyek',
      'do_upload' => 'image1',
      'redirect' => 'proyek/input'
    ];
    $image1 = $this->Image_->tambahImage($data1);
    $data2 = [
      'Timage' => $_FILES['image2']['name'],
      'url' => './assets/img/proyek',
      'do_upload' => 'image2',
      'redirect' => 'proyek/input'
    ];
    $image2 = $this->Image_->tambahImage($data2);
    if ($image1 == '') {
      $image1 = 'default.png';
    }
    if ($image2 == '') {
      $image2 = 'default.png';
    }
    $data = [
        'id_kontruksi' => htmlspecialchars($this->input->post('id_kontruksi', true)),
        'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        'id_jasa' => htmlspecialchars($this->input->post('id_jasa', true)),
        'tanggal_kontrak' => htmlspecialchars($this->input->post('tanggal_kontrak', true)),
        'akhir_kontrak' => htmlspecialchars($this->input->post('akhir_kontrak', true)),
        'pelaksanaan' => htmlspecialchars($this->input->post('pelaksanaan', true)),
        'sumber_dana' => htmlspecialchars($this->input->post('sumber_dana', true)),
        'tahun_anggaran' => htmlspecialchars($this->input->post('tahun_anggaran', true)),
        'image1' => htmlspecialchars($image1),
        'image2' => htmlspecialchars($image2),
        'keterangan' => htmlspecialchars($this->input->post('keterangan', true))

    ];
    $this->db->insert('proyek', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil ditambahkan
        </div>');
      redirect('proyek');
  }

}
public function edit($id = null)
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));

  $this->form_validation->set_rules('kategori','kategori','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('tanggal_kontrak','tanggal_kontrak','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('akhir_kontrak','akhir_kontrak','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('pelaksanaan','pelaksanaan','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('sumber_dana','sumber_dana','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('tahun_anggaran','tahun_anggaran','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  if ($this->form_validation->run() == false) {
    $data['proyek']=  $this->User_->getProyek($id);
    $data['title'] = 'Proyek jalan';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('proyek/edit', $data);
    $this->load->view('Templates/footer', $data);
    $this->load->view('Templates/javascript', $data);
  }else {
    $image1 = '';
    $image2 = '';
    $data['proyek']=  $this->User_->getProyek($this->input->post('id_proyek'));
    $data1 = [
      'Timage' => $_FILES['image1']['name'],
      'url' => './assets/img/proyek/',
      'redirect' => 'proyek/edit',
      'do_upload' => 'image1',
      'oldImage' => $data['proyek']['image1']
    ];
      $image1 = $this->Image_->updateImage($data1);
      $data2 = [
        'Timage' => $_FILES['image2']['name'],
        'url' => './assets/img/proyek/',
        'redirect' => 'proyek/edit',
        'do_upload' => 'image2',
        'oldImage' => $data['proyek']['image2']
      ];
        $image2 = $this->Image_->updateImage($data2);
    if ($image1 != null) {
      $this->db->set('image1', $image1);
    }
    if ($image2 != null) {
      $this->db->set('image2', $image2);
    }
    $data = [
        'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        'tanggal_kontrak' => htmlspecialchars($this->input->post('tanggal_kontrak', true)),
        'akhir_kontrak' => htmlspecialchars($this->input->post('akhir_kontrak', true)),
        'pelaksanaan' => htmlspecialchars($this->input->post('pelaksanaan', true)),
        'sumber_dana' => htmlspecialchars($this->input->post('sumber_dana', true)),
        'tahun_anggaran' => htmlspecialchars($this->input->post('tahun_anggaran', true)),
        'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
    ];
    $this->db->set('kategori', $data['kategori']);
    $this->db->set('keterangan', $data['keterangan']);
    $this->db->set('tanggal_kontrak', $data['tanggal_kontrak']);
    $this->db->set('akhir_kontrak', $data['akhir_kontrak']);
    $this->db->set('pelaksanaan', $data['pelaksanaan']);
    $this->db->set('sumber_dana', $data['sumber_dana']);
    $this->db->set('tahun_anggaran', $data['tahun_anggaran']);
    $this->db->where('id_proyek', $this->input->post('id_proyek'));
    $this->db->update('proyek');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil di update
        </div>');
      redirect('proyek');
  }
}
public function delete($id)
{
  $data['proyek'] =  $this->db->get_where('proyek' , ['id_proyek' => $id])->row_array();
  $data1 = [
    'url' => './assets/img/proyek/',
    'oldImage' => $data['proyek']['image1']
  ];
  $this->Image_->deleteImage($data1);
  $data2 = [
    'url' => './assets/img/proyek/',
    'oldImage' => $data['proyek']['image2']
  ];
  $this->Image_->deleteImage($data2);
  $this->db->where('id_proyek', $id);
  $this->db->delete('proyek');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('proyek');
}
}
