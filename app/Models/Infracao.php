<?php
    class Infracao{

        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAllsInfracoes(){
            $this->db->query("SELECT * FROM `tb_tipoInfracao`;");
            return $this->db->resultados();
        }

        public function getInfracao($id){
            $this->db->query("SELECT * FROM `tb_tipoInfracao` where `idtb_tipoInfracao` ".'='." $id");
            return $this->db->resultado();
        }

        public function insertInfracaoBD($formulario){
            $descricao = $formulario['descricao'];
            $pontos = $formulario['pontos'];
            $valor = $formulario['valor'];
            $this->db->query("INSERT INTO `tb_tipoInfracao` (`idtb_tipoInfracao`, `descricao`, `pontos`, `valor`) VALUES (NULL, :descricao, :placa, :valor)");
            $this->db->bind(":descricao", $descricao);
            $this->db->bind(":pontos", $pontos);
            $this->db->bind(":valor", $valor);
            $this->db->executar();
        }


    }
    //ss
?>     