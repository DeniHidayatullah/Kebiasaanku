<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function tes()
	{
		$this->load->view('tes');
	}

	function save()
	{

		if ($_POST["nama_pasar"] == "Pasar Mangli") {
			$data_latitude = "-8.19008349999762";
			$data_langitude = "113.65212945430156";
		} elseif ($_POST["nama_pasar"] == "Pasar Tanjung") {
			$data_latitude = "-8.17384174372836";
			$data_langitude = "113.69539446836136";
		} elseif ($_POST["nama_pasar"] == "Pasar Tanggul") {
			$data_latitude = "-8.165380584590952";
			$data_langitude = "113.45785740114403";
		} elseif ($_POST["nama_pasar"] == "Pasar Yosorati") {
			$data_latitude = "-8.117182918576741";
			$data_langitude = "113.38555439987778";
		} elseif ($_POST["nama_pasar"] == "Pasar Ambulu") {
			$data_latitude = "-8.345877199830456";
			$data_langitude = "113.6058134094053";
		} else {
			$data_latitude = "null";
			$data_langitude = "null";
		}

		$data = array(
			'nama_produk'        => $_POST["nama_produk"],
			'nama_pasar'         => $_POST["nama_pasar"],
			'longitude'          => $data_langitude,
			'latitude'           => $data_latitude,
			'tgl_create'         => $_POST["tgl_create"]
		);

		var_dump($data);
		die;
	}
}
