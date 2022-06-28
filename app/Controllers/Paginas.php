<?php
    class Paginas extends Controller{

        public function index(){
            if(Sessao::estaLogado()){
                Url::redirecionar('carros/');
            }
            $dados = ['titulo'=>'Pagina Inicial', 'descricao'=>'Curso de PHP7'];
            $this->view('paginas/home', $dados);
        }
        
        //Para criar o banco de dados
        public function tabelas(){
            $this->view('paginas/viewTabelas');
        }

    }
    


?>