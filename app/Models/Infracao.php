<?php
    class TipoInfracao{

        private $id;
        private $descricao;
        private $pontos;
        private $valor;

        public function __construct($id, $descricao, $pontos, $valor){
            $this->id = $id;
            $this->descricao = $descricao;
            $this->pontos = $pontos;
            $this->valor = $valor;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescricao(){
            return $this->descricao;
        }

        public function getPontos(){
            return $this->pontos;
        }

        public function getValor(){
            return $this->valor;
        }


    }
    
?>     