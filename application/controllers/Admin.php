<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    is_logged_in();
    $this->load->model('User_model','User_');
  }
public function index()
{
  $data['user']= $this->User_->getUser($this->session->userdata('email'));
  $data['title'] = 'Form login';
  $this->load->view('Templates/header', $data);
  $this->load->view('Templates/sidebar', $data);
  $this->load->view('Templates/topbar', $data);
  $this->load->view('Admin/index', $data);
  $this->load->view('Templates/footer', $data);
  $this->load->view('Templates/javascript', $data);
}

}
