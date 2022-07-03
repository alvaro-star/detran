<?php
    class Database{
        private $host = 'us-cdbr-east-05.cleardb.net';
        private $user = 'bf1e08804eb278';
        private $senha = '08292243';
        private $base = 'heroku_9978d4a9d973550';
        private $porta = '3306';
        private $dbh;
        private $stmt;

        public function __construct(){
            $dsn = "mysql:host=".$this->host.";port=".$this->porta.";dbname=".$this->base;
            $opcoes = [
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            try {
                $this->dbh = new PDO($dsn, $this->user, $this->senha, $opcoes);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function query($sql){
            $this->stmt = $this->dbh->prepare($sql);
        }

        public function bind($paramatro, $valor, $tipo = null){
            //código bruto, falta perfeiçoar
            
            if(is_null($tipo)):
                switch (true) {
                    case is_int($valor):$tipo = PDO::PARAM_INT;
                    break;
                    case is_bool($valor):$tipo = PDO::PARAM_BOOL;
                    break;
                    case is_null($valor):$tipo = PDO::PARAM_NULL;
                    break;
                    default: $tipo = PDO::PARAM_STR;
                    break;
                }
            endif;
            $this->stmt->bindValue($paramatro, $valor, $tipo);
        }

        public function executar(){
            return $this->stmt->execute();
        }

        public function resultado(){
            $this->executar();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        public function resultados(){
            $this->executar();
            return $this->stmt->fetchALL(PDO::FETCH_OBJ);
        }

        public function totalLinhas(){
            return $this->stmt->rowCount();
        }

        public function lastId(){
            return $this->dbh->lastInsertId();        
        }
        
    }


?>