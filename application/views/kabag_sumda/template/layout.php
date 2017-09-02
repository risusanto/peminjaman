<?php

	$this->load->view('kabag_sumda/template/header', array('title' => $title));
	$this->load->view('kabag_sumda/template/sidebar');
	$this->load->view($content);
	$this->load->view('kabag_sumda/template/footer');
?>
