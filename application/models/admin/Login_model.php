<?php

class Login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * @uses : this function is used to get user data email and password wise
     * @param : @email,@password 
     * @author : HDA
     */
    public function get_user($email) {
        $this->db->where('email', $email);
        $users = $this->db->get("users");
        $user_detail = $users->row_array();
        return $user_detail;
    }

    /**
     * @uses : this function is used to reset password
     * @param : @email,@password 
     * @author : HDA
     */
    public function reset_password($id, $password) {
        $this->db->set('password',$password);
        $this->db->where('id', $id);
        $resut = $this->db->update('users');
        return $resut;
    }


}
