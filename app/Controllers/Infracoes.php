<?php
    class Infracoes extends Controller{

        public function __construct(){
            $this->infracaoModel = $this->model('Infracao');
        }

        public function tbInfracao(){
            $dados = $this->infracaoModel->getAllsInfracoes();
            $this->view('paginas/viewInfracao', $dados);
        }

        public function formInfracao(){
            $this->view('forms/formInfracao');
        }

        public function insertInfracao(){
            //Formulario es um vetor
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->infracaoModel->insertInfracaoBD($formulario);
            $this->tbInfracao();
        }

    }
?>