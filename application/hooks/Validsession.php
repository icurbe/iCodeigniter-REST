<?php

/**
 * User: Ing. Hector Curbelo Barrios
 */
class Validsession
{
    function index()
    {
        $CI =& get_instance();
        //var_dump($CI->router->class);
        switch ($CI->router->class)
        {
            case 'Authenticate':
                return true;
            break;

             case 'welcome':
                return true;
            break;
                  
            default:
                $this->sessioncheck($CI);
            break;
        }
        unset($CI);
    }

    private  function sessioncheck($CI)
    {
        $CI->load->library('auth');
        $token = getallheaders()['Token'];
        if(!is_null($token))
        {
            if ($CI->load->library('auth')->auth->Check($token)===true) {
                return true;
            } else {
                if($CI->router->class==='View'){
                    header('Location:'.base_url());
                } else {
                    echo json_encode(['status'=>false, 'token'=>false]);
                    die();
                }
            }
        } else {
            if($CI->router->class==='View') {
                header('Location:'.base_url());
            } else {
                echo json_encode(['status'=>false, 'token'=>false]);
                die();
            }
        }
    }
}
