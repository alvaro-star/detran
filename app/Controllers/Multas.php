<?php
class Multas extends Controller
{

    private $multaServer;
    private $carroServer;
    private $infracaoServer;

    public function __construct()
    {
        $this->multaServer = $this->server('Multa');
        $this->carroServer = $this->server('Carro');
        $this->infracaoServer = $this->server('Infracao');
    }

    public function tbMulta()
    {
        $dados = $this->multaServer->getAllMultas();
        $this->view('paginas/viewMulta', $dados);
    }

    public function insertMulta()
    {
        //Formulario es um vetor
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $dados = $this->multaServer->validarCampos($formulario);
        $dados['carros'] = $this->carroServer->getAllCarros();
        $dados['infracoes'] = $this->infracaoServer->getAllInfracoes();

        if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
            $this->multaServer->insertMultaBD($formulario);
            Url::redirecionar('multas/tbMulta');
        endif;

        $this->view('forms/formMulta', $dados);
    }
}
