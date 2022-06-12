<?php
    class Carros extends Controller{

        public function __construct(){
            $this->carroModel = $this->model('Carro');
        }

        public function tbcarro(){
            
            $dados = $this->carroModel->allsCars();
            $this->view('paginas/viewCarro', $dados);
        }
    }
?>