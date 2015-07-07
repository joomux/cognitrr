<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
    }
    
    public function index() {
        $this->load->view('login');
    }
    
    public function login() {
        
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        
        log_message('debug', 'Login attempt from: ' .$username);
        
        $id = $this->users_model->login($username, $password);
        
        if ($id) {
            $user = $this->users_model->get($id);
            $this->session->set_userdata('user', $user);
            $this->session->set_userdata('logged_in', $id);
            $this->session->set_flashdata('msg', 'Welcome back, ' .$user['first_name']);
            $this->load->helper('url');
            redirect('Quiz');
        } else {
            $this->session->set_flashdata('msg', 'Invalid email or password');
            redirect('Login');
        }
    }
    
    /**
     * Connect to facebook for authentication
     */
    public function facebook() {
        
    }
    
    public function logout() {
        $this->session->set_flashdata('msg', 'You have been logged out');
        $this->session->unset_userdata(array('user', 'is_logged_in'));
        redirect('Login');
    }
    
    public function register() {
        
        
        $this->load->view('register');
    }
}