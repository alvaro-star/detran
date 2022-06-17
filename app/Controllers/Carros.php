<?php
class Carros extends Controller
{

    private $carroServer;

    public function __construct()
    {
        $this->carroServer = $this->server('Carro');
    }

    public function tbCarro()
    {
        $dados = $this->carroServer->getAllCarros();
        $this->view('paginas/viewCarro', $dados);
    }

    public function insertCarro()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados = $this->carroServer->validarCampos($formulario);

        if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
            $this->carroServer->insertCarroBD($formulario);
            Url::redirecionar('carros/tbCarro');
        endif;
        $this->view('forms/formCarro', $dados);
    }

    public function removeCarro($id)
    {
        $multasCarro = $this->carroServer->getAllMultas($id);
        if (!$multasCarro) :
            $this->carroServer->removeCarro($id);
            Sessao::mensagem('delete', 'O carro foi removido com sucesso');
        else:
            Sessao::mensagem('delete', 'O carro possui uma multa, nao pode ser removido', 'alert alert-danger');
        endif;

        Url::redirecionar('carros/tbCarro');
    }

    public function editCarro($id){
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $carro = $this->carroServer->getCarro($id);
        $carro = To::array($carro);

        if(is_null($formulario)){
            $dados = $this->carroServer->validarCampos($carro);
        }else{
            $dados = $this->carroServer->validarCampos($formulario);
            
            if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
                $this->carroServer->validarIgualdade($formulario, $carro);
                $this->carroServer->editCarroBD($formulario, $carro['idtb_carro']);
                Url::redirecionar('carros/tbCarro');
            endif;
        }

        $dados['dado']['idtb_carro'] = $carro['idtb_carro'];
        $this->view('forms/formCarro', $dados);
    }
}
