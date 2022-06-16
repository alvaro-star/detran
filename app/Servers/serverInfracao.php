<?php
    class serverInfracao{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAllInfracoes(){
            $this->db->query("SELECT * FROM `tb_infracao`;");
            return $this->db->resultados();
        }

        public function getInfracao($id){
            $this->db->query("SELECT * FROM `tb_infracao` where `idtb_infracao` ".'='." $id");
            return $this->db->resultado();
        }

        public function insertInfracaoBD($formulario){
            $descricao = $formulario['descricao'];
            $pontos = $formulario['pontos'];
            $valor = $formulario['valor'];

            $this->db->query("INSERT INTO `tb_infracao` (`descricao`, `pontos`, `valor`) VALUES (:descricao, :pontos, :valor)");
            $this->db->bind(":descricao", $descricao);
            $this->db->bind(":pontos", $pontos);
            $this->db->bind(":valor", $valor);
            $this->db->executar();
        }
    }
?>
