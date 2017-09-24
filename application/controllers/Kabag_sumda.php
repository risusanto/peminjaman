<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Kabag_sumda extends MY_Controller
{

    public function __construct()
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
        $this->data['title']    ='Dashboard KABAG SUMDA';
        $this->data['content']  = 'kabag_sumda/dashboard';
        $this->data['senpi']    = $this->Senjata_api_m->get();
        $this->data['amunisi']  = $this->Amunisi_m->get();
        $this->data['berita']   = $this->Berita_acara_m->get();
        $this->template($this->data,'kabag_sumda');
    }

    public function senpi()
    {
        $cek_cetak = $this->uri->segment(3);

        if($cek_cetak == 'cetak')
        {
            $this->data['senpi'] = $this->Senjata_api_m->get();
            $html = $this->load->view('kabag_sumda/cetak_senpi', $this->data, true);
            $pdfFilePath = 'Laporan Data Senjata Api - ' . date('Y-m-d') . '.pdf';
            $this->load->library('m_pdf');
            $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($pdfFilePath, "D");   
            exit;
        }

        $this->data['title']    ='Data Senjata Api';
        $this->data['senpi']    = $this->Senjata_api_m->get();
        $this->data['content']  = 'kabag_sumda/senpi';
        $this->template($this->data,'kabag_sumda');
    }

    public function pemasukan_senpi()
    {
        $this->data['title']    ='Data Pemasukan Senjata Api';
        $this->data['senpi']    = $this->Senjata_api_m->get();
        $this->data['content']  = 'kabag_sumda/pemasukan_senpi';
        $this->template($this->data,'kabag_sumda');
    }

    public function pengeluaran_senpi()
    {
        $this->data['title']    ='Data Pengeluaran Senjata Api';
        $this->data['senpi']    = $this->Senjata_api_m->get();
        $this->data['content']  = 'kabag_sumda/pengeluaran_senpi';
        $this->template($this->data,'kabag_sumda');
    }

    public function amunisi()
    {
        $cek_cetak = $this->uri->segment(3);

        if($cek_cetak == 'cetak')
        {
            $this->data['amunisi'] = $this->Amunisi_m->get();
            $html = $this->load->view('kabag_sumda/cetak_amunisi', $this->data, true);
            $pdfFilePath = 'Laporan Data Amunisi - ' . date('Y-m-d') . '.pdf';
            $this->load->library('m_pdf');
            $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($pdfFilePath, "D");   
            exit;
        }

        $this->data['senpi'] = $this->Senjata_api_m->get();
        $pemohon = $this->Pemohon_m->get();
        $this->data['total_amunisi'] = 0;
        foreach ($pemohon as $key) {
            $this->data['total_amunisi'] = $this->data['total_amunisi'] = $key->jumlah_amunisi;
        }
        // if($data_senpi->no_senpi == $data_pemohon->no_senpi)
        //{

        // }

        $this->data['title']    ='Data Amunisi';
        $this->data['amunisi']  = $this->Amunisi_m->get();
        $this->data['content']  = 'kabag_sumda/amunisi';
        $this->template($this->data,'kabag_sumda');
    }

    public function pemasukan_amunisi()
    {
        $this->data['title']    ='Data Pemasukan Amunisi';
        $this->data['amunisi']  = $this->Amunisi_m->get();
        $this->data['content']  = 'kabag_sumda/pemasukan_amunisi';
        $this->template($this->data,'kabag_sumda');
    }

    public function pengeluaran_amunisi()
    {
        $this->data['title']    ='Data Pengeluaran Amunisi';
        $this->data['amunisi']  = $this->Amunisi_m->get();
        $this->data['content']  = 'kabag_sumda/pengeluaran_amunisi';
        $this->template($this->data,'kabag_sumda');
    }

    public function berita_acara()
    {
        $cek_cetak = $this->uri->segment(3);

        if($cek_cetak == 'cetak')
        {
            $this->data['berita'] = $this->Berita_acara_m->get();
            $html = $this->load->view('kabag_sumda/cetak_berita_acara', $this->data, true);
            $pdfFilePath = 'Laporan Data Berita Acara - ' . date('Y-m-d') . '.pdf';
            $this->load->library('m_pdf');
            $this->m_pdf->pdf->WriteHTML($html);
            $this->m_pdf->pdf->Output($pdfFilePath, "D");   
            exit;
        }

        $this->data['title']    ='Data Berita Acara';
        $this->data['berita']  = $this->Berita_acara_m->get();
        $this->data['content']  = 'kabag_sumda/berita_acara';
        $this->template($this->data,'kabag_sumda');
    }

    public function cetak()
    {
        $this->data['title']    ='Data Berita Acara';
        $this->data['amunisi']  = $this->Amunisi_m->get();
        $this->load->view('kabag_sumda/cetak_amunisi',$this->data);
    }

}
