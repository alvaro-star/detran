<?php
    class Multas extends Controller{

        private $multaServer;
        private $carroServer;
        private $infracaoServer;

        public function __construct(){
            $this->multaServer = $this->server('Multa');
            $this->carroServer = $this->server('Carro');
            $this->infracaoServer = $this->server('Infracao');
        }

        public function tbMulta(){
            $dados = $this->multaServer->getAllMultas();
            $this->view('paginas/viewMulta', $dados);
        }

        public function formMulta(){
            $dados = [
                'carros' => $this->carroServer->getAllCarros(),
                'infracoes' => $this->infracaoServer->getAllInfracoes()
            ];
            $this->view('forms/formMulta', $dados);
        }

        public function insertMulta(){
            //Formulario es um vetor
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->multaServer->insertMultaBD($formulario);
            $this->tbMulta();
        }

    }
?>