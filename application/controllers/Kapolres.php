<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Kapolres extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->data['id_role'] = $this->session->userdata('id_role');
        if (!isset($this->data['id_role']) || $this->data['id_role'] != 2)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->flashmsg('Anda harus login dulu','warning');
            redirect('login');
            exit;
        }

      $this->load->model('Amunisi_m');
      $this->load->model('Berita_acara_m');
      $this->load->model('Pemohon_m');
      $this->load->model('Senjata_api');
  }

  public function index()
  {
    $this->data['title']    ='DASHBOARD KAPOLRES';
    $this->data['content']  = 'kapolres/dashboard';
    $this->template($this->data,'kapolres');
  }
}
