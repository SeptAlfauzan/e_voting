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
        $data['admin'] = $this->MainModel->getData('admin');
        $this->load->view('admin_page/admin/index', $data);
    }

    public function addNewAdmin()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $username = htmlspecialchars($_POST['username'], true);
        $password = htmlspecialchars($_POST['password'], true);
        // if (strlen($username) >= 100 || strlen($password) < 8 || strlen($password) >= 100) {
        //     echo "username tidak boleh lebih dari 100 karakter dan password harus lebih dari 7 karakter dan kurang dari 100 karakter";
        //     redirect('AdminPage/admin');
        // }
        $checkUsername = $this->MainModel->checkUsername($username);
        if ($checkUsername >= 1) {
            echo "username telah digunakan";
            die();
        }
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $id = $this->randId();
        $data = array(
            'id_admin' => $id,
            'username' => $username,
            'password_admin' => $pass
        );
        $this->MainModel->insertData('admin', $data);
        echo "berhasil";
        redirect('AdminPage/admin');
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
        $config['overwrite'] = true;

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
    public function delImage($id)
    {
        $image = $this->MainModel->getSpecifiedWithId('calon', 'id_calon', $id);
        $imageName = $image->{'foto_calon'};
        $filename = explode(".", $imageName)[0];
        return array_map('unlink', glob(FCPATH . "images/$filename.*"));
    }

    public function delDataCalon()
    {
        if ($_SESSION['login'] != 'admin') {
            redirect(base_url());
        }
        $id = $_GET['id'];
        $this->delImage($id);
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

        $config['upload_path'] = './images/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 3000;
        $config['overwrite'] = true;

        $this->load->library('upload', $config);

    //  jika file image tidak diganti
        if ($this->upload->do_upload('profile_image') == false) {
            $data = array(
                'nama_calon' => $_POST['nama_calon'],
                'visi_calon' => $_POST['visi_calon'],
                'misi_calon' => $_POST['misi_calon']
            );
            $this->MainModel->updateData($data, 'id_calon', $id, 'calon');
            redirect('AdminPage/calon');
            
        } else {
            $data = array('image_metadata' => $this->upload->data());

            $namaFile = $data["image_metadata"]['file_name'];
            $data = array(
                'nama_calon' => $_POST['nama_calon'],
                'visi_calon' => $_POST['visi_calon'],
                'misi_calon' => $_POST['misi_calon'],
                'foto_calon' => $namaFile
            );
            $this->MainModel->updateData($data, 'id_calon', $id, 'calon');
            redirect('AdminPage/calon');
        }

        
        redirect('AdminPage/calon');
    }
    public function delAllPemilih()
    {
        $this->MainModel->deleteAllData('pemilih');
        redirect('AdminPage/pemilih');
    }

    public function delPemilih()
    {
        $id = $_GET['id'];
        $this->MainModel->deleteData('pemilih', 'id_pemilih', $id);
        redirect('AdminPage/pemilih');
    }
    public function delAdmin()
    {
        $id = $_GET['id'];
        $this->MainModel->deleteData('admin', 'id_admin', $id);
        redirect('AdminPage/admin');
    }

    public function editAdmin()
    {
        $id = $_GET['id'];
        $username = htmlspecialchars($_POST['username'], true);
        $password = $_POST['password'];
        $repassword = $_POST['retype_password'];
        $pass = password_hash($password, PASSWORD_DEFAULT);

        if ($password != $repassword) {
            $this->session->set_flashdata('editfail', 'password tidak sama.');
            redirect('AdminPage/admin');
        }
        $data = array(
            'username' => $username,
            'password_admin' => $pass
        );
        
        $this->MainModel->updateData($data, 'id_admin', $id, 'admin');
        redirect('AdminPage/admin');
    }

   
    public function logout()
    {
        session_unset();
        session_destroy();
        redirect(base_url());
    }
}
