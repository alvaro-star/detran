<?php
    class Carro{

        private $id;
        private $placa;

        public function __construct($id, $placa){
            $this->id = $id;
            $this->placa = $placa;
        }

        public function getId(){
            return $this->id;
        }

        public function getPlaca(){
            return $this->placa;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setPlaca($placa){
            $this->placa = $placa;
        }


    }

?>