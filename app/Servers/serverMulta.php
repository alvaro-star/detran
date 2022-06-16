<?php
    class serverMulta{
        private $db;
        
        public function __construct(){
            $this->db = new Database();
        }

        public function getMulta($id){
            $this->db->query("SELECT * FROM `tb_multa` where `idtb_multa` ".'='." $id");
            return $this->db->resultado();
        }

        public function getAllMultas(){
            $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_infracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro ".'='." tb_multa.tb_carro_idtb_carro INNER JOIN `tb_infracao` ON tb_infracao.idtb_infracao ".'='." tb_multa.tb_infracao_idtb_infracao;");
            return $this->db->resultados();
        }

        public function insertMultaBD($formulario){
            $ano = $formulario['ano'];
            $cidade = $formulario['cidade'];
            $idCarro = $formulario['idtb_carro'];
            $idInfracao = $formulario['idtb_infracao'];
            $this->db->query("INSERT INTO `tb_multa`(`ano`, `cidade`, `tb_carro_idtb_carro`, `tb_infracao_idtb_infracao`) VALUES (:ano, :cidade, :idtb_carro, :idtb_infracao)");
            $this->db->bind(":ano", $ano);
            $this->db->bind(":cidade", $cidade);
            $this->db->bind(":idtb_carro", $idCarro);
            $this->db->bind(":idtb_infracao", $idInfracao);
            $this->db->executar();
        }
    } 
?>
