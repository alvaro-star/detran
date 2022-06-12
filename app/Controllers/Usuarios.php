<?php
    
    class Usuarios extends Controller{
        private $usuarioModel;

        public function __construct()
        {
            $this->usuarioModel = $this->model('Usuario');
        }

        public function cadastrar(){
            //$db = new Database();
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                $dados = [
                    'nome' => trim($formulario['nome']),
                    'email' => trim($formulario['email']),
                    'senha' => trim($formulario['senha']),
                    'confirmar_senha' => trim($formulario['confirmar_senha']),
                    'erro' => [
                        'nome' => '',
                        'email' => '',
                        'senha' => '',
                        'confirmar_senha' => ''
                    ]
                ];

                //Validar Nome
                if(Validar::Nome($formulario['nome'])):
                    $dados['erro']['nome'] = 'O nome não pode incluir numeros e caracteres especiais';
                endif;

                //Validar E-mail
                if(Validar::Email($formulario['email'])):
                    $dados['erro']['email'] = 'O email nao pode possuir caracteres especiais'; 
                elseif($this->usuarioModel->checarEmail($formulario['email'])):
                    $dados['erro']['email'] = 'O e-mail informado ja esta cadastrado';
                endif;

                //Validar Senha
                if(Validar::Senha($formulario['senha'])):
                    $dados['erro']['senha'] = 'A senha deve ter no minimo 6 caracteres, uma letra mauscula e um caracter especial';
                endif;

                //Validar Confirmar Senha
                if($formulario['senha'] != $formulario['confirmar_senha']):
                    $dados['erro']['confirmar_senha'] = 'As senhas são diferentes';
                endif;

                //Verifica se estao vazias
                if(in_array('', $formulario)):
                    if(empty($formulario['nome'])):
                        $dados['erro']['nome'] = 'Preencha o campo nome';
                    endif;

                    if(empty($formulario['email'])):
                        $dados['erro']['email'] =  'Preencha o campo e-mail';
                    endif;

                    if(empty($formulario['senha'])):
                        $dados['erro']['senha'] = 'Preencha o campo senha';
                    endif;

                    if(empty($formulario['confirmar_senha'])):
                        $dados['erro']['confirmar_senha'] = 'Preencha o campo confirmar senha';
                    endif;
                endif;

                if(!in_array(!'', $dados['erro'])):

                    $dados['senha'] = md5($formulario['senha']);
                    if($this->usuarioModel->insert($dados)){
                        $dados['senha'] = $formulario['senha'];
                        echo 'Deu certo';
                    }else{
                        echo "Nao deu certo";
                    }
                endif;
                
            else:
                $dados = [
                    'nome' => '',
                    'email' => '',
                    'senha' => '',
                    'confirmar_senha' => '',

                    'erro' => [
                        'nome' => '',
                        'email' => '',
                        'senha' => '',
                        'confirmar_senha' => ''
                    ]
                ];
                
            endif;
            $this->view('usuarios/cadastrar', $dados);
        }

        public function login(){

            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if(isset($formulario)):
                $dados = [
                    'email' => trim($formulario['email']),
                    'senha' => trim($formulario['senha']),
                    'erro' => [
                        'email' => '',
                        'senha' => ''
                    ]
                ];

                //Validar E-mail
                if(Validar::Email($formulario['email'])):
                    $dados['erro']['email'] = 'Digite corretamente o email'; 
                endif;

                //Validar Senha
                if(Validar::Senha($formulario['senha'])):
                    $dados['erro']['senha'] = 'Digite a senha corretamente';
                endif;

                //Verifica se estao vazias
                if(in_array('', $formulario)):
                    if(empty($formulario['email'])):
                        $dados['erro']['email'] =  'Preencha o campo e-mail';
                    endif;

                    if(empty($formulario['senha'])):
                        $dados['erro']['senha'] = 'Preencha o campo senha';
                    endif;
                endif;

                if(!in_array(!'', $dados['erro'])):
                    $checarLogin = $this->usuarioModel->checarLogin($formulario['email'], $formulario['senha']);
                    echo ($checarLogin) ? "Conseguiu" : 'Nao conseguiu';
                endif;
                
            else:
                $dados = [
                    'email' => '',
                    'senha' => '',
                    'erro' => [
                        'email' => '',
                        'senha' => ''
                    ]
                ];
            endif;

            $this->view('/usuarios/login', $dados);
        }
    }
