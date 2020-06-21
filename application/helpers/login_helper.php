<?php
function is_logged_in()
{
  // buat isntansi untuk menghubungkan ke ci
  $ci = get_instance();
  //tidak menggunakan $this->
  if (!$ci->session->userdata('email')) {
    redirect('auth/login');
  }
}
