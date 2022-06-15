<?php

    class Tabelas extends Controller{
        private $tabelaModel;
        //Para criar o banco de dados

        public function __construct(){
            $this->tabelaModel = $this->model('Tabela');
        }

        public function tabelas(){
            $dados = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if($dados['CDTabelas'] == 'create'):
                if(!empty($dados['usuario'])):
                    $this->tabelaModel->criarTabelaUsuario();
                endif;

                if(!empty($dados['carro'])):
                    $this->tabelaModel->criarTabelaCarro(10);
                endif;

                if(!empty($dados['infracao'])):
                    $this->tabelaModel->criarTabelaInfracao(10);
                endif;

                if(!empty($dados['multa'])):
                    $this->tabelaModel->criarTabelaMulta();
                endif;
                echo "concluido";
            elseif($dados['CDTabelas'] == 'delete'):
                if(!empty($dados['usuario'])):
                    $this->tabelaModel->eliminarTabelaUsuario();
                endif;

                if(!empty($dados['carro'])):
                    $this->tabelaModel->eliminarTabelaCarro();
                endif;

                if(!empty($dados['infracao'])):
                    $this->tabelaModel->eliminarTabelaInfracao();
                endif;

                if(!empty($dados['multa'])):
                    $this->tabelaModel->eliminarTabelaMulta();
                endif;

                echo "concuido";
            endif;
        }
    }
?>