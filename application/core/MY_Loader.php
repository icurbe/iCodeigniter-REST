<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader 
{
    
    public function iface($iface) 
    {
        require_once APPPATH . '/interfaces/' . $iface . '.php';
    }
    
    public function rest($rest)
    {
        require_once APPPATH . '/restmaster/' . $rest . '.php';
    }
}