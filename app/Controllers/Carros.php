<?php
class Carros extends Controller
{

    private $carroServer;

    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            Url::redirecionar('usuarios/login');
        endif;

        $this->db = new Database();
        $this->carroServer = $this->server('Carro');
    }

    public function index()
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
            Url::redirecionar('carros');
        endif;
        $this->view('forms/formCarro', $dados);
    }

    public function editCarro($id)
    {
        if ($this->carroServer->isYourCar($id)) {
            $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $carro = $this->carroServer->getCarro($id);
            $carro = To::array($carro);

            if (is_null($formulario)) {
                $dados = $this->carroServer->validarCampos($carro);
            } else {
                $dados = $this->carroServer->validarCampos($formulario);

                if (!in_array(!'', $dados['erro']) && in_array(!'', $dados['dado'])) :
                    Validar::validarIgualdade('edit', $formulario, $carro);
                    $this->carroServer->editCarroBD($formulario, $carro['idtb_carro']);
                    Url::redirecionar('carros/index');
                endif;
            }

            $dados['dado']['idtb_carro'] = $carro['idtb_carro'];
            $this->view('forms/formCarro', $dados);
        } else {
            Sessao::mensagem('edit', 'Vc nao criou este carro, portanto nao pode editalo', 'alert alert-danger');
            $this->view('carros/index');
        }
    }

    public function removeCarro($id)
    {
        if ($this->carroServer->isYourCar($id)) {
            $multasCarro = $this->carroServer->getAllMultas($id);
            if (!$multasCarro) :
                $this->carroServer->removeCarro($id);
                Sessao::mensagem('delete', 'O carro foi removido com sucesso');
            else :
                Sessao::mensagem('delete', 'O carro possui uma multa, nao pode ser removido', 'alert alert-danger');
            endif;
        }else{
            Sessao::mensagem('delete', 'Vc nao pode remover este carro porque vc nao o criou', 'alert alert-danger');
        }
        
        Url::redirecionar('carros/index');
    }
}
