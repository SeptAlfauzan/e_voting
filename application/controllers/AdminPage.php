<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminPage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('MainModel');
    }
    public function index()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }

        $data['sudahMemilih'] = $this->MainModel->getDataGroup('pemilih', 'status_pemilih', 1);
        $data['belumMemilih'] = $this->MainModel->getDataGroup('pemilih', 'status_pemilih', 0);
        // var_dump($data);
        // die();
        $data['calon'] = $this->MainModel->getData('calon');

// mengambil perolehan suara
        for ($i=0; $i < count($data['calon']); $i++) { 
            $id_calon = $data['calon'][$i]['id_calon'];

            $suara = count($this->MainModel->getDataGroup('suara', 'id_calon', $id_calon));

            $this->MainModel->updatePerolehanSuara($id_calon, $suara);
        }
        // var_dump($data['jumlahSuaraCalon1']);
        $this->load->view('admin_page/dashboard/index', $data);
    }

    public function calon()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $data['calon'] = $this->MainModel->getData('calon');
        $this->load->view('admin_page/calon_ketos/index', $data);
    }
    public function pemilih()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $data['pemilih'] = $this->MainModel->getData('pemilih');
        $this->load->view('admin_page/pemilih/index', $data);
    }
    public function admin()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $this->load->view('admin_page/admin/index');
    }

    public function tambahCalonPage()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $this->load->view('admin_page/calon_ketos/tambah/index');
    }
    public function randInt()
    {
        $chars = '0123456789';
        $charLen = strlen($chars);
        $randStr = '';
        for ($i = 0; $i < 8; $i++) {
            $randStr .= $chars[rand(0, $charLen - 1)];
        }
        return $randStr;
    }
// fungsi untuk random string
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

    public function insertVoters()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $jumlahPemilih = intval($_POST['jumlah_pemilih']);

        for ($i=0; $i < $jumlahPemilih; $i++) { 
           $id_pemilih = $this->randId();
           $password_pemilih = $this->randInt();
           $data = array(
               'id_pemilih'=>$id_pemilih,
               'password_pemilih'=>$password_pemilih
           );
            $this->MainModel->insertData('pemilih', $data);


            $id_pemilih = '';
            $password_pemilih = '';
        }
        redirect('AdminPage/pemilih');
    }

    public function exportExcel()
    {
        $data['pemilih'] = $this->MainModel->getData('pemilih');
        $this->load->view('admin_page/exportExcel/index', $data);
    }

    public function uploadCalon()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        // input data masuk
        $nama_calon = htmlspecialchars($_POST['nama_calon'], true);
        $visi_calon = htmlspecialchars($_POST['visi_calon'], true);
        $misi_calon = htmlspecialchars($_POST['misi_calon'], true);

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('profile_image')) {
            $error = array('error' => $this->upload->display_errors());

            var_dump($error['error']);
        } else {
            $data = array('image_metadata' => $this->upload->data());
            $id_calon = $this->randId();

            $namaFile = $data["image_metadata"]['file_name'];
            $data = array(
                'id_calon' => $id_calon,
                'nama_calon' => $nama_calon,
                'visi_calon' => $visi_calon,
                'misi_calon' => $misi_calon,
                'foto_calon' => $namaFile
            );

            $this->MainModel->insertData('calon', $data);
            redirect('AdminPage/calon');
        }
    }

    public function delDataCalon()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $id = $_GET['id'];
        $this->MainModel->deleteData('calon', 'id_calon', $id);
        redirect('AdminPage/calon');
    }

    public function editDataCalon()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $id = $_GET['id'];
        $data['calon'] = $this->MainModel->getSpecifiedWithId('calon', 'id_calon', $id);
        $this->load->view('admin_page/calon_ketos/edit/index', $data);
    }

    public function setEdit()
    {
        $id = $_GET['id'];
        $data = array(
            'nama_calon'=>$_POST['nama_calon'],
            'visi_calon'=>$_POST['visi_calon'],
            'misi_calon'=>$_POST['misi_calon'],
            'foto_calon'=>$_FILES['profile_image']['name']
        );
        $this->MainModel->updateData($data, 'id_calon', $id, 'calon');
        redirect('AdminPage/calon');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        redirect(base_url());
    }
}
