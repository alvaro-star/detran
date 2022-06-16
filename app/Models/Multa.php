<?php
    class Multa{

        private $id;
        private $ano;
        private $cidade;
        private $carro;
        private $tipoInfracao;


        public function __construct($id, $ano, $cidade, $carro, $tipoInfracao){
            $this->id = $id;
            $this->ano = $ano;
            $this->cidade = $cidade;
            $this->carro = new Carro($carro->getId(), $carro->getPlaca());
            $this->tipoInfracao = new TipoInfracao($tipoInfracao->getId(), $tipoInfracao->getDescricao(), $tipoInfracao->getPontos(), $tipoInfracao->getValor());
        }

        public function getId(){
            return $this->id;
        }

        public function getAno(){
            return $this->ano;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function getCarro(){
            return $this->carro;
        }

        public function getTipoInfracao(){
            return $this->tipoInfracao;
        }
    }

?>