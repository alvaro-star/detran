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

        public function imprimeDados(){
            echo "<div class = 'texto'>";
            echo "<p class = 'paragrafos'>------Os dado do carro-------</p>";
            echo "Id: ".$this->getId().'<br>';
            echo "Placa: ".$this->getPlaca().'<br>';
            echo '</div>';
        }

    }

?>