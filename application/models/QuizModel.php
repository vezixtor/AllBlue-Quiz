<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuizModel extends CI_Model {
  private $quizCoverTitle;
  private $quizCoverDescription;
  private $resultados;
  private $perguntas;
  private $alternativas;
  private $pontuacoes;
  private $validationErrors;

  public function __construct() {
    // Call the CI_Model constructor
    parent::__construct();
  }

  public function getAll() {
    $query = $this->db->get('quiz_capa');
    return $query->result();
  }

  public function getCover($quiz_id) {
    $query = $this->db->get_where('quiz_capa', array('id' => $quiz_id));
    return $query->row();
  }

  public function getQuestions($quiz_id) {
    $query = $this->db->get_where('quiz_pergunta', array('quiz_id' => $quiz_id));
    return $query->result();/*
    $this->db->select('*');
    $this->db->from('quiz_pergunta');
    $this->db->join('quiz_alternativa', 'quiz_alternativa.pergunta_id = quiz_pergunta.id');
    $query = $this->db->get();
    return $query->result();*/
  }

  public function getAlternatives($question_result) {
    foreach ($question_result as $question) {
      $questions_id[] = $question->id;
    }
    $this->db->select('*');
    $this->db->from('quiz_alternativa');
    $this->db->where_in('pergunta_id', $questions_id);
    //$query = $this->db->get_where('quiz_alternativa', array('pergunta_id' => $question_id));
    $query = $this->db->get();
    return $query->result();
  }

  public function makeQuiz() {
    //Seta informações do POST na classe
    $this->setAttributes();

    //Insere no banco de dados
    $quiz_id = $this->insertCover();
    $resultados_id = $this->insertResultados($quiz_id);
    $perguntas_id = $this->insertPerguntas($quiz_id);
    $alternativas_id = $this->insertAlternativas($perguntas_id);
    $this->insertPontuacao($resultados_id, $alternativas_id);
  }

  public function setAttributes() {
    $this->quizCoverTitle = $this->input->post('cover-title');
    $this->quizCoverDescription = $this->input->post('cover-description');
		$this->resultados = $this->input->post('resultado');
		$this->perguntas = $this->input->post('pergunta');
		$this->alternativas = $this->input->post('alternativa');
		$this->pontuacoes = $this->input->post('pontuacao');
  }

  public function insertCover() {
    $data = array(
      'titulo' => $this->quizCoverTitle,
      'descricao' => $this->quizCoverDescription
    );
    $id = $this->db->insert('quiz_capa', $data);
    return $this->db->insert_id();
  }

  public function insertResultados($quiz_id) {
    foreach($this->resultados as $index => $resultado) {
      $data = array(
        'quiz_id' => $quiz_id,
        'titulo' => $resultado['title'],
        'descricao' => $resultado['description']
      );
      $this->db->insert('quiz_resultado', $data);
      $resultados_id[] = $this->db->insert_id();
    }
    return $resultados_id;
  }

  public function insertPerguntas($quiz_id) {
    foreach($this->perguntas as $index => $pergunta) {
      $data = array(
        'quiz_id' => $quiz_id,
        'questao' => $pergunta
      );
      $this->db->insert('quiz_pergunta', $data);
      $perguntas_id[] = $this->db->insert_id();
    }
    return $perguntas_id;
  }

  public function insertAlternativas($perguntas_id) {
    foreach($this->alternativas as $questionIndex => $questionBlock) {
      foreach($questionBlock as $alternativa) {
        $data = array(
          'pergunta_id' => $perguntas_id[$questionIndex],
          'texto' => $alternativa
        );
        $this->db->insert('quiz_alternativa', $data);
        $alternativas_id[] = $this->db->insert_id();
      }
    }
    return $alternativas_id;
  }

  public function insertPontuacao($resultados_id, $alternativas_id) {
    $alternativeCount = 0;
    foreach($this->pontuacoes as $questionIndex => $questionBlock) {
      foreach($questionBlock as $alternativeIndex => $alternativeBlock) {
        foreach ($alternativeBlock as $resultIndex => $score) {
          $data = array(
            'id_alternativa' => $alternativas_id[$alternativeCount],
            'id_resultado' => $resultados_id[$resultIndex],
            'pontos_valor' => $score
          );
          $this->db->insert('quiz_pontuacao', $data);
        }
        $alternativeCount++;
      }
    }
  }

  public function validaCriacaoDeQuiz() {
    $this->load->library('form_validation');
		$this->form_validation->set_message('min_length', 'O campo "{field}" deve ter mais de {param} characters.');

		//Validação da capa e descrição do quiz
		$this->form_validation->set_rules('cover-title', 'Titulo do quiz', 'required|min_length[3]|max_length[120]');
		$this->form_validation->set_rules('cover-description', 'Descrição do quiz', 'required|min_length[3]|max_length[500]');

		//Validação dos resultados
		$resultados = $this->input->post('resultado');
		foreach($resultados as $index => $resultado) {
			$this->form_validation->set_rules('resultado['.$index.'][title]', 'Titulo do resultado '.($index + 1), 'required|min_length[3]');
			$this->form_validation->set_rules('resultado['.$index.'][description]', 'Descrição do resultado '.($index + 1), 'required|min_length[3]');
		}

		//Validação das perguntas
		$perguntas = $this->input->post('pergunta');
		foreach($perguntas as $index => $pergunta) {
			$this->form_validation->set_rules('pergunta['.$index.']', 'Texto da pergunta '.($index + 1), 'required|min_length[3]');
		}

		//Validação das alternativas
		$alternativas = $this->input->post('alternativa');
		foreach($alternativas as $indexQuestion => $alternativa) {
			foreach($alternativa as $indexAlternative => $texto) {
				$this->form_validation->set_rules('alternativa['.$indexQuestion.']['.$indexAlternative.']',
          'Alternativa '.($indexAlternative + 1).' da pergunta '.($indexQuestion + 1),
          'required'
        );
			}
		}

		//Validação das Pontacões
		$pontuacoes = $this->input->post('pontuacao');
  	//echo '<pre>'; print_r($pontuacoes); echo '</pre>'; //var_dump indentado
		foreach($pontuacoes as $i => $pertunta) {
			foreach($pertunta as $j => $alternativa) {
        foreach($alternativa as $k => $pontos) {
				  $this->form_validation->set_rules('pontuacao['.$i.']['.$j.']['.$k.']',
            'pontuacao['.$i.']['.$j.']['.$k.']',
            'required|integer'
          );
          //echo 'pontuacao['.$i.']['.$j.']['.$k.']'.'<br>';
        }
      }
		}

    if($this->form_validation->run()) return TRUE;
    else {
      $this->validationErrors = validation_errors('<div class="alert alert-danger" role="alert">', '</div>');
      return FALSE;
    }
  }

  public function getValidationErrors() {
    return $this->validationErrors;
  }

}
