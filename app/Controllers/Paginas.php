<?php
    class Paginas extends Controller{

        public function index(){
            if(Sessao::estaLogado()){
                Url::redirecionar('carros');
            }
            $dados = ['titulo'=>'Pagina Inicial', 'descricao'=>'Curso de PHP7'];
            $this->view('paginas/home', $dados);
        }

        public function carro(){
            $this->view('paginas/viewCarro');
        }

        public function tpInfracao(){
            $this->view('paginas/viewTipoInfracao');
        }

        public function multa(){
            $this->view('paginas/viewMulta');
        }

        public function tbMulta(){
            $this->view('paginas/viewTabelaMulta');
        }
        //Para criar o banco de dados
        public function tabelas(){
            $this->view('paginas/viewTabelas');
        }

    }
    


?>