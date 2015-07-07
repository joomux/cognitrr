<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }

    public function index() {
        
    }

    public function register() {
        // process registration
        //print_r($this->input->post());

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('register');
        } else {
            // create new user here!
            $data = $this->input->post();
            $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
            unset($data['password2']);
            unset($data['school']);
            $id = $this->users_model->set($data);
            
            // do log in
            $user = $this->users_model->get($id);
            $this->users_model->set_last_login($id);
            $this->session->set_userdata('user', $user);
            $this->session->set_userdata('logged_in', $id);
            $this->session->set_flashdata('msg', 'Welcome to Cognitrr, ' .$data['first_name']);
            $this->load->helper('url');
            redirect('Quiz');
            //die('success');
        }


        //die();
    }

}
