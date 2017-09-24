<?php

class Data_pemohon_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();

		$this->data['table_name']	= 'data_pemohon';
		$this->data['primary_key']	= 'nrp';
	}
}
