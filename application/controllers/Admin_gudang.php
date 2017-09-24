<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin_gudang extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['id_role'] = $this->session->userdata('id_role');
        if (!isset($this->data['id_role']) || $this->data['id_role'] != 3)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->flashmsg('Anda harus login dulu','warning');
            redirect('login');
            exit;
        }
    $this->load->model('Senjata_api_m');
    $this->load->model('Amunisi_m');
  }

  public function index()
  {
    $this->data['title'] = 'DASHBOARD'.$this->title;
    $this->data['content'] = 'admin-gudang/dashboard';
    $this->template($this->data,'admin-gudang');
  }

  public function senpi()
  {
    if ($this->POST('add')) {
      $required = ['jenis','merk','kaliber','kondisi','jumlah','keterangan'];
      if (!$this->Senjata_api_m->required_input($required)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin-gudang/senpi');
        exit;
      }
      for ($i=0; $i < 4 ; $i++) {
        $data_check[$required[$i]] = $this->POST($required[$i]);
      }
      $senpi = $this->Senjata_api_m->get_row($data_check);
      if (isset($senpi)) {
        $this->Senjata_api_m->update($senpi->no_senpi,['jumlah' => $senpi->jumlah + $this->POST('jumlah')]);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin-gudang/senpi');
      exit;
      }
      for ($i=0; $i < count($required) ; $i++) {
        $data_senpi[$required[$i]] = $this->POST($required[$i]);
      }
      $this->Senjata_api_m->insert($data_senpi);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin-gudang/senpi');
      exit;
    }

    if ($this->POST('edit')) {
      $required = ['jenis','merk','kaliber','kondisi','jumlah','keterangan'];
      if (!$this->Senjata_api_m->required_input($required)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin-gudang/senpi');
        exit;
      }
      for ($i=0; $i < count($required) ; $i++) {
        $data_senpi[$required[$i]] = $this->POST($required[$i]);
      }
      $this->Senjata_api_m->update($this->POST('no_senpi'),$data_senpi);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin-gudang/senpi');
      exit;
    }

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->Senjata_api_m->get_row(['no_senpi' => $this->POST('id')]);
				echo json_encode($data);
				exit;
		}

    if ($this->POST('delete')) {
      $this->Senjata_api_m->delete($this->POST('id'));
    }

    $this->data['senpi'] = $this->Senjata_api_m->get();

    $this->data['title'] = 'DATA SENPI'.$this->title;
    $this->data['content'] = 'admin-gudang/senpi';
    $this->template($this->data,'admin-gudang');
  }

  public function amunisi()
  {
    if ($this->POST('add')) {
      $required = ['kesatuan','merk','caliber','kondisi','jumlah'];
      if (!$this->Amunisi_m->required_input($required)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin-gudang/amunisi');
        exit;
      }
      for ($i=0; $i < 4 ; $i++) {
        $data_check[$required[$i]] = $this->POST($required[$i]);
      }
      $amunisi = $this->Amunisi_m->get_row($data_check);
      if (isset($amunisi)) {
        $this->Amunisi_m->update($amunisi->no_amunisi,['jumlah' => $amunisi->jumlah + $this->POST('jumlah')]);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin-gudang/amunisi');
      exit;
      }
      for ($i=0; $i < count($required) ; $i++) {
        $amunisi[$required[$i]] = $this->POST($required[$i]);
      }
      $this->Amunisi_m->insert($amunisi);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin-gudang/amunisi');
      exit;
    }

    if ($this->POST('edit')) {
      $required = ['kesatuan','merk','caliber','kondisi','jumlah'];
      if (!$this->Amunisi_m->required_input($required)) {
        $this->flashmsg('Data harus lengkap!','warning');
        redirect('admin-gudang/amunisi');
        exit;
      }
      for ($i=0; $i < count($required) ; $i++) {
        $data[$required[$i]] = $this->POST($required[$i]);
      }
      $this->Amunisi_m->update($this->POST('no_amunisi'),$data);
      $this->flashmsg('Data berhasil disimpan!');
      redirect('admin-gudang/amunisi');
      exit;
    }

    if ($this->POST('get') && $this->POST('id')) {
				$data = $this->Amunisi_m->get_row(['no_amunisi' => $this->POST('id')]);
				echo json_encode($data);
				exit;
    }
    
    if ($this->POST('delete')) {
      $this->Amunisi_m->delete($this->POST('id'));
    }


    $this->data['amunisi'] = $this->Amunisi_m->get();

    $this->data['title'] = 'DATA AMUNISI'.$this->title;
    $this->data['content'] = 'admin-gudang/amunisi';
    $this->template($this->data,'admin-gudang');
  }
}
