<?php
class Infracoes extends Controller
{

    private $infracaoServer;

    public function __construct()
    {
        $this->infracaoServer = $this->server('Infracao');
    }

    public function index()
    {
        $dados = $this->infracaoServer->getAllInfracoes();
        $this->view('paginas/viewInfracao', $dados);
    }

    public function insert()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $dados = $this->infracaoServer->validarCampos($formulario);

        if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
            $this->infracaoServer->insertInfracaoBD($formulario);
            Url::redirecionar('infracoes/index');
        endif;

        $this->view('forms/formInfracao', $dados);
    }

    public function editInfracao($id){
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $infracao = $this->infracaoServer->getInfracao($id);
        $infracao = To::array($infracao);

        if(is_null($formulario)){
            $dados = $this->infracaoServer->validarCampos($infracao);
        }else{
            $dados = $this->infracaoServer->validarCampos($formulario);
            
            if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
                Validar::validarIgualdade('edit', $formulario, $infracao);
                $this->infracaoServer->editInfracaoBD($formulario, $infracao['idtb_infracao']);
                Url::redirecionar('infracoes/index');
            endif;
        }

        $dados['dado']['idtb_infracao'] = $infracao['idtb_infracao'];
        $this->view('forms/formInfracao', $dados);
    }

    
    public function removeInfracao($id)
    {
        $multasInfracoes = $this->infracaoServer->getAllMultas($id);
        if (!$multasInfracoes) :
            $this->infracaoServer->removeInfracao($id);
            Sessao::mensagem('delete', 'A infracao foi removido com sucesso');
            Url::redirecionar('infracoes/index');
        else:
            Sessao::mensagem('delete', 'A infracao possui uma multa, nao pode ser removido', 'alert alert-danger');
            Url::redirecionar("multas/search/0/$id");
        endif;
    }
    
    public function search(){
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $dados = $this->infracaoServer->search($formulario['descricao']);
        $this->view('paginas/viewInfracao', $dados);
    }
}
