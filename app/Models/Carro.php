<?php
    class Carro{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAllsCarros(){
            $this->db->query("SELECT * FROM `tb_carro`;");
            return $this->db->resultados();
        }

        public function getCarro($id){
            $this->db->query("SELECT * FROM `tb_carro` WHERE `idtb_carro` ".'='." $id");
            return $this->db->resultado();
        }

        public function insertCarroBD($formulario){
            $placa = $formulario['placa'];
            $this->db->query("INSERT INTO tb_carro (`idtb_carro`, `placa`) VALUES (NULL, :placa)");
            $this->db->bind(':placa', $placa);
            $this->db->executar();
        }

    }

?>