<?php defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
/**
 * @descriptions
 */
class Authenticate extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('authenticate_mdl');
        $this->load->library('auth');
    }

    public function auth()
    {
        $usname = $this->input->post('SG_USER_NAME');
        $uspswd = $this->input->post('SG_USER_PASSW');

        if (empty($usname) || empty($uspswd)) {
            echo json_encode(['status' => FALSE, 'message' => 'Field empty, field requiered']);
        } else {
            $USER_DATA = $this->authenticate_mdl->validateAuth($usname, $uspswd);
            if(count($USER_DATA) > 0 ) {
                $token = $this->auth->SignIn($USER_DATA[0]);
                $this->authenticate_mdl->token($token);
                echo json_encode(['status' => TRUE, 'message' => "Successful", 'session' => $token ]);
            } else {
                echo json_encode(['status' => FALSE, 'message' => 'Incorrect username or password']);
            }
        }
    }
}