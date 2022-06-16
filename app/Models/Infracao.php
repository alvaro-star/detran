<?php
    class Infracao{

        private $db;
        private $id;
        private $descricao;
        private $pontos;
        private $valor;


        public function __construct(){
            $this->db = new Database();
        }
        public function newInfracao($descricao, $pontos, $valor, $id = null){
            $this->descricao = $descricao;
            $this->pontos = $pontos;
            $this->valor = $valor;
            $this->id = $id;
        }

        public function insertBD(){
            $this->db->query("INSERT INTO `tb_infracao` (`descricao`, `pontos`, `valor`) VALUES (:descricao, :pontos, :valor)");
            $this->db->bind(":descricao", $this->descricao);
            $this->db->bind(":pontos", $this->pontos);
            $this->db->bind(":valor", $this->valor);
            $this->db->executar();
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

        public function getId(){
            return $this->id;
        }
    }
    
?>     