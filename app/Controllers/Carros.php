<?php
    class Carros extends Controller{

        public function __construct(){
            $this->carroModel = $this->model('Carro');
        }

        public function tbCarro(){
            $dados = $this->carroModel->getAllsCarros();
            $this->view('paginas/viewCarro', $dados);
        }

        public function formCarro(){
            $this->view('forms/formCarro');
        }

        public function insertCarro(){
            //Formulario é um vetor
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->carroModel->insertCarroBD($formulario);
            $this->tbcarro();
        }
    }
?>