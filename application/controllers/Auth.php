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
  $data['proyek'] = $this->user_->getProyek4();
  $data['jalan'] = $this->user_->getJalan4();
  $this->load->view('Auth/index' , $data);
}
public function jalan()
{
  $data['jalan']=  $this->auth_->getKontruksi();
  $data['title'] = 'Data Jalan';
    $data['script'] = 'pengaduan.js';
    $this->load->view('Auth/jalan' , $data);
}
public function pengaduan_masyarakat()
{
  $data['jalan']=  $this->auth_->getKontruksi();
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
      'id_jalan' => htmlspecialchars($this->input->post('id_jalan', true)),
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
      redirect('auth/view/'.$data['id_jalan']);
  }
}
public function view($id)
{
  $data['header']= $this->auth_->getView('header',$id);
  $data['proyek']= $this->auth_->getView('proyek',$id);
  $data['pengaduan_masyarakat']= $this->db->get_where('pengaduan_masyarakat', ['id_jalan' => $id])->result_array();
  $data['title'] = $data['header']['nama_jalan'];
  $data['script'] = 'view.js';
  $this->load->view('Auth/view' , $data);
}
public function getData()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('jalan' , ['id_jalan' => $id])->row_array();
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
public function getDataImage()
{
  $id = $this->input->post('id');
  $data= $this->db->get_where('image', ['id_proyek' =>$id])->result_array();
  echo json_encode($data);
}
public function login()
{
  if ($this->session->userdata('email')) {
      $data['user']= $this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
      if ($data['user']['akses'] == 1) {
        redirect ('admin');
      }elseif ($data['user']['akses'] == 2) {
        redirect ('pimpinan');
      }elseif ($data['user']['akses'] == 3) {
        redirect ('desa');
      }
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
    if ($user['aktif'] == 1) {
      if (password_verify($password, $user['password'])) {
        $data = [
          'email' => $user['email']
        ];
        $this->session->set_userdata($data);
        if ($user['akses'] == 1) {
          redirect('admin');
        }elseif ($user['akses'] == 2) {
          redirect('pimpinan');
        }elseif ($user['akses'] == 3) {
          redirect('desa');
        }
      }else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Password salah!
              </div>');
              redirect('auth/login');
      }
    }else {
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Email belum aktivasi!
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
public function registrasi()
{
  if ($this->session->userdata('email')) {
      redirect ('admin');
    }
    $this->form_validation->set_rules('nama','Nama', 'required|trim',[
        'required' => 'Tidak boleh kosong'
      ]);
      $this->form_validation->set_rules('no_tlp','no_tlp', 'is_natural|required|trim',[
        'required' => 'Tidak boleh kosong',
        'is_natural' => 'Tidak boleh huruf'
      ]);
      $this->form_validation->set_rules('email','Email', 'trim|required|trim|valid_email|is_unique[user.email]',[
        'required' => 'Tidak boleh kosong',
        'is_unique' => 'Email sudah terdaftar'
      ]);
      $this->form_validation->set_rules('password1','Password', 'required|trim|min_length[3]|matches[password2]',[
        'required' => 'Tidak boleh kosong',
        'min_length' => 'Terlalu pendek',
        'matches' => 'Password tidak sama'
      ]);
      $this->form_validation->set_rules('password2','Password', 'required|trim|matches[password1]');
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Form Registrasi';
    $this->load->view('Auth/auth_header', $data);
    $this->load->view('Auth/registrasi');
    $this->load->view('Auth/auth_footer');
  }else {
    $email = $this->input->post('email', true);
    $data = [
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
      'email' => htmlspecialchars($email),
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'date_created' => htmlspecialchars(time()),
      'aktif' => htmlspecialchars(0, true),
      'akses' => htmlspecialchars(3, true)
    ];
      // membuat token
      $token = base64_encode(random_bytes(32));
      $user_token =[
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];
      //simpan data user ke table user dan user token
      $this->db->insert('user_token', $user_token);
      $this->_sendEmail($token, 'verify');
      $this->db->insert('user', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      BERHASIL CEK E-MAIL UNTUK VALIDASI !
      </div>');
      redirect('auth/login');
  }
}
private function _sendEmail($token, $type)
{
  $this->load->library('email');
  $config = [
    'protocol' => 'smtp',
    'smtp_host' => 'ssl://smtp.googlemail.com',
    'smtp_user' => 'kstkabayan@gmail.com',
    'smtp_pass' => 'deninokia135',
    'smtp_port' => 465,
    'mailtype' => 'html',
    'charset' => 'utf-8'
  ];
      $this->email->initialize($config);
      $this->email->set_newline("\r\n");
  //pengiriman email
  $this->email->from('kstkabayan@gmail.com', 'Si Kabayan');
  $this->email->to($this->input->post('email'));
  if ($type == 'verify') {
    $this->email->subject('verify');
    $this->email->message('Click this link to verify you account : <a href="'.base_url().'auth/verify?email='. $this->input->post('email').'&token='.urlencode($token).'">Active</a>');
  }elseif ($type == 'lupapassword') {
    $this->email->subject('Reset Password');
    $this->email->message('Click this link to Reset you Password : <a href="'.base_url().'auth/resetpassword?email='. $this->input->post('email').'&token='. urlencode($token).'">Reset Password</a>');
  }

  if ( $this->email->send()) {
    return true;
  }else {
    echo $this->email->print_debugger();
    die;
  }
}
public function verify()
{
  $email = $this->input->get('email');
  $token = $this->input->get('token');

  $user = $this->db->get_where('user',['email' => $email])->row_array();
  if ($user) {
    $user_token = $this->db->get_where('user_token', ['token' => $token, 'email' => $email])->row_array();
    if ($user_token) {
      if (time() - $user_token['date_created'] < (60*60*24)) {
        $this->db->set('aktif', 1);
        $this->db->where('email', $email);
        $this->db->update('user');
        $data = [
          'id_user' => htmlspecialchars($user['id_user']),
          'id_kecamatan' => htmlspecialchars(''),
          'nama_desa' => htmlspecialchars(''),
          'alamat_kantor' => htmlspecialchars('')
        ];
        $this->db->insert('desa', $data);
        $this->db->delete('user_token', ['email' => $email]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            '.$email.' Sudah Aktif  silahkan login
          </div>');
          redirect('auth/login');
      }
    }else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Token invailid  aktivasi gagal
          </div>');
          redirect('auth/login');
    }
  }else {
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          email salah aktivasi gagal
        </div>');
        redirect('auth/login');
  }

}
public function lupaPassword()
{
  $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Lupa Password';
    $this->load->view('auth/auth_header', $data);
    $this->load->view('auth/lupapassword');
    $this->load->view('auth/auth_footer');
  }else {
    $email = $this->input->post('email');
    $user = $this->db->get_where('user', ['email' => $email, 'aktif' => 1])->row_array();
    if ($user) {
      $token = base64_encode(random_bytes(32));
      $user_token = [
        'email' => $email,
        'token' => $token,
        'date_created' => time()
      ];
      $this->db->insert('user_token', $user_token);
      $this->_sendEmail($token, 'lupapassword');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        cek email untuk reset password
        </div>');
      redirect('auth/lupaPassword');
    }else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Email Belum terdaftar atau belum aktive
        </div>');
      redirect('auth/lupaPassword');
    }
  }
}
public function resetpassword()
{
  $email = $this->input->get('email');
  $token = $this->input->get('token');

  $user = $this->db->get_where('user', ['email' => $email])->row_array();

  if ($user) {
    $user_token = $this->db->get_where('user_token', ['token' => $token, 'email' => $email])->row_array();
    if ($user_token) {
      //kija token lebih dari 3 menit  kan hangus
      if (time() - $user_token['date_created'] < (3*60)) {
        $this->session->set_userdata('reset_email', $email );
        $this->ubahpassword();
      }else {
        $this->db->delete('user_token', ['email' => $email]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
           Token expired reset gagal
          </div>');
        redirect('auth');
      }
    }else {
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Token Salah reset gagal
        </div>');
      redirect('auth');
    }
  }else {
    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
       Email Salah reset gagal
      </div>');
    redirect('auth');
  }
}
public function ubahpassword()
{
  if (!$this->session->userdata('reset_email')) {
    redirect('auth');
  }
  $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
  $this->form_validation->set_rules('password2', 'UlangPassword', 'trim|required|min_length[3]|matches[password1]');
  if ($this->form_validation->run() == false) {
    $data['title'] = 'Ubah Password';
    $this->load->view('auth/auth_header', $data);
    $this->load->view('auth/ubahpassword');
    $this->load->view('auth/auth_footer');
  }else {
    $password = password_hash($this->input->post('password1'),PASSWORD_DEFAULT);
    $email = $this->session->userdata('reset_email');
    $this->db->set('password', $password);
    $this->db->where('email', $email);
    $this->db->update('user');
    // hapus token
    $this->db->delete('user_token', ['email' => $email]);
    //hapus session
    $this->session->unset_userdata('reset_email');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
       password tereset silahkan login
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
