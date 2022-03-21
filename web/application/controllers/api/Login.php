<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Api_model');
    }

    //Menampilkan data kontak
    function index_post() {
        # Form Validation
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            // Load Login Function
            $output = $this->Api_model->login($this->input->post('email'), $this->input->post('password'));
            if(!empty($output) AND $output != FALSE) {
                $this->load->library('Authorization_Token');

                $token_data['id_user'] = $output->id_user;
                $token_data['nama'] = $output->nama;
                $token_data['email'] = $output->email;
                $token_data['password'] = $output->password;

                $akun_token = $this->authorization_token->generateToken($token_data);

                $return_data = [
                    'id_user' => $output->id_user,
                    'nama' => $output->nama,
                    'password' => $output->password,
                    'email' => $output->email,
                    'token' => $akun_token,
                    'pesan' => "Selamat Datang",
                ];

                // Login Success
                $message = [
                    'status' => TRUE,
                    'data' => $return_data,
                    'message' => "Selamat Datang"
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                // LoginError
                $message = [
                    'status' => FALSE,
                    'message' => "Username Atau Password tidak Valid"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
}
?>