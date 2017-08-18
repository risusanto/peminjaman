<?php

	$this->load->view('admin-gudang/template/header', array('title' => $title));
	$this->load->view('admin-gudang/template/sidebar');
	$this->load->view($content);
	$this->load->view('admin-gudang/template/footer');
?>
