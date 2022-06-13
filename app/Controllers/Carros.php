<?php
    class Carros extends Controller{

        public function __construct(){
            $this->carroModel = $this->model('Carro');
        }

        public function tbcarro(){
            $dados = $this->carroModel->allsCars();
            $this->view('paginas/viewCarro', $dados);
        }

        public function formCarro(){
            $this->view('forms/formCarro');
        }

        public function insertCarro(){
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->carroModel->insertCarro($formulario);
            $this->tbcarro();
        }
    }
?>