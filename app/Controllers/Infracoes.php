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

    public function removeInfracao($id)
    {
        $multasInfracoes = $this->infracaoServer->getAllMultas($id);
        if (!$multasInfracoes) :
            $this->infracaoServer->removeInfracao($id);
            Sessao::mensagem('delete', 'A infracao foi removido com sucesso');
        else:
            Sessao::mensagem('delete', 'A infracao possui uma multa, nao pode ser removido', 'alert alert-danger');
        endif;

        Url::redirecionar('infracoes/tbInfracao');
    }
}
