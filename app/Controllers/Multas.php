<?php
    class Multas extends Controller{

        public function __construct(){
            $this->multaModel = $this->model('Multa');
        }

        public function tbmulta(){
            $dados = $this->multaModel->allsMultas();
            $this->view('paginas/viewMulta', $dados);
        }

        public function formMulta(){
            $this->view('forms/formMulta');
        }

    }
?>