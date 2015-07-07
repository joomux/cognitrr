<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Model {
    public function __construct() {
         parent::__construct();
    }
    
    public function set($data) {
        
        if (isset($data['id']) and !empty($data['id'])) {
            // UPDATE
            $this->db->where('id', $data['id']);
            $this->db->update('users', $data);
            return $data['id'];
        } else {
            // INSERT
            $this->db->insert('users', $data);
            return $this->db->insert_id();
        }
    }
    
    public function get($id) {
        $this->db->select('*');
        $this->db->select("CONCAT(first_name, ' ', last_name) AS full_name", false);
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }
    
    /**
     * 
     * @param type $username
     * @param type $password
     * @return bool
     */
    public function login($username, $password) {
        $this->db->select('id, password');
        $query = $this->db->get_where('users', array('email' => $username));
        $rows = $query->result_array();
        
        if (!$rows) {
            log_message('debug', 'No user records found with matching email address = ' .$username);
            return false;
        } else {
            foreach ($rows as $row) {
                if (password_verify($password, $row['password'])) {
                    $this->set_last_login($row['id']);
                    return $row['id'];
                }
            }
        }
        log_message('debug', 'No matching user found');
        return false;
    }
    
    public function set_last_login($id) {
        $this->db->set('last_login', date('Y-m-d H:i:a'));
        $this->db->where('id', $id);
        return $this->db->update('users');
    }
}