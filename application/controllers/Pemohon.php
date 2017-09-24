<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Pemohon extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->data['id_role'] = $this->session->userdata('id_role');
    $this->data['username'] = $this->session->userdata('username');
        if (!isset($this->data['id_role']) || $this->data['id_role'] != 4)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->flashmsg('Anda harus login dulu','warning');
            redirect('login');
            exit;
        }
    $this->load->model('Senjata_api_m');
    $this->load->model('user_m');
    $this->load->model('Amunisi_m');
    $this->load->model('Data_pemohon_m');
    $this->load->model('Pemohon_m');
    $this->data['profil'] = $this->Data_pemohon_m->get_row(['nrp' => $this->data['username']]);
  }

  public function index()
  {

    $this->data['pemohon']      = $this->Pemohon_m->get(['nrp' => $this->data['username']]);
    $this->data['title'] = 'DASHBOARD'.$this->title;
    $this->data['content'] = 'Pemohon/dashboard';
    $this->template($this->data,'pemohon');
  }

  public function pemohon()
  {
        if($this->POST('change'))
        {
            $nrp = $this->POST('nrp');
            $cek_pemohon = $this->Pemohon_m->get_row(['nrp' => $nrp]);

            if ($cek_pemohon->status == '1')
            {
                $this->Pemohon_m->update($nrp, ['status' => '0']);
                echo '<button class="btn btn-danger" onclick="changeStatus('.$nrp.')"><i class="fa fa-close"></i> Tidak</button>';
                exit;
            }
            else
            {
                $this->Pemohon_m->update($nrp, ['status' => '1']);
                echo '<button class="btn btn-success" onclick="changeStatus('.$nrp.')"><i class="fa fa-check"></i> Iya</button>'; 
                exit;
            }
        }

        $this->load->model('senjata_api_m');

        if ($this->POST('add'))
        {
            $this->data['pemohon'] = [
                'nrp'           => $this->data['username'],
                'kelengkapan'   => $this->POST('kelengkapan'),
                'no_senpi'      => $this->POST('no_senpi'),
                'jumlah_amunisi'=> $this->POST('jumlah_amunisi')
            ];
            $this->Pemohon_m->insert($this->data['pemohon']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pemohon berhasil ditambah');
            redirect('pemohon/pemohon');
            exit;
        }

        if ($this->POST('edit'))
        {
            $this->data['pemohon'] = [
                'kelengkapan'   => $this->POST('kelengkapan'),
                'no_senpi'      => $this->POST('no_senpi'),
                'jumlah_amunisi'=> $this->POST('jumlah_amunisi')
            ];
            $this->Pemohon_m->update($this->POST('id_pemohon'), $this->data['pemohon']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pemohon berhasil di-edit');
            redirect('pemohon/pemohon');
            exit;
        }

        if ($this->input->get('nrp'))
        {
            $this->data['pemohon'] = $this->Pemohon_m->get_row(['id_pemohon' => $this->input->get('nrp')]);
            $no_senpi = [];
            $this->data['senpi']    = $this->senjata_api_m->get();
            foreach ($this->data['senpi'] as $senpi)
                $no_senpi[$senpi->no_senpi] = $senpi->no_senpi;
            $this->data['pemohon']->dropdown = form_dropdown('no_senpi', $no_senpi, $this->data['pemohon']->no_senpi, ['class' => 'form-control']);
            echo json_encode($this->data['pemohon']);
            exit;
        }

        if ($this->POST('delete')) 
        {
            $this->Pemohon_m->delete($this->POST('id_pemohon'));
        }



        $this->data['senpi']    = $this->senjata_api_m->get();
        $this->data['title']    = 'Data Pemohon Senjata Api';
        $this->data['pemohon']  = $this->Pemohon_m->get();
        $this->data['content']  = 'pemohon/pemohon';
        $this->template($this->data,'pemohon');
    }

  public function profil($value='')
  {
    if ($this->POST('ubah')) {
      if ($this->POST('pw') != $this->POST('repw')) {
        $this->flashmsg('Password tidak sama','warning');
            redirect('pemohon/profil');
            exit;
      }
      $this->user_m->update($this->data['username'],['password' => md5($this->POST('pw'))]);
      $this->flashmsg('Password Berhasil Diubah','success');
      redirect('pemohon/profil');
      exit;
    }

    if ($this->POST('ubah_data')) {
      if (!$this->Data_pemohon_m->required_input(['jabatan','kesatuan','pangkat','nama'])) 
      {
        $this->flashmsg('Data harus lengkap','warning');
        redirect('pemohon/profil');
        exit;
      }
      $this->data['pemohon'] = [
        'nama'    => $this->POST('nama'),
        'jabatan'    => $this->POST('jabatan'),
        'pangkat'    => $this->POST('pangkat'),
        'kesatuan'    => $this->POST('kesatuan')
      ];
      $this->Data_pemohon_m->update($this->data['username'],$this->data['pemohon']);
      $this->user_m->update($this->data['username'],['password' => md5($this->POST('pw'))]);
      $this->flashmsg('Data Berhasil Diupdate','success');
      redirect('pemohon/profil');
      exit;
    }
      $this->data['title']    = 'Profil';
        $this->data['content']  = 'pemohon/profil';
        $this->template($this->data,'pemohon');
  }
}
