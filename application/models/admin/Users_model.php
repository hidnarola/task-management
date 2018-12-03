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
    public function list_users($type) {
        $keyword = $this->input->get('search');
        if (!empty($keyword['value'])) {
            $where = '(username LIKE "%' . $keyword['value'] . '%" OR first_name LIKE "%' . $keyword['value'] . '%")';
            $this->db->where($where);
        }
        if ($type == 'count') {
            $query = $this->db->get("users");
            return $query->num_rows();
        } else {
            return $this->db->get("users");
        }

    }

    public function add_new_user($data){
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

}
