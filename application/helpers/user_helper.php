<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function require_login($required=true) {
    if (!is_logged_in()) {
        $CI =& get_instance();
        $CI->load->helper('url');
        $CI->session->set_flashdata('error', 'Please log in to access that screen.');
        redirect('Login');
    }
}

function is_logged_in() {
    return isset($_SESSION['logged_in']);
}