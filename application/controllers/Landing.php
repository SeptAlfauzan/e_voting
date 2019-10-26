<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
    }
    public function index()
    {
        // echo"test";
        if ($_SESSION['login'] == null) {
            $this->session->set_flashdata('msg_login', 'login gagal');
            redirect(base_url());
        }

        $data['calon'] = $this->MainModel->getData('calon');
        // var_dump($data);
        $this->load->view('landing/index', $data);
    }
}
