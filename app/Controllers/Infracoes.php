<?php
    class Infracoes extends Controller{

        public function __construct(){
            $this->infracaoModel = $this->model('Infracao');
        }

        public function tbinfracao(){
            $dados = $this->infracaoModel->allsInfracoes();
            $this->view('paginas/viewInfracao', $dados);
        }

        public function formInfracao(){
            $this->view('forms/formInfracao');
        }

        public function insertInfracao(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->infracaoModel->insertInfracao($formulario);
            $this->tbInfracao();
        }

    }
?>