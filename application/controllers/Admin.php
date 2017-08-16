<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Admin extends MY_Controller
{

  function __construct()
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
  }

  public function index()
  {
    $this->data['title']    = 'DASHBOARD ADMIN';
    $this->data['content']  = 'admin/dashboard';
    $this->template($this->data);
  }
}
