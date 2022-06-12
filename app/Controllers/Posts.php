<?php
    class Posts extends Controller{

        public function carro(){
            $this->view('posts/controllerCarro');
        }

        public function tpInfracao(){
            $this->view('posts/controllerTipoInfracao');
        }

        public function multa(){
            $this->view('posts/controllerMulta');
        }
        
    }

?>