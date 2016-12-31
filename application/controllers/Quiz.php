<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('QuizModel', 'quiz');
	}

	public function index() {
		$data = array(
			'view' => 'Quiz/Dashboard',
			'data' => $this->quiz->getAll()
		);
		$this->load->view('templates/default', $data);
	}

	public function create($errors = NULL) {
		if(!empty($_POST)) echo '<pre>'; print_r($_POST); echo '</pre>'; //var_dump indentado
		if(!empty($_POST)) {
			if($this->quiz->validaCriacaoDeQuiz()) $this->quiz->makeQuiz();
			else $errors = $this->quiz->getValidationErrors();
		}

		$data = array(
			'view' => 'Quiz/Create',
			'errors' => $errors
		);
		$this->load->view('templates/default', $data);
	}

	public function visualize() {
		if(!empty($_POST)) echo '<pre>'; print_r($_POST); echo '</pre>'; //var_dump indentado
		$quiz_id = $this->uri->segment(3);

		$quizCover = $this->quiz->getCover($quiz_id);
		//echo '<pre>'; print_r($quizCover); echo '</pre>'; //var_dump indentado

		$quizQuestions = $this->quiz->getQuestions($quiz_id);
		//echo '<pre>'; print_r($quizQuestions); echo '</pre>'; //var_dump indentado

		$questionAlternatives = $this->quiz->getAlternatives($quizQuestions);
		//echo '<pre>'; print_r($questionAlternatives); echo '</pre>'; //var_dump indentado

		$data = array(
			'view' => 'Quiz/Visualize',
			'quizCover' => $quizCover,
			'quizQuestions' => $quizQuestions,
			'questionAlternatives' => $questionAlternatives
		);
		$this->load->view('templates/quiz', $data);
	}

	public function edit() {
		echo $this->uri->segment(3);
	}

	public function delete() {
		echo $this->uri->segment(3);
	}
}
