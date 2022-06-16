<?php
class Infracoes extends Controller
{

    private $infracaoServer;

    public function __construct()
    {
        $this->infracaoServer = $this->server('Infracao');
    }

    public function tbInfracao()
    {
        $dados = $this->infracaoServer->getAllInfracoes();
        $this->view('paginas/viewInfracao', $dados);
    }

    public function formInfracao()
    {
        $this->view('forms/formInfracao');
    }

    public function insertInfracao()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $dados = $this->infracaoServer->validarCampos($formulario);

        if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
            $this->infracaoServer->insertInfracaoBD($formulario);
            Url::redirecionar('infracoes/tbInfracao');
        endif;

        $this->view('forms/formInfracao', $dados);
    }
}
