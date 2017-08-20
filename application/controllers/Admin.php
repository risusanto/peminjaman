<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['id_role'] = $this->session->userdata('id_role');
        if (!isset($this->data['id_role']) || $this->data['id_role'] != 1)
        {
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('id_role');
            $this->flashmsg('Anda harus login dulu','warning');
            redirect('login');
            exit;
        }

        $this->load->model('Pemohon_m');
    }

    public function index()
    {
        $this->load->model('senjata_api_m');
        $this->load->model('amunisi_m');
        $this->data['title']    = 'Dashboard Admin';
        $this->data['pemohon']  = $this->Pemohon_m->get();
        $this->data['amunisi']  = $this->amunisi_m->get();
        $this->data['senpi']    = $this->senjata_api_m->get();
        $this->data['content']  = 'admin/dashboard';
        $this->template($this->data);
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
                'nrp'           => $this->POST('nrp'),
                'nama_anggota'  => $this->POST('nama_anggota'),
                'pangkat'       => $this->POST('pangkat'),
                'jabatan'       => $this->POST('jabatan'),
                'kesatuan'      => $this->POST('kesatuan'),
                'kelengkapan'   => $this->POST('kelengkapan'),
                'no_senpi'      => $this->POST('no_senpi'),
                'jumlah_amunisi'=> $this->POST('jumlah_amunisi')
            ];
            $this->Pemohon_m->insert($this->data['pemohon']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pemohon berhasil ditambah');
            redirect('admin/pemohon');
            exit;
        }

        if ($this->POST('edit'))
        {
            $this->data['pemohon'] = [
                'nrp'           => $this->POST('nrp'),
                'nama_anggota'  => $this->POST('nama_anggota'),
                'pangkat'       => $this->POST('pangkat'),
                'jabatan'       => $this->POST('jabatan'),
                'kesatuan'      => $this->POST('kesatuan'),
                'kelengkapan'   => $this->POST('kelengkapan'),
                'no_senpi'      => $this->POST('no_senpi'),
                'jumlah_amunisi'=> $this->POST('jumlah_amunisi')
            ];
            $this->Pemohon_m->update($this->POST('old_nrp'), $this->data['pemohon']);
            $this->flashmsg('<i class="glyphicon glyphicon-success"></i> Data pemohon berhasil di-edit');
            redirect('admin/pemohon');
            exit;
        }

        if ($this->input->get('nrp'))
        {
            $this->data['pemohon'] = $this->Pemohon_m->get_row(['nrp' => $this->input->get('nrp')]);
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
            $this->Pemohon_m->delete($this->POST('nrp'));
        }



        $this->data['senpi']    = $this->senjata_api_m->get();
        $this->data['title']    = 'Data Pemohon Senjata Api';
        $this->data['pemohon']  = $this->Pemohon_m->get();
        $this->data['content']  = 'admin/pemohon';
        $this->template($this->data);
    }

    public function senpi()
    {
        $this->load->model('senjata_api_m');
        $this->data['title']    = 'Senjata Api di Gudang';
        $this->data['senpi']    = $this->senjata_api_m->get();
        $this->data['content']  = 'admin/senpi';
        $this->template($this->data);
    }

    public function stok_amunisi()
    {
        $this->load->model('amunisi_m');
        $this->data['title']    = 'Stok Amunisi';
        $this->data['amunisi']  = $this->amunisi_m->get();
        $this->data['content']  = 'admin/amunisi';
        $this->template($this->data);
    }
}
