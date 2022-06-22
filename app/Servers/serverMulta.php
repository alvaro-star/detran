<?php
class serverMulta extends Controller
{
    private $db;
    private $multaModel;
    private $carroServer;
    private $infracaoServer;

    public function __construct()
    {
        $this->db = new Database();
        $this->multaModel = $this->model('Multa');
        $this->carroServer = $this->server('Carro');
        $this->infracaoServer = $this->server('Infracao');
    }

    public function validarCampos($formulario)
    {
        if (isset($formulario)) :
            $dados = [
                'dado' => [
                    'ano' => trim($formulario['ano']),
                    'cidade' => trim($formulario['cidade']),
                    'idtb_carro' => trim($formulario['idtb_carro']),
                    'idtb_infracao' => trim($formulario['idtb_infracao'])
                ],
                'erro' => [
                    'ano' => '',
                    'cidade' => '',
                    'idtb_carro' => '',
                    'idtb_infracao' => ''
                ]
            ];

            //Validar E-mail
            if (Validar::NumberInt($formulario['ano'], 4)) :
                $dados['erro']['ano'] = 'Digite corretamente o ano';
            endif;

            if (Validar::Text($formulario['cidade'], 14)) :
                $dados['erro']['cidade'] = 'Digite corretamente a cidade';
            endif;

            if (Validar::NumberInt($formulario['idtb_carro'], 100)) :
                $dados['erro']['idtb_carro'] = 'Escolha uma Opcao Valida';
            elseif (!$this->carroServer->checarCarro($formulario['idtb_carro'])) :
                $dados['erro']['idtb_carro'] = 'Escolha uma Opcao Valida';
            endif;

            if (Validar::NumberInt($formulario['idtb_infracao'], 100)) :
                $dados['erro']['idtb_infracao'] = 'Escolha uma Opcao Valida';
            elseif (!$this->infracaoServer->checarInfracao($formulario['idtb_infracao'])) :
                $dados['erro']['idtb_infracao'] = 'Escolha uma Opcao Valida';
            endif;




            if (in_array('', $formulario)) :
                //Verifica se estao vazias
                if (empty($formulario['ano'])) :
                    $dados['erro']['ano'] =  'Preencha o campo ano';
                endif;

                if (empty($formulario['cidade'])) :
                    $dados['erro']['cidade'] =  'Preencha o campo cidade';
                endif;
            endif;

        //Validando se existem os onjetos carro e infracao
        else :
            $dados = [
                'dado' => [
                    'ano' => '',
                    'cidade' => '',
                    'idtb_carro' => '',
                    'idtb_infracao' => ''
                ],
                'erro' => [
                    'ano' => '',
                    'cidade' => '',
                    'idtb_carro' => '',
                    'idtb_infracao' => ''
                ]
            ];
        endif;

        return $dados;
    }

    public function insertMultaBD($formulario)
    {
        $ano = $formulario['ano'];
        $cidade = $formulario['cidade'];
        $carro = $this->carroServer->getCarro($formulario['idtb_carro']);
        $infracao = $this->infracaoServer->getInfracao($formulario['idtb_infracao']);

        $this->multaModel->newMulta($ano, $cidade, $carro, $infracao);
        $this->multaModel->insertBD();
    }

    public function editMultaBD($multa, $id)
    {
        $carro = $this->carroServer->getCarro($multa['idtb_carro']);
        $infracao = $this->infracaoServer->getInfracao($multa['idtb_infracao']);
        $this->multaModel->newMulta($multa['ano'], $multa['cidade'], $carro, $infracao, $id);
        $this->multaModel->updateBD();
    }

    public function removeMulta($id)
    {
        $multa = $this->getMulta($id);
        $carro = $this->carroServer->getCarro($multa->tb_carro_idtb_carro);
        $infracao = $this->infracaoServer->getInfracao($multa->tb_infracao_idtb_infracao);
        $this->multaModel->newMulta($multa->ano, $multa->cidade, $carro, $infracao, $multa->idtb_multa);

        $this->multaModel->removeBD();
    }

    public function search($placa)
    {
        $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_infracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro = tb_multa.tb_carro_idtb_carro INNER JOIN `tb_infracao` ON tb_infracao.idtb_infracao = tb_multa.tb_infracao_idtb_infracao WHERE tb_carro.placa LIKE '%$placa%';");
        return $this->db->resultados();
    }

    public function getMulta($id)
    {
        $this->db->query("SELECT * FROM `tb_multa` where `idtb_multa` " . '=' . " $id");
        return $this->db->resultado();
    }

    public function getAllMultas()
    {
        $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_infracao.descricao, tb_carro.idtb_carro, tb_infracao.idtb_infracao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro = tb_multa.tb_carro_idtb_carro INNER JOIN `tb_infracao` ON tb_infracao.idtb_infracao = tb_multa.tb_infracao_idtb_infracao;");
        return $this->db->resultados();
    }
}
