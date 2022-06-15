<?php
    class Infracao{
        private $id;
        private $descricao;
        private $pontos;
        private $valor;
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function prencherInfracao($id, $descricao, $pontos, $valor){
            $this->id = $id;
            $this->descricao = $descricao;
            $this->pontos = $pontos;
            $this->valor = $valor;
        }

        public function getId(){
            return $this->id;
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
        public function imprimeDados(){
            echo "<div class = 'texto'>";
            echo "<p class = 'paragrafos'>----Os Dados da Infracao----</p>";
            echo "Id: ".$this->getId().'<br>';
            echo "Descrição: ".$this->getDescricao().'<br>';
            echo "Pontos: ".$this->getPontos().'<br>';
            echo "Valor: ".$this->getValor().'<br>';
            echo '</div>';
        }

        public function allsInfracoes(){
            $this->db->query("SELECT * FROM `tb_tipoInfracao`;");
            return $this->db->resultados();
        }

        public function getInfracao($id){
            $this->db->query("SELECT * FROM `tb_tipoInfracao` where `idtb_tipoInfracao` ".'='." $id");
        }

        public function insertInfracao($formulario){
            $descricao = $formulario['descricao'];
            $pontos = $formulario['pontos'];
            $pontos = $formulario['valor'];
            $this->db->query("INSERT INTO `tb_tipoInfracao` (`idtb_tipoInfracao`, `descricao`, `pontos`, `valor`) VALUES (NULL, :descricao, :placa, :valor)");
            $this->db->bind(":descricao", $descricao);
            $this->db->bind(":pontos", $pontos);
            $this->db->bind(":valor", $valor);
            $this->db->executar();
        }


    }
    
?>