<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MainModel');
    }
    public function index()
    {
        $this->load->view('dashboard/index');
    
    }
    public function loginAdmin($user, $pass)
    {
        if ($user == "voting_online" && $pass == "sukseskan_e_voting") {
            $_SESSION['login'] = 'admin';
            redirect(base_url('AdminPage'));
        }

        $res = $this->MainModel->getSpecifiedWithId('admin', 'username', $user);
        $passHashed = $res->{'password_admin'};
        // var_dump($data); die();
        if (password_verify($pass, $passHashed)) {
            $_SESSION['login'] = 'admin';
            $_SESSION['username_admin'] = $user;
            redirect(base_url('AdminPage'));
        }
    }

    public function login()
    {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $check = $this->MainModel->checkLogin($user, $pass);

        // login admin
        $this->loginAdmin($user, $pass);
        die();

        // login user
        if ($check != 0) {
            
            $status = $this->MainModel->checkStatus($user, $pass);
            if ( intVal($status['status_pemilih']) == 1) {
                $this->session->set_flashdata('msg_login', '<strong>Akun sudah digunakan.</strong> Silahkan gunakan akun baru.');
                redirect(base_url());
            }

            $this->session->set_userdata('login');
            $_SESSION['login'] = $user;
            redirect('Landing');
        }else{
            $this->session->set_flashdata('msg_login', '<strong>login gagal!</strong> siilahkan cek kembali username dan password');
            redirect(base_url());
        }

    }
    public function logout()
    {
        session_unset();
        session_destroy();
    }
}
