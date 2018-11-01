<?php

class Users_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * @uses : this function is used to get all users
     * @param : @email,@password 
     * @author : HDA
     */
    public function list_users() {
        return $this->db->get("users");
    } 

}
