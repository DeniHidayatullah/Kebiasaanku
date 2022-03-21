<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Register extends REST_Controller {
    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('Api_model');
    }

    public function index_post(){
        $password = md5($this->input->post('password'));
        $email = $this->post('email');
        date_default_timezone_set("Asia/Jakarta");
        $time =  Date('Y-m-d h:i:s');
        $cek = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

        

        if ($cek > 0){
            $response = [
                'status' => false,
                'message' => 'Email Telah Digunakan',
            ];
        }else{
            $data = array(
                'nama'          => $this->post('nama'),
                'email'         => $this->post('email'),
                'password'      => $password);
                
                $insert = $this->db->insert('tbl_user', $data);

                // $digits = 2;
                // $num = rand(pow(10, $digits-1), pow(10, $digits)-1);
                // $tokennya = uniqid(true);
                // $user_token = [
                //     'email' => $email,
                //     'token' => $tokennya,
                //     'v_num' => $num,
                //     'date_created' => $time
                // ];

                // $cek2 = $this->db->insert('user_token', $user_token);
                // $kirim = $this->_sendEmail($tokennya, $email, 'verify');
                

                $response = [
                    'status' => true,
                    'pesan' => 'Pendaftaran Akun Berhasil',
                ];
        }
        $this->response($response, 200);
    }
//     private function _sendEmail($token ,$email ,$type){
//         $config = [
//             'protocol' => 'smtp',
//             'smtp_host' => 'smtp.sendgrid.net',
//             'smtp_port' => 587,
//             'smtp_user' => 'apikey',
//             'smtp_pass' => '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',
//             'mailtype' => 'html',
//             'charset' => 'utf-8',
//             'newline' => '\r\n'
//         ];
        

//         $this->load->library('email', $config);
//         $this->email->initialize($config);

//         $this->email->from('adminsimrs@simrs.com', 'Admin Simrs');
//         $this->email->to($email);
//         $this->email->subject('Verifikasi Akun');
//         $this->email->message('
//         <!DOCTYPE html>
// <html>

// <head>
//     <title></title>
//     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
//     <meta name="viewport" content="width=device-width, initial-scale=1">
//     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
//     <style type="text/css">
//         @media screen {
//             @font-face {
//                 font-family: "Lato";
//                 font-style: normal;
//                 font-weight: 400;
//                 src: local("Lato Regular"), local("Lato-Regular"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
//             }

//             @font-face {
//                 font-family: "Lato";
//                 font-style: normal;
//                 font-weight: 700;
//                 src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
//             }

//             @font-face {
//                 font-family: "Lato";
//                 font-style: italic;
//                 font-weight: 400;
//                 src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
//             }

//             @font-face {
//                 font-family: "Lato";
//                 font-style: italic;
//                 font-weight: 700;
//                 src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
//             }
//         }

//         /* CLIENT-SPECIFIC STYLES */
//         body,
//         table,
//         td,
//         a {
//             -webkit-text-size-adjust: 100%;
//             -ms-text-size-adjust: 100%;
//         }

//         table,
//         td {
//             mso-table-lspace: 0pt;
//             mso-table-rspace: 0pt;
//         }

//         img {
//             -ms-interpolation-mode: bicubic;
//         }

//         /* RESET STYLES */
//         img {
//             border: 0;
//             height: auto;
//             line-height: 100%;
//             outline: none;
//             text-decoration: none;
//         }

//         table {
//             border-collapse: collapse !important;
//         }

//         body {
//             height: 100% !important;
//             margin: 0 !important;
//             padding: 0 !important;
//             width: 100% !important;
//         }

//         /* iOS BLUE LINKS */
//         a[x-apple-data-detectors] {
//             color: inherit !important;
//             text-decoration: none !important;
//             font-size: inherit !important;
//             font-family: inherit !important;
//             font-weight: inherit !important;
//             line-height: inherit !important;
//         }

