<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
    }
    public function index()
    {
        if ($_SESSION['login'] == null) {
            $this->session->set_flashdata('msg_login', 'login gagal');
            redirect(base_url());
        }
        $id_calon = $_GET['id_calon'];
        // echo"test";
        $data['calon_detail'] = $this->MainModel->getSpecifiedWithId('calon', 'id_calon', $id_calon);
        // var_dump($data);
        $this->load->view('detail_calon/index', $data);
    }

    public function insertVote()
    {
        $id_calon = $_GET['id_calon'];
        $id_suara = $this->randId();
        $data = array(
            'id_suara' => $id_suara,
            'id_calon' => $id_calon
        );

        $user = $_SESSION['login'];
// update status user setelah memilih
        $this->MainModel->updateStatusUser($user);
// mengisi suara
        $this->MainModel->insertData('suara', $data);
        redirect('Dashboard');
    }

    public function randId()
    {
        $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charLen = strlen($chars);
        $randStr = '';
        for ($i = 0; $i < 8; $i++) {
            $randStr .= $chars[rand(0, $charLen - 1)];
        }
        return $randStr;
    }
}
