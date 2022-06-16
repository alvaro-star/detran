<?php
    class Controller{
        public function model($model){
            require_once '../app/Models/'.$model.'.php';
            return new $model;
        }

        public function server($server){
            $server = 'server'.$server;
            require_once '../app/Servers/'.$server.'.php';
            return new $server;
        }

        public function view($view, $dados=[]){
            $arquivo = '../app/Views/'.$view.'.php';
            if(file_exists($arquivo)):
                require_once $arquivo;
            else:
                die("O arquivo de view não existe!!!");
            endif;
        }
    }
?>