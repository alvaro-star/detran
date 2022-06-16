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

    public function insertCarroBD($formulario)
    {
        $placa = $formulario['placa'];
        $this->carroModel->newCarro($placa);
        $this->carroModel->insertBD();
    }

    public function getAllCarros()
    {
        $this->db->query("SELECT * FROM `tb_carro`;");
        return $this->db->resultados();
    }

    public function getCarro($id)
    {
        $this->db->query("SELECT * FROM `tb_carro` WHERE `idtb_carro` " . '=' . " $id");
        return $this->db->resultado();
    }
}