//         /* MOBILE STYLES */
//         @media screen and (max-width:600px) {
//             h1 {
//                 font-size: 32px !important;
//                 line-height: 32px !important;
//             }
//         }

//         /* ANDROID CENTER FIX */
//         div[style*="margin: 16px 0;"] {
            
//             margin: 0 !important;
//         }
//     </style>
// </head>

// <body style="background-color: #d1d1e0; margin: 0 !important; padding: 0 !important;">
//     <!-- HIDDEN PREHEADER TEXT -->
//     <div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Lato, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;"></div>
//     <table border="0" cellpadding="0" cellspacing="0" width="100%">
//         <!-- LOGO -->
//         <tr>
//             <td bgcolor="#d1d1e0" align="center">
//                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
//                     <tr>
//                         <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
//                     </tr>
//                 </table>
//             </td>
//         </tr>
//         <tr>
//             <td bgcolor="#d1d1e0" align="center" style="padding: 0px 10px 0px 10px;">
//                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
//                     <tr>
//                         <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
//                             <h1 style="font-size: 48px; font-weight: 400; margin: 2;">Selamat Datang!</h1> <img src=" https://img.icons8.com/clouds/100/000000/handshake.png" width="125" height="120" style="display: block; border: 0px;" />
//                         </td>
//                     </tr>
//                 </table>
//             </td>
//         </tr>
//         <tr>
//             <td bgcolor="#d1d1e0" align="center" style="padding: 0px 10px 0px 10px;">
//                 <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
//                     <tr>
//                         <td bgcolor="#ffffff" align="left">
//                             <table width="100%" border="0" cellspacing="0" cellpadding="0">
//                                 <tr>
//                                     <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
//                                         <table border="0" cellspacing="0" cellpadding="0">
//                                             <tr>
//                                                 <td align="center" style="border-radius: 3px;" bgcolor="#000066"><a href="'.base_url().'api/registerakun/verify?token='.$token.'&email='.$email.'" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #000066; display: inline-block;">Confirm Account</a></td>
//                                             </tr>
//                                         </table>
//                                     </td>
//                                 </tr>
//                             </table>
//                         </td>
//                     </tr> <!-- COPY --> <!-- COPY -->
//                     <tr>
//                         <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
//                             <p style="margin: 0;">Kami senang Anda mendaftar. Pertama, Anda perlu mengkonfirmasi akun Anda. Cukup tekan tombol di atas.</p>
//                         </td>
//                     </tr>
//                     <tr>
//                         <td bgcolor="#ffffff" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
//                             <p style="margin: 0;">Hormat Kami,<br>Admin Simrs,</p>
//                         </td>
//                     </tr>
//                 </table>
//             </td>
//         </tr>
//     </table>
// </body>

// </html>
//         ');
        
       
		
// 		if ($this->email->send()){
// 			return true;
// 		}else{
// 				echo $this->email->print_debugger();
// 			}
//     }

//     public function verify_get(){
//         $email = $this->get('email');
//         $token = $this->get('token');

//         $reseller = $this->db->get_where('tb_registrasi', ['email' => $email])->row_array();
//         if($reseller) {
//             $tokennya = $this->db->get_where('user_token', ['token' => $token])->row_array();
//             if($tokennya) {
//                 $this->db->set('is_active', 1);
//                 $this->db->where('email', $email);
//                 $this->db->update('tb_registrasi');

//                 $this->db->delete('user_token', ['email' => $email]);

//                 $response = [
//                     'status' => true,
//                     'pesan' => 'Akun anda sudah di VERIFIKASI',
//                 ];
//                 redirect('auth/cek');
//             } else {
//                 $response = [
//                     'status' => false,
//                     'pesan' => 'Token tidak valid',
//                 ];
//             }
//         } else {
//             $response = [
//                 'status' => false,
//                 'pesan' => 'Email tidak valid',
//             ];
//         }
//         $this->response($response, 200);
//     }
    
   

}
