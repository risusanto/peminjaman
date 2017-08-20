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
        $this->data['title']    = 'Dashboard Admin';
        $this->data['pemohon']  = $this->Pemohon_m->get();
        $this->data['content']  = 'admin/dashboard';
        $this->template($this->data);
    }

    public function pemohon()
    {
        // $nrp = $this->POST('nrp');
        // if(isset($nrp))
        // {
        //     $cek_pemohon = $this->Pemohon_m->get_row(['nrp' => $nrp]);

        //     if ($cek_pemohon->status == '1')
        //     {
        //         $this->Pemohon_m->update($nrp, ['status' => '0']);
        //         echo '<button class="btn btn-danger" onclick="changeStatus('.$nrp.')"><i class="fa fa-close"></i> Tidak</button>';
        //     }
        //     else
        //     {
        //         $this->Pemohon_m->update($nrp, ['status' => '1']);
        //         echo '<button class="btn btn-success" onclick="changeStatus('.$nrp.')"><i class="fa fa-check"></i> Iya</button>'; 
        //     }
        // }

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
}
