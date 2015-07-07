<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Questions_Model extends CI_Model {
    public function __construct() {
         parent::__construct();
    }
    
    public function get_question($id=false) {
        $this->db->select('questions.*');
        $this->db->select('courses.name as course');
        $this->db->select('schools.name as school');
        $this->db->select('courses.code');
        $this->db->select('users.first_name');
        $this->db->select('users.last_name');
        if ($id) {
            $this->db->where('id', $id);
        } else {
            $this->db->order_by('RAND()');
            $this->db->limit(1);
        }
        $this->db->join('courses', 'questions.course_id = courses.id', 'left');
        $this->db->join('schools', 'courses.school_id = schools.id', 'left');
        $this->db->join('users', 'questions.user_id = users.id', 'left');
        $query = $this->db->get('questions');
        return $query->result_array()[0];
    }
    
    public function add($vars=array()) {
        if (isset($vars['id']) and !empty($vars['id'])) {
            $this->db->where('id', $vars['id']);
            $this->db->update('questions', $vars);
        } else {
            
            $this->db->insert('questions', $vars);
        }
    }
    
    public function get($id) {
        $this->db->select("CONCAT('[', code, '] ', name, ' - ', school.name) AS course", false);
        $this->db->select('questions.*');
        $this->db->join('courses', 'questions.course_id = courses.id', 'left');
        $this->db->join('shools', 'courses.school_id = school.id', 'left');
        $query = $this->db->get_where('questions', array('questions.id' => $id));
        return $query->row_array();
    }
    
    public function get_all() {
        $this->db->order_by('RAND()');
        $query = $this->db->get('questions');
        return $query->result_array();
    }
}