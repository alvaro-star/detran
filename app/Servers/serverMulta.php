<?php
    class serverMulta extends Controller{
        private $db;
        private $multaModel;
        private $carroServer;
        private $infracaoServer;
        
        public function __construct(){
            $this->db = new Database();
            $this->multaModel = $this->model('Multa');
            $this->carroServer = $this->server('Carro');
            $this->infracaoServer = $this->server('Infracao');
        }

        public function insertMultaBD($formulario){

            $ano = $formulario['ano'];
            $cidade = $formulario['cidade'];
            $carro = $this->carroServer->getCarro($formulario['idtb_carro']);
            $infracao = $this->infracaoServer->getInfracao($formulario['idtb_infracao']);
            
            $this->multaModel->newMulta($ano, $cidade, $carro, $infracao);
            $this->multaModel->insertBD();
            
        }
        public function getMulta($id){
            $this->db->query("SELECT * FROM `tb_multa` where `idtb_multa` ".'='." $id");
            return $this->db->resultado();
        }

        public function getAllMultas(){
            $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_infracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro ".'='." tb_multa.tb_carro_idtb_carro INNER JOIN `tb_infracao` ON tb_infracao.idtb_infracao ".'='." tb_multa.tb_infracao_idtb_infracao;");
            return $this->db->resultados();
        }



    } 
?>
