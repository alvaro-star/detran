<?php
    class Carro{
        private $id;
        private $placa;
        private $db;


        public function __construct(){
            $this->db = new Database();
        }

        public function prencherCarro($id, $placa){
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
        //Funcoes de processamento

        public function allsCars(){
            $this->db->query("SELECT * FROM `tb_carro`;");
            return $this->db->resultados();
        }

        public function getCarro($id){
            $this->db->query("SELECT * FROM `tb_carro` WHERE `idtb_carro` ".'='." $id");
            return $this->db->resultado();
        }

        public function insertCarro($formulario){
            $placa = $formulario['placa'];
            $this->db->query("INSERT INTO tb_carro (`idtb_carro`, `placa`) VALUES (NULL, :placa)");
            $this->db->bind(':placa', $placa);
            $this->db->executar();
        }

    }

?>