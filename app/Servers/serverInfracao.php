<?php
    class serverInfracao extends Controller{
        private $db;
        private $infracaoModel;

        public function __construct(){
            $this->db = new Database();
            $this->infracaoModel = $this->model('Infracao');
        }
        
        public function insertInfracaoBD($formulario){
            $descricao = $formulario['descricao'];
            $pontos = $formulario['pontos'];
            $valor = $formulario['valor'];

            $this->infracaoModel->newInfracao($descricao, $pontos, $valor);
            $this->infracaoModel->insertBD();
        }

        public function getAllInfracoes(){
            $this->db->query("SELECT * FROM `tb_infracao`");
            return $this->db->resultados();
        }

        public function getInfracao($id){
            $this->db->query("SELECT * FROM `tb_infracao` where `idtb_infracao` ".'='." $id");
            return $this->db->resultado();
        }
    }
?>
