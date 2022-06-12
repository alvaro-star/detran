<?php
    class Usuario{
        private $db;

        public function __construct(){
           $this->db = new Database();
        }

        public function insert($dados){
            $this->db->query("INSERT INTO `tb_usuario`(`nome`, `email`, `senha`) VALUES (:nome, :email, :senha)");
            $this->db->bind(':nome', $dados['nome']);
            $this->db->bind(':email', $dados['email']);
            $this->db->bind(':senha', $dados['senha']);

            return ($this->db->executar()) ? true : false;
        }

        public function checarEmail($email){
            $this->db->query("SELECT email FROM tb_usuario WHERE email = :em;");
            $this->db->bind(":em", $email);

            return ($this->db->resultado()) ? true : false;
        }

        public function checarLogin($email, $senha){
            $this->db->query("SELECT email, senha FROM tb_usuario WHERE email = :em;");
            $this->db->bind(":em", $email);

            if($this->db->resultado()){
                $resultado = $this->db->resultado()->senha;
                return (md5($senha) == $resultado) ? true : false;
            }else{
                return false;
            }
        }


    }
?>