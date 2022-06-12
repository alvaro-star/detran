<?php
    class Posts extends Controller{

        public function carro(){
            $this->view('posts/postCarro');
        }

        public function tpInfracao(){
            $this->view('posts/postTipoInfracao');
        }

        public function multa(){
            $this->view('posts/postMulta');
        }
        
    }

?>