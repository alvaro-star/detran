<?php
    class Carro{

        private $db;
        private $id;
        private $placa;

        public function __construct(){
            $this->db = new Database();
        }
        public function newCarro($placa, $id = null){
            $this->placa = $placa;
            $this->id = $id;
        }

        public function insertBD(){
            $this->db->query("INSERT INTO tb_carro (`placa`) VALUES (:placa)");
            $this->db->bind(':placa', $this->placa);
            $this->db->executar();
        }

        public function removeBD(){
            $this->db->query("DELETE FROM `tb_carro` WHERE `tb_carro`.`idtb_carro` ".'='." :id");
            $this->db->bind(':id', $this->id);
            $this->db->executar();
        }

        public function getId(){
            return $this->id;
        }

        public function getPlaca(){
            return $this->placa;
        }

        public function setPlaca($placa){
            $this->placa = $placa;
        }


    }
