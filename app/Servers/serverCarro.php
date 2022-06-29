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
                    'nome' => trim($formulario['nome']),
                    'usuario_id' => $_SESSION['usuario_id']
                ],
                'erro' => [
                    'placa' => '',
                    'nome' => '',
                    'usuario_id' => ''
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

            if (empty($_SESSION['usuario_id'])) :
                $dados['erro']['usuario_id'] =  'Preencha o campo Nome';
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

    public function insertCarroBD($formulario)
    {
        $placa = $formulario['placa'];
        $nome = $formulario['nome'];
        $usuario_id = $_SESSION['usuario_id'];
        $this->carroModel->newCarro($nome, $placa, 0, $usuario_id);
        $this->carroModel->insertBD();
    }

    public function editCarroBD($carro, $id)
    {
        $this->carroModel->newCarro($carro['nome'], $carro['placa'], $id);
        $this->carroModel->updateBD();
    }

    public function removeCarro($id)
    {
        $carro = $this->getCarro($id);
        $this->carroModel->newCarro($carro->nome, $carro->placa, $carro->idtb_carro);
        $this->carroModel->removeBD();
    }

    public function search($placa)
    {
        $this->db->query("SELECT tb_carro.idtb_carro, 
                                tb_usuario.nome as nome_usuario, 
                                tb_carro.nome as nome_carro, 
                                tb_carro.placa, 
                                SUM(tb_infracao.valor) as divida, 
                                tb_carro.postado_em FROM tb_multa 
                                RIGHT JOIN tb_carro ON tb_carro.idtb_carro = tb_multa.tb_carro_idtb_carro 
                                LEFT JOIN tb_infracao ON tb_infracao.idtb_infracao = tb_multa.tb_infracao_idtb_infracao 
                                LEFT JOIN tb_usuario ON tb_usuario.idtb_usuario = tb_carro.usuario_id 
                                WHERE tb_carro.placa LIKE '%$placa%' 
                                GROUP BY tb_carro.idtb_carro;");

        $carros = $this->db->resultados();

        foreach ($carros as $carro) {
            if (is_null($carro->divida)) {
                $carro->divida = 0;
            }
        }
        return $carros;
    }

    public function getAllCarros()
    {
        $this->db->query("SELECT tb_carro.idtb_carro, 
                                tb_usuario.nome as nome_usuario, 
                                tb_carro.nome as nome_carro, 
                                tb_carro.placa, 
                                SUM(tb_infracao.valor) as divida, 
                                tb_carro.postado_em FROM tb_multa 
                                RIGHT JOIN tb_carro ON tb_carro.idtb_carro = tb_multa.tb_carro_idtb_carro 
                                LEFT JOIN tb_infracao ON tb_infracao.idtb_infracao = tb_multa.tb_infracao_idtb_infracao 
                                LEFT JOIN tb_usuario ON tb_usuario.idtb_usuario = tb_carro.usuario_id 
                                GROUP BY tb_carro.idtb_carro;");
        $carros = $this->db->resultados();

        foreach ($carros as $carro) {
            if (is_null($carro->divida)) {
                $carro->divida = 0;
            }
        }
        return $carros;
    }

    public function getAllMultas($id)
    {
        $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_infracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro = tb_multa.tb_carro_idtb_carro INNER JOIN `tb_infracao` ON tb_infracao.idtb_infracao = tb_multa.tb_infracao_idtb_infracao WHERE tb_carro.idtb_carro = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultados();
    }

    public function getCarro($id)
    {
        $this->db->query('SELECT * FROM `tb_carro` WHERE `idtb_carro` = :id');
        $this->db->bind(':id', $id);
        return $this->db->resultado();
    }

    public function checarCarro($id)
    {
        $this->db->query("SELECT * FROM `tb_carro` WHERE `idtb_carro` = :id");
        $this->db->bind(':id', $id);
        return ($this->db->resultado()) ? true : false;
    }

    public function isYourCar($id)
    {
        $carro = $this->getCarro($id);
        return ($carro->usuario_id == $_SESSION['usuario_id']) ? true : false;
    }

    public function getModel()
    {
        return $this->carroModel;
    }
}
