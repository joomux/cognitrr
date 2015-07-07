<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class School extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('schools_model');
    }
    
    public function json() {
        $like = $this->input->get('term');
        $data = $this->schools_model->get($like);
        $json = array();
        foreach ($data as $row) {
            $json[] = array(
                'id' => $row['id'],
                'value' => $row['name']
            );
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($json));
    }
}
