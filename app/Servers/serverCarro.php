<?php
    class serverCarro extends Controller{
        private $db;
        private $carroModel;

        public function __construct(){
            $this->db = new Database();
            $this->carroModel = $this->model('Carro');
        }
        
        public function insertCarroBD($formulario){
            $placa = $formulario['placa'];
            $this->carroModel->newCarro($placa);
            $this->carroModel->insertBD();
        }

        public function getAllCarros(){
            $this->db->query("SELECT * FROM `tb_carro`;");
            return $this->db->resultados();
        }
    
        public function getCarro($id){
            $this->db->query("SELECT * FROM `tb_carro` WHERE `idtb_carro` ".'='." $id");
            return $this->db->resultado();
        }
    }
?>