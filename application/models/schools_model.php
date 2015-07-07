<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Schools_Model extends CI_Model {
    public function __construct() {
         parent::__construct();
    }
    
    public function get($like='') {
        if (!empty($like)) {
            $this->db->like('name', $like);
        }
        $this->db->order_by('name');
        $query = $this->db->get('schools');
        return $query->result_array();
    }
}