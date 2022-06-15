<?php
    class Multa{

        private $db;


        public function __construct(){
            $this->db = new Database();
        }

        public function getMulta($id){
            $this->db->query("SELECT * FROM `tb_multa` where `idtb_multa` ".'='." $id");
            return $this->db->resultado();
        }

        public function getAllsMultas(){
            $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_tipoinfracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro ".'='." tb_multa.tb_carro_idtb_carro INNER JOIN `tb_tipoinfracao` ON tb_tipoinfracao.idtb_tipoInfracao ".'='." tb_multa.tb_tipoInfracao_idtb_tipoInfracao;");
            return $this->db->resultados();
        }

        public function insertMultaBD($formulario){
            $ano = $formulario['ano'];
            $cidade = $formulario['cidade'];
            $idCarro = $formulario['id_tbcarro'];
            $idInfracao = $formulario['idtb_tipoInfracao'];
            $this->db->query("INSERT INTO `tb_multa`(`ano`, `cidade`, `tb_carro_idtb_carro`, `tb_tipoInfracao_idtb_tipoInfracao`) VALUES (:ano, :cidade, :idtb_carro, :idtb_tipoInfracao)");
            $this->db->bind(":ano", $ano);
            $this->db->bind(":cidade", $cidade);
            $this->db->bind(":idtb_carro", $idCarro);
            $this->db->bind(":idtb_tipoInfracao", $idInfracao);
            $this->db->executar();
        }
    }

?>