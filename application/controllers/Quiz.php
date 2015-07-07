<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

    public function __construct() {
        parent::__construct();
        require_login(true);
        $this->load->model('questions_model');
        $this->load->model('courses_model');
    }

    public function index() {
        if ($this->input->post('course_id') and $this->input->post('course_id') != 0) {
            $question = $this->questions_model->get_question($this->input->post('course_id'));
        } else {
            $question = $this->questions_model->get_question();
        }
        $courses = $this->courses_model->get_courses();
        $data['courses'] = array('0' => '-- Choose Course --');
        foreach ($courses as $c) {
            $data['courses'][$c['id']] = $c['name'];
        }
        $data['question'] = $question;
        $this->load->view('quiz', $data);
    }

    public function answer() {
        $question_id = $this->input->post('question_id');
        $data['question'] = $this->questions_model->get_question($question_id);
        $data['myanswer'] = $this->input->post('myanswer');
        $courses = $this->courses_model->get_courses();
        $data['courses'] = array('0' => '-- Choose Course --');
        foreach ($courses as $c) {
            $data['courses'][$c['id']] = $c['name'];
        }
        $this->load->view('answer', $data);
    }
}
