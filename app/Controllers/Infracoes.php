<?php
    class Infracoes extends Controller{

        public function __construct(){
            $this->infracaoModel = $this->model('Infracao');
        }

        public function tbinfracao(){
            $dados = $this->infracaoModel->allsInfracoes();
            $this->view('paginas/viewInfracao', $dados);
        }
    }
?>