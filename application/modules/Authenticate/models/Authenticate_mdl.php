<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'entity/Access.php';

class Authenticate_mdl extends CI_Model
{
    public function validateAuth($username, $password) {
        $this->load->database();
        $this->db->select('SG_USER_FULLNAME, SG_USER_MAIL, SG_USER_PICTURE, SG_USER_AREA, SG_USER_PHONE, SG_USER_ID');
        $this->db->from('SG_USER');
        $this->db->where('SG_USER_NAME', $username);
        $this->db->where('SG_USER_PASSW', $this->getHashedPassword( $password ));
        $query = $this->db->get();
        $result = $query->result();
        //echo $this->db->last_query();
        $this->db->close();
        return $result;
    }

    private function getHashedPassword($plainPassword)
    {
        return sha1($plainPassword);
    }

    public function token($token) {
        $ACCESS = new Access($token, 1, null);
        $this->load->database();
        try {
            $this->db->insert('ACCESS', $ACCESS);
            $this->db->close();
            return true;
        } catch (\Throwable $th) {
            $this->db->close();
            return false;
        }
    }
}