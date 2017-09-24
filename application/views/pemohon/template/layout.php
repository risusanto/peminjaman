<?php

	$this->load->view('pemohon/template/header', array('title' => $title));
	$this->load->view('pemohon/template/sidebar');
	$this->load->view($content);
	$this->load->view('pemohon/template/footer');
?>
