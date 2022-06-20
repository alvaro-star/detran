<?php
class serverCarro extends Controller
{
    private $db;
    private $carroModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->carroModel = $this->model('Carro');
    }

    public function validarCampos($formulario)
    {
        if (isset($formulario)) :
            $dados = [
                'dado' => [
                    'placa' => trim($formulario['placa']),
                    'nome' => trim($formulario['nome'])
                ],
                'erro' => [
                    'placa' => '',
                    'nome' => ''
                ]
            ];

            //Validar a Placa e nome
            if (Validar::PLaca($formulario['placa'])) :
                $dados['erro']['placa'] = 'Digite corretamente a placa';
            endif;

            if (Validar::Text($formulario['nome'], 100)) :
                $dados['erro']['nome'] = 'Digite corretamente o Nome';
            endif;

            //Verifica se estao vazias
            if (empty($formulario['placa'])) :
                $dados['erro']['placa'] =  'Preencha o campo Placa';
            endif;

            if (empty($formulario['nome'])) :
                $dados['erro']['nome'] =  'Preencha o campo Nome';
            endif;
        else :
            $dados = [
                'dado' => [
                    'placa' => '',
                    'nome' => ''
                ],
                'erro' => [
                    'placa' => '',
                    'nome' => ''
                ]
            ];
        endif;

        return $dados;
    }

    public function validarIgualdade($formulario, $carro)
    {
        if (Validar::areDiferents($formulario, $carro)) {
            Sessao::mensagem('edit', 'Alteracoes salvas');
        } else {
            Sessao::mensagem('edit', 'Nenhuma Alteracao foi realizada', 'alert alert-secondary');
        }
    }

    public function insertCarroBD($formulario)
    {
        $placa = $formulario['placa'];
        $nome = $formulario['nome'];
        $this->carroModel->newCarro($placa, $nome);
        $this->carroModel->insertBD();
    }

    public function editCarroBD($carro, $id)
    {
        $this->carroModel->newCarro($carro['placa'], $carro['nome'], $id);
        $this->carroModel->updateBD();
    }

    public function removeCarro($id)
    {
        $carro = $this->getCarro($id);
        $this->carroModel->newCarro($carro->placa, $carro->nome, $carro->idtb_carro);
        $this->carroModel->removeBD();
    }

    public function getAllCarros()
    {
        $this->db->query("SELECT tb_carro.idtb_carro, tb_usuario.nome as nome_usuario, tb_carro.nome as nome_carro, tb_carro.placa, tb_carro.postado_em FROM tb_carro, tb_usuario WHERE tb_carro.usuario_id = tb_usuario.idtb_usuario; ");
        return $this->db->resultados();
    }

    public function getAllMultas($id)
    {
        $this->db->query("SELECT * FROM `tb_multa` where `tb_carro_idtb_carro` " . '=' . " :id");
        $this->db->bind(':id', $id);
        return $this->db->resultados();
    }

    public function getCarro($id)
    {
        $this->db->query('SELECT * FROM `tb_carro` WHERE `idtb_carro` ' . '=' . ' :id');
        $this->db->bind(':id', $id);
        return $this->db->resultado();
    }

    public function checarCarro($id)
    {
        $this->db->query("SELECT * FROM `tb_carro` WHERE `idtb_carro` " . '=' . " :id");
        $this->db->bind(':id', $id);
        return ($this->db->resultado()) ? true : false;
    }
}
