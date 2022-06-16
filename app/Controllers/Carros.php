<?php
    class Carros extends Controller{

        private $carroServer;
        public function __construct(){
            $this->carroServer = $this->server('Carro');
        }

        public function tbCarro(){
            $dados = $this->carroServer->getAllCarros();
            $this->view('paginas/viewCarro', $dados);
        }

        public function formCarro(){
            $this->view('forms/formCarro');
        }

        public function insertCarro(){
            //Formulario é um vetor
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->carroServer->insertCarroBD($formulario);
            $this->tbcarro();
        }
    }
?>