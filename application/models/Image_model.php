<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model
{
  public function tambahImage($data)
  {
    $upload_image = $data['Timage'];
    if ($upload_image ) {
    //file yang boleh di upload
    $config['allowed_types'] = 'gif|jpg|png';
    //ukuran
    $config['max_size']     = '2048';
    //foleder penyimpanan
    $config['upload_path'] = $data['url'];
    // jika sudah ini untuk library nya penyimpanan ke folder
    $this->load->library('upload', $config);
    //cek
    if ($this->upload->do_upload($data['do_upload'])) {
      // set update
      $new_image = $this->upload->data('file_name');
      $image = $new_image;
      return $image;
    }else {
      $this->session->set_flashdata('image', '<small class="text-danger pl-3">
      File gif/jpg/png dan ukuran dibawah 2Mb
      </small>');
      redirect($data['redirect']);
    }
  }
  }
  public function updateImage($data)
  {
    $upload_image = $data['Timage'];
    if ($upload_image) {
      //file yang boleh di upload
      $config['allowed_types'] = 'gif|jpg|png';
      //ukuran
      $config['max_size']     = '2048';
      //foleder penyimpanan
      $config['upload_path'] = $data['url'];
      //ukuran
      // jika sudah ini untuk library nya
      $this->load->library('upload', $config);

      if ($this->upload->do_upload($data['do_upload'])) {
        // mengecek gambar  sebelumnnya
        $old_image = $data['oldImage'];
        if ($old_image != 'default.png') {
          unlink(FCPATH. $data['url'].$old_image);
        }
        $new_image = $this->upload->data('file_name');
        $image = $new_image;
        return $image;
      }else {
        $this->session->set_flashdata('image', '<small class="text-danger pl-3">
        File gif/jpg/png dan ukuran dibawah 2Mb
        </small>');
        redirect($data['redirect']);
      }
    }
  }
  public function deleteImage($data)
  {
    $old_image = $data['oldImage'];
    if ($old_image != 'default.png') {
      unlink(FCPATH. $data['url'].$old_image);
    }
  }

  public function idProyek()
    {
    $this->db->order_by('id_proyek', 'DESC');
    $cekdb = $this->db->get_where('proyek')->row_array();
    $header = $cekdb['id_proyek'];
    $u=date('ymd');
    if (!$cekdb) {
      $header = 1;
      $notrans='P0'.$u.'00'.$header;
    }else  {
      $notrans= substr($header,2,6);
      if ($u != $notrans) {
        $header = 1;
        $notrans='P0'.$u.'00'.$header;
      }else {
        $header++;
        $notrans= $header;
      }
    }
    return($notrans);
    }


}
