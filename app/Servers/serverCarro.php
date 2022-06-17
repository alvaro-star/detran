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
                    'placa' => trim($formulario['placa'])
                ],
                'erro' => [
                    'placa' => ''
                ]
            ];

            //Validar E-mail
            if (Validar::PLaca($formulario['placa'])) :
                $dados['erro']['placa'] = 'Digite corretamente a placa';
            endif;

            //Verifica se estao vazias
            if (empty($formulario['placa'])) :
                $dados['erro']['placa'] =  'Preencha o campo Placa';
            endif;
        else :
            $dados = [
                'dado' => [
                    'placa' => ''
                ],
                'erro' => [
                    'placa' => ''
                ]
            ];
        endif;

        return $dados;
    }

    public function validarIgualdade($formulario, $carro){
        if(Validar::areDiferents($formulario, $carro)){
            Sessao::mensagem('edit', 'Alteracoes salvas');
        }else{
            Sessao::mensagem('edit', 'Nenhuma Alteracao foi realizada', 'alert alert-secondary');
        }
    }

    public function insertCarroBD($formulario)
    {
        $placa = $formulario['placa'];
        $this->carroModel->newCarro($placa);
        $this->carroModel->insertBD();
    }

    public function editCarroBD($carro, $id){
        $this->carroModel->newCarro($carro['placa'], $id);
        $this->carroModel->updateBD();
    }

    public function removeCarro($id)
    {
        $carro = $this->getCarro($id);
        $this->carroModel->newCarro($carro->placa, $carro->idtb_carro);
        $this->carroModel->removeBD();
    }

    public function getAllCarros()
    {
        $this->db->query("SELECT * FROM `tb_carro`;");
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
