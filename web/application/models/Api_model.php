<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    protected $registrasi = 'tbl_user';
    public function login($email,$password){
        $this->db->where('email', $email);
        $q = $this->db->get($this->registrasi);

        if($q->num_rows()) {
            $akun_pass = $q->row('password');
            if(md5($password) === $akun_pass) {
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }
    
    public function insert($tabel, $arr)
    {
        $cek = $this->db->insert($tabel, $arr);
        return $cek;
        
    }
    public function get($tabel,$id){
        $get = $this->db->get_where($tabel,$id);
        return $get;
    }

    public function index($id){  
        return $this->db->get_where('tbl_user' , ['id_user' => $id])->result_array();
    }
    
    public function kode($id,$tabel,$kode,$substr)
    {
            // $query = $this->db->select($id)
            //                   ->from($tabel)
            //                   ->get();
            $this->db->select_max($id);
            $query = $this->db->get($tabel);
            $row = $query->row();
            // $row = $query->last_row();
            if($query){
                $idPostfix = (int)substr($row->$id,$substr)+1;
                $nextId = $kode.STR_PAD((string)$idPostfix,5,"0",STR_PAD_LEFT);
            }
            else{$nextId = $kode.'00001';} // For the first time
            return $nextId;
    }

}