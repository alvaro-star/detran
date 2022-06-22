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

    public function index()
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
            Url::redirecionar('multas/index');
        endif;

        $this->view('forms/formMulta', $dados);
    }

    public function editMulta($id)
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $multa = $this->multaServer->getMulta($id);
        $multa = To::array($multa);
        $multa['idtb_carro'] = $multa['tb_carro_idtb_carro'];
        $multa['idtb_infracao'] = $multa['tb_infracao_idtb_infracao'];

        if (is_null($formulario)) {
            $dados = $this->multaServer->validarCampos($multa);
        } else {
            $dados = $this->multaServer->validarCampos($formulario);

            if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
                Validar::validarIgualdade('edit', $formulario, $multa);
                $this->multaServer->editMultaBD($formulario, $multa['idtb_multa']);
                Url::redirecionar('multas/index');
            endif;
        }

        $dados['carros'] = $this->carroServer->getAllCarros();
        $dados['infracoes'] = $this->infracaoServer->getAllInfracoes();

        $dados['dado']['idtb_multa'] = $multa['idtb_multa'];
        $this->view('forms/formMulta', $dados);
    }

    public function removeMulta($id)
    {
        $this->multaServer->removeMulta($id);
        Sessao::mensagem('delete', 'A multa foi removido com sucesso');
        Url::redirecionar('multas/index');
    }

    public function search($id_carro = null, $id_infracao = null)
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($formulario) != NULL) {
            $dados = $this->multaServer->search($formulario['placa']);
        } elseif ($id_carro != null && $id_carro != 0) {
            $dados = $this->carroServer->getAllMultas($id_carro);
        } elseif ($id_infracao != null && $id_infracao != 0) {
            $dados = $this->infracaoServer->getAllMultas($id_infracao);
        }

        $this->view('paginas/viewMulta', $dados);
    }
}
