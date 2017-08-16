<?php

	$this->load->view('kapolres/template/header', array('title' => $title));
	$this->load->view('kapolres/template/sidebar');
	$this->load->view($content);
	$this->load->view('kapolres/template/footer');
?>
