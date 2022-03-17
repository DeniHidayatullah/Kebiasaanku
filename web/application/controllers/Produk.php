<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Produk extends REST_Controller
{

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get()
    {
        $id = $this->get('id_produk');
        if ($id == '') {
            $kontak = $this->db->get('tbl_produk')->result();
        } else {
            $this->db->where('id_produk', $id);
            $kontak = $this->db->get('tbl_produk')->result();
        }
        $this->response($kontak, 200);
    }


    //Mengirim atau menambah data Produk baru
    function index_post()
    {
        $data_post = $this->post('nama_pasar');

        if ($data_post == "Pasar Mangli") {
            $data_latitude = "-8.19008349999762";
            $data_langitude = "113.65212945430156";
        } elseif ($data_post == "Pasar Tanjung") {
            $data_latitude = "-8.17384174372836";
            $data_langitude = "113.69539446836136";
        } elseif ($data_post == "Pasar Tanggul") {
            $data_latitude = "-8.165380584590952";
            $data_langitude = "113.45785740114403";
        } elseif ($data_post == "Pasar Yosorati") {
            $data_latitude = "-8.117182918576741";
            $data_langitude = "113.38555439987778";
        } elseif ($data_post == "Pasar Ambulu") {
            $data_latitude = "-8.345877199830456";
            $data_langitude = "113.6058134094053";
        } else {
            $data_latitude = "null";
            $data_langitude = "null";
        }

        $data = array(
            'nama_produk'        => $this->post('nama_produk'),
            'nama_pasar'         => $this->post('nama_pasar'),
            'longitude'          => $data_langitude,
            'latitude'           => $data_latitude,
            'tgl_create'         => $this->post('tgl_create')
        );

        $insert = $this->db->insert('tbl_produk', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Memperbarui data Produk yang telah ada
    function index_put()
    {
        $id = $this->put('id_produk');
        $data = array(
            'id_produk'          => $this->put('id_produk'),
            'nama_produk'        => $this->put('nama_produk'),
            'nama_pasar'         => $this->put('nama_pasar'),
            'longitude'          => $this->put('longitude'),
            'latitude'           => $this->put('latitude'),
            'tgl_create'         => $this->put('tgl_create')
        );
        $this->db->where('id_produk', $id);
        $update = $this->db->update('tbl_produk', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }


    //Menghapus salah satu data Produk
    function index_delete()
    {
        $id = $this->delete('id_produk');
        $this->db->where('id_produk', $id);
        $delete = $this->db->delete('tbl_produk');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
