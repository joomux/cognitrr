<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Study extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_login(true);
        $this->load->model('questions_model');
        $this->load->model('courses_model');
        $this->load->model('study_model');
    }
    
    public function index() {
        $data['questions'] = $this->questions_model->get_all();
        
        $this->load->view('study', $data);
    }
}