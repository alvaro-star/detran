<?php
    class Multa{
        private $id;
        private $ano;
        private $cidade;
        private $carro;
        private $tipoInfracao;
        private $db;


        public function __construct(){
            $this->db = new Database();
        }

        public function prencherMulta($id, $ano, $cidade, $carro, $tipoInfracao){
            $this->id = $id;
            $this->ano = $ano;
            $this->cidade = $cidade;
            $this->carro = new Carro($carro->getId(), $carro->getPlaca());
            $this->tipoInfracao = new Infracao($tipoInfracao->getId(), $tipoInfracao->getDescricao(), $tipoInfracao->getPontos(), $tipoInfracao->getValor());
        }

        public function getId(){
            return $this->id;
        }

        public function getAno(){
            return $this->ano;
        }

        public function getCidade(){
            return $this->cidade;
        }

        public function getCarro(){
            return $this->carro;
        }

        public function getTipoInfracao(){
            return $this->tipoInfracao;
        }

        public function imprimeDados(){
            echo "<div class = 'texto'>";
            echo "<p class = 'paragrafos'>-----Os dados da Multa-----</p>";
            echo "Id: ".$this->getId()."<br>";
            echo "Ano: ".$this->getAno()."<br>";
            echo "Cidade: ".$this->getCidade()."<br>";
            echo '</div>';
            echo $this->getCarro()->imprimeDados();
            echo $this->getTipoInfracao()->imprimeDados();
        }

        public function allsMultas(){
            $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_tipoinfracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro ".'='." tb_multa.tb_carro_idtb_carro INNER JOIN `tb_tipoinfracao` ON tb_tipoinfracao.idtb_tipoInfracao ".'='." tb_multa.tb_tipoInfracao_idtb_tipoInfracao;");
            return $this->db->resultados();
        }
    }

?>