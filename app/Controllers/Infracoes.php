<?php
    class Infracoes extends Controller{

        private $infracaoServer;

        public function __construct(){
            $this->infracaoServer = $this->server('Infracao');
        }

        public function tbInfracao(){
            $dados = $this->infracaoServer->getAllInfracoes();
            $this->view('paginas/viewInfracao', $dados);
        }

        public function formInfracao(){
            $this->view('forms/formInfracao');
        }

        public function insertInfracao(){
            //Formulario es um vetor
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->infracaoServer->insertInfracaoBD($formulario);
            $this->tbInfracao();
        }

    }
?>