<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->model('questions_model');
            
            require_login(true);
        }
        
	public function index()
	{
            $this->add();
	}
        
        public function add() {
            $post = $this->input->post();
            //print_r($post);
            //die();
            $data = array();
            if ($this->input->post('question')) {
                //print_r($this->input->post());
                $vars = array(
                    'id' => $this->input->post('question_id'),
                    'question' => $this->input->post('question'),
                    'answer' => $this->input->post('answer'),
                    'course_id' => $this->input->post('course_id')
                );
                $config = array();
                $config['upload_path'] = 'assets/img/';
                $config['allowed_types'] = 'gif|jpg|png';//|pdf|doc|docx|ppt|pptx|mp4|mp3';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $vars['image'] = $this->upload->data('file_name');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('msg', $error);
                }
                
                $this->questions_model->add($vars);
                $this->session->set_flashdata('msg', 'Question Saved!');
            }
            $data['question'] = array('id' => '', 'question' => '', 'answer' => '', 'course_id' => '', 'course' => '');
            $this->load->view('question', $data);
        }
        
        public function edit($id) {
            $data['question'] = $this->questions_model->get($id);
            $this->load->view('question', $data);
        }
}
