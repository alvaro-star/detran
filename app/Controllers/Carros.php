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
        //Formulario é um vetor
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados = $this->carroServer->validarCampos($formulario);

        if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
            $this->carroServer->insertCarroBD($formulario);
            Url::redirecionar('carros/tbCarro');
        else:
            $this->view('forms/formCarro', $dados);
        endif;
    }
}
