<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainModel extends CI_Model {

    public function getData($tableName)
    {
        $res = $this->db->get($tableName)->result_array();
        return $res;
    }

    public function getDataToChart($tableName)
    {
        $res = $this->db->get($tableName)->result();
        return $res;
    }

    public function getDataGroup($tableName, $field, $fieldVal)
    {
        // $this->db);
        $res = $this->db->where($field, $fieldVal)->get($tableName)->result_array();
        return $res;
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function updatePerolehanSuara($id_calon, $suara)
    {
        $this->db->set('jumlah_suara', $suara);
        $this->db->where('id_calon', $id_calon);
        $this->db->update('calon');
    }

    public function updateStatusUser($id_user)
    {
        $this->db->set('status_pemilih', true);
        $this->db->where('id_pemilih', $id_user);
        $this->db->update('pemilih');
    }

    public function deleteData($table, $id_field, $id)
    {
        $this->db->where($id_field, $id);
        $this->db->delete($table);
    }

    public function getSpecifiedWithId($table, $id_field, $id)
    {
        $res = $this->db->where($id_field, $id)->get($table)->row();
        return $res;
    }

    public function checkLogin($user, $pass)
    {
        $res = $this->db->query("SELECT * FROM pemilih WHERE id_pemilih = '$user' AND password_pemilih = '$pass'")->num_rows();
        return $res;
    }

    public function checkStatus($user, $pass)
    {
        $res = $this->db->query("SELECT status_pemilih FROM pemilih WHERE id_pemilih = '$user' AND password_pemilih = '$pass'")->row_array();
        return $res;
    }

    public function updateData($data, $id_field, $id, $table)
    {
        $this->db->set($data);
        $this->db->where($id_field, $id);
        $this->db->update($table);
    }
}