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
  $data['jalan']=  $this->auth_->getKontruksi();
  $data['id_proyek'] = $this->Image_->idProyek();
  $data['jasa_kontruksi']=  $this->db->get('jasa_kontruksi')->result_array();
  $this->form_validation->set_rules('id_jalan','id_jalan','required',[
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
  $this->form_validation->set_rules('anggaran','anggaran','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  $this->form_validation->set_rules('tahun_anggaran','tahun_anggaran','required',[
      'required' => 'Tidak boleh kosong'
  ]);
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Input Proyek jalan';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('proyek/input', $data);
    $this->load->view('Templates/footer', $data);
    $data['js'] = 'Proyek.js';
    $this->load->view('Templates/javascript', $data);
  }else {
    $id_proyek = $this->input->post('id_proyek',true);
    $progres = $this->input->post('progres',true);
    $files = $_FILES;
    $cpt = count($this->input->post('progres',true));
    for($i=0; $i<$cpt; $i++)
    {
      $_FILES['userfile']['name']= $files['image']['name'][$i];
      $_FILES['userfile']['type']= $files['image']['type'][$i];
      $_FILES['userfile']['tmp_name']= $files['image']['tmp_name'][$i];
      $_FILES['userfile']['error']= $files['image']['error'][$i];
      $_FILES['userfile']['size']= $files['image']['size'][$i];
      $config['upload_path'] = './assets/img/proyek';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']      = '0';
      $this->load->library('upload');
      $this->upload->initialize($config);
      $this->upload->do_upload();
      $image = $this->upload->data('file_name');
      if (!$image) {
        $image = 'default.png';
      }
      $data = [
        'id_proyek' => htmlspecialchars($id_proyek),
        'progres' => htmlspecialchars($progres[$i]),
        'image' => htmlspecialchars($image)
      ];
      $this->db->insert('image', $data);
    }
    $data = [
        'id_proyek' => htmlspecialchars($id_proyek),
        'id_jalan' => htmlspecialchars($this->input->post('id_jalan', true)),
        'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        'id_jasa' => htmlspecialchars($this->input->post('id_jasa', true)),
        'tanggal_kontrak' => htmlspecialchars($this->input->post('tanggal_kontrak', true)),
        'akhir_kontrak' => htmlspecialchars($this->input->post('akhir_kontrak', true)),
        'pelaksanaan' => htmlspecialchars($this->input->post('pelaksanaan', true)),
        'sumber_dana' => htmlspecialchars($this->input->post('sumber_dana', true)),
        'anggaran' => htmlspecialchars($this->input->post('anggaran', true)),
        'tahun_anggaran' => htmlspecialchars($this->input->post('tahun_anggaran', true)),
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
    $data['image']=  $this->db->get_where('image', ['id_proyek' => $data['proyek']['id_proyek']])->result_array();
    $data['title'] = 'Update Proyek jalan';
    $this->load->view('Templates/header', $data);
    $this->load->view('Templates/sidebar', $data);
    $this->load->view('Templates/topbar', $data);
    $this->load->view('proyek/edit', $data);
    $this->load->view('Templates/footer', $data);
    $data['js'] = 'Proyek.js';
    $this->load->view('Templates/javascript', $data);
  }else {
    $id_proyek = $this->input->post('id_proyek',true);
    $progres = $this->input->post('progres',true);
    $files = $_FILES;
    $cpt = count($this->input->post('progres',true));
    for($i=0; $i<$cpt; $i++)
    {
      $data['image']=  $this->db->get_where('image', ['id_proyek' => $id_proyek, 'progres' => $progres[$i]])->row_array();
      $_FILES['userfile']['name']= $files['image']['name'][$i];
      $_FILES['userfile']['type']= $files['image']['type'][$i];
      $_FILES['userfile']['tmp_name']= $files['image']['tmp_name'][$i];
      $_FILES['userfile']['error']= $files['image']['error'][$i];
      $_FILES['userfile']['size']= $files['image']['size'][$i];
      $config['upload_path'] = './assets/img/proyek';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']      = '0';
      $this->load->library('upload');
      $this->upload->initialize($config);
      if ($this->upload->do_upload()) {
        $old_image = $data['image']['image'];
        if ($old_image != 'default.png') {
          unlink(FCPATH. './assets/img/proyek/'.$old_image);
        }
        $image = $this->upload->data('file_name');
        $this->db->set('image', $image);
      }
      $this->db->set('progres', $progres[$i]);
      $this->db->where('id_proyek', $id_proyek);
      $this->db->where('progres', $progres[$i]);
      $this->db->update('image');
    }
    $data = [
        'kategori' => htmlspecialchars($this->input->post('kategori', true)),
        'tanggal_kontrak' => htmlspecialchars($this->input->post('tanggal_kontrak', true)),
        'akhir_kontrak' => htmlspecialchars($this->input->post('akhir_kontrak', true)),
        'pelaksanaan' => htmlspecialchars($this->input->post('pelaksanaan', true)),
        'sumber_dana' => htmlspecialchars($this->input->post('sumber_dana', true)),
        'anggaran' => htmlspecialchars($this->input->post('anggaran', true)),
        'tahun_anggaran' => htmlspecialchars($this->input->post('tahun_anggaran', true)),
        'keterangan' => htmlspecialchars($this->input->post('keterangan', true))
    ];
    $this->db->where('id_proyek', $id_proyek);
    $this->db->update('proyek', $data);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Berhasil di update
        </div>');
      redirect('proyek');
  }
}
public function delete($id)
{
  $data['image'] =  $this->db->get_where('image' , ['id_proyek' => $id])->result_array();
  foreach ($data['image'] as $key) {
    $data = [
      'url' => './assets/img/proyek/',
      'oldImage' => $key['image']
    ];
    $this->Image_->deleteImage($data);
  }
  $this->db->where('id_proyek', $id);
  $this->db->delete('image');
  $this->db->where('id_proyek', $id);
  $this->db->delete('proyek');
  $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Terhapus
    </div>');
    redirect('proyek');
}
public function print($id)
{
  $this->load->library('dompdf_gen');
  $data['proyek']=  $this->User_->getProyek($id);
  $data['image']=  $this->db->get_where('image', ['id_proyek' => $id])->result_array();

  $data['jasa']=  $this->db->get_where('jasa_kontruksi' , ['id_jasa' => $data['proyek']['id_jasa']])->row_array();
  $this->db->select('j.*,d.nama_desa');
  $this->db->from('jalan j ');
  $this->db->join('desa  d', 'd.id_desa=j.id_desa');
  $this->db->order_by('j.id_jalan', 'DESC');
  $this->db->where('j.id_jalan' , $data['proyek']['id_jalan']);
  $data['jalan']=  $this->db->get_where()->row_array();

  $this->load->view('proyek/print_proyek', $data);

  $paper_size = 'F4';
  $orientation = 'potret';
  $html = $this->output->get_output();
  $this->dompdf->set_paper($paper_size,$orientation);
  $this->dompdf->load_html($html);
  $this->dompdf->render();
  $this->dompdf->stream("Laporan_proyek.pdf", array('Attachment' => 0));
}
}
