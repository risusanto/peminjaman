<?php

class Register extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
		$this->load->model('data_pemohon_m');
	}

	public function index()
	{
		if ($this->POST('daftar')) {
			if (!$this->data_pemohon_m->required_input(['nrp','jabatan','kesatuan','pangkat','nama'])) 
			{
				$this->flashmsg('Data harus lengkap','warning');
				redirect('register');
				exit;
			}
			if ($this->POST('password') != $this->POST('repassword')) {
				$this->flashmsg('password tidak sama','warning');
				redirect('register');
				exit;
			}
			$this->data['pemohon'] = [
				'nrp'		=> $this->POST('nrp'),
				'jabatan'	=> $this->POST('jabatan'),
				'pangkat'	=> $this->POST('pangkat'),
				'kesatuan'	=> $this->POST('kesatuan'),
				'nama'		=> $this->POST('nama'),
			];
			$this->data['user'] = [
				'username'		=> $this->POST('nrp'),
				'password'		=> md5($this->POST('password')),
				'id_role'		=> 4
			];
			if ($this->user_m->get_row(['username' => $this->data['user']['username']])) {
				$this->flashmsg('username sudah ada','warning');
				redirect('register');
				exit;
			}
			$this->user_m->insert($this->data['user']);
			$this->data_pemohon_m->insert($this->data['pemohon']);
			$this->flashmsg('Register Berhasil, Silahkan <a href="'. base_url('login') .'"> Login </a>','warning');
			redirect('register');
			exit;
		}
		$this->data['title'] = 'REGISTER '.$this->title;
		$this->load->view('register',$this->data);
	}
}
