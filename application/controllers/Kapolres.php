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
      $this->load->model('Senjata_api_m');
  }

  public function index()
  {
    $this->data['title']    ='Dashboard KAPOLRES';
    $this->data['content']  = 'kapolres/dashboard';
    $this->template($this->data,'kapolres');
  }

  public function senpi(){
    $this->data['title']    ='Data Senjata Api';
    $this->data['senpi']    = $this->Senjata_api_m->get();
    $this->data['content']  = 'kapolres/senpi';
    $this->template($this->data,'kapolres');
  }

  public function pemasukan_senpi(){
    $this->data['title']    ='Data Pemasukan Senjata Api';
    $this->data['senpi']    = $this->Senjata_api_m->get();
    $this->data['content']  = 'kapolres/pemasukan_senpi';
    $this->template($this->data,'kapolres');
  }

  public function pengeluaran_senpi(){
    $this->data['title']    ='Data Pengeluaran Senjata Api';
    $this->data['senpi']    = $this->Senjata_api_m->get();
    $this->data['content']  = 'kapolres/pengeluaran_senpi';
    $this->template($this->data,'kapolres');
  }

  public function amunisi(){
    $this->data['title']    ='Data Amunisi';
    $this->data['amunisi']  = $this->Amunisi_m->get();
    $this->data['content']  = 'kapolres/amunisi';
    $this->template($this->data,'kapolres');
  }

  public function pemasukan_amunisi(){
    $this->data['title']    ='Data Pemasukan Amunisi';
    $this->data['amunisi']  = $this->Amunisi_m->get();
    $this->data['content']  = 'kapolres/pemasukan_amunisi';
    $this->template($this->data,'kapolres');
  }

  public function pengeluaran_amunisi(){
    $this->data['title']    ='Data Pengeluaran Amunisi';
    $this->data['amunisi']  = $this->Amunisi_m->get();
    $this->data['content']  = 'kapolres/pengeluaran_amunisi';
    $this->template($this->data,'kapolres');
  }

  public function berita_acara(){
    $this->data['title']    ='Data Berita Acara';
    $this->data['berita']  = $this->Berita_acara_m->get();
    $this->data['content']  = 'kapolres/berita_acara';
    $this->template($this->data,'kapolres');
  }

}
