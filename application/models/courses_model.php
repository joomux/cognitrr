<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Courses_Model extends CI_Model {
    public function __construct() {
         parent::__construct();
    }
    
    public function get_courses($id=false) {
        if ($id) {
            $this->db->where('id', $id);
        } else {
            //$this->db->order_by('RAND()');
            //$this->db->limit(1);
        }
        $query = $this->db->get('courses');
        return $query->result_array();//[0];
    }
    
    public function add($vars=array()) {
//        $this->db->set('question', $vars['question']);
//        $this->db->set('answer', $vars['answer']);
//        if (isset($vars['image']) and !empty($vars['image'])) {
//            $this->db->set('image', $vars['image']);
//        }
//        if (isset($vars['id']) and !empty($vars['id'])) {
//            $this->db->where('id', $vars['id']);
//            $this->db->update('questions');
//        } else {
//            
//            $this->db->insert('questions');
//        }
    }
    
    public function get($id) {
        $query = $this->db->get_where('courses', array('id' => $id));
        return $query->row_array();
    }
    
    public function get_all($like='') {
        //->db->order_by('RAND()');
        $this->db->select('courses.*, schools.name as school');
        if (!empty($like)) {
            $this->db->like('courses.name', $like);
            $this->db->or_like('code', $like);
            $this->db->or_like('schools.name', $like);
        }
        $this->db->join('schools', 'courses.school_id = schools.id', 'left');
        $this->db->order_by('courses.name');
        $query = $this->db->get('courses');
        
        return $query->result_array();
    }
}