<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_login(true);
        $this->load->model('courses_model');
    }
    
    public function json() {
        $like = $this->input->get('term');
        $data = $this->courses_model->get_all($like);
        $json = array();
        foreach ($data as $row) {
            $json[] = array(
                'id' => $row['id'],
                'value' => '['.$row['code'].'] '.$row['name']. ' - ' .$row['school']
            );
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
    }
}
