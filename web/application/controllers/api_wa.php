<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class api_wa extends CI_Controller {

	public $base_url = 'http://waini.indanahgroup.my.id/';

	private function connect($x, $n)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/x-www-form-urlencoded']);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($x));
		curl_setopt($ch, CURLOPT_URL, $this->base_url . $n);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$result = curl_exec($ch);
		curl_close($ch);
		return json_decode($result, true);
		//print json_decode($result, true);
		echo $result;
	}

	public function sendMessage($phone='081333992731', $msg='Ini Dari Api')
	{
    //$phone='081333992731', $msg='Masuk'
    //$phone, $msg
    //$phone = '081333992731';
    //$msg = 'Masuk';
		return $this->connect([
			'number' => $phone,
			'message' => $msg
		], 'v2/send-message');
	}

}
