<?php
    class Multas extends Controller{

        private $multaModel;
        private $carroModel;
        private $infracaoModel;

        public function __construct(){
            $this->multaModel = $this->model('Multa');
            $this->carroModel = $this->model('Carro');
            $this->infracaoModel = $this->model('Infracao');
        }

        public function tbMulta(){
            $dados = $this->multaModel->getAllsMultas();
            $this->view('paginas/viewMulta', $dados);
        }

        public function formMulta(){

            $dados = [
                'carros' => $this->carroModel->getAllsCarros(),
                'infracoes' => $this->infracaoModel->getAllsInfracoes()
            ];
            $this->view('forms/formMulta', $dados);
        }

        public function insertMulta(){
            //Formulario es um vetor
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->multaModel->insertMultaBD($formulario);
            $this->tbMulta();
        }

    }
?>