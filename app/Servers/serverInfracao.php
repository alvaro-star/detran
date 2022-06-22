<?php
class serverInfracao extends Controller
{
    private $db;
    private $infracaoModel;

    public function __construct()
    {
        $this->db = new Database();
        $this->infracaoModel = $this->model('Infracao');
    }

    public function validarCampos($formulario)
    {
        if (isset($formulario)) :
            $dados = [
                'dado' => [
                    'descricao' => trim($formulario['descricao']),
                    'pontos' => trim($formulario['pontos']),
                    'valor' => trim($formulario['valor'])
                ],
                'erro' => [
                    'descricao' => '',
                    'pontos' => '',
                    'valor' => ''
                ]
            ];
            //Validar a descricao
            if (Validar::text($formulario['descricao'], 200)) :
                $dados['erro']['descricao'] = 'A descricao nao pode conter caracteres especiais';
            endif;
            //Validar Pontos
            if (Validar::NumberInt($formulario['pontos'], 4)) :
                $dados['erro']['pontos'] = 'O valor digitado precisa ser do tipo inteiro, com 4 digitos como maximo';
            endif;
            //Validar Valor
            if (Validar::NumberFloat($formulario['valor'])) :
                $dados['erro']['valor'] = 'Digite corretamente o valor';
            endif;

            //Verifica se estao vazias
            if (in_array('', $formulario)) :

                if (empty($formulario['descricao'])) :
                    $dados['erro']['descricao'] =  'Preencha o campo descricao';
                endif;

                if (empty($formulario['pontos'])) :
                    $dados['erro']['pontos'] =  'Preencha o campo pontos';
                endif;

                if (empty($formulario['valor'])) :
                    $dados['erro']['valor'] = 'Preencha o campo valor';
                endif;
            endif;
        else :
            $dados = [
                'dado' => [
                    'descricao' => '',
                    'pontos' => '',
                    'valor' => ''
                ],
                'erro' => [
                    'descricao' => '',
                    'pontos' => '',
                    'valor' => ''
                ]
            ];
        endif;

        return $dados;
    }

    public function editInfracaoBD($infracao, $id){
        $this->infracaoModel->newInfracao($infracao['descricao'], $infracao['pontos'], $infracao['valor'], $id);
        $this->infracaoModel->updateBD();
    }

    public function insertInfracaoBD($formulario)
    {
        $descricao = $formulario['descricao'];
        $pontos = $formulario['pontos'];
        $valor = $formulario['valor'];

        $this->infracaoModel->newInfracao($descricao, $pontos, $valor);
        $this->infracaoModel->insertBD();
    }

    public function removeInfracao($id)
    {
        $infracao = $this->getInfracao($id);
        $this->infracaoModel->newInfracao($infracao->descricao, $infracao->pontos, $infracao->valor, $infracao->idtb_infracao);
        $this->infracaoModel->removeBD();
    }

    public function search($descricao){
        $this->db->query("SELECT * FROM tb_infracao WHERE descricao LIKE '%$descricao%'; ");
        return $this->db->resultados();
    }

    public function getAllInfracoes()
    {
        $this->db->query("SELECT * FROM `tb_infracao`");
        return $this->db->resultados();
    }

    public function getAllMultas($id)
    {
        $this->db->query("SELECT tb_multa.idtb_multa, tb_multa.ano, tb_multa.cidade, tb_carro.placa, tb_infracao.descricao FROM `tb_multa` INNER JOIN `tb_carro` ON tb_carro.idtb_carro = tb_multa.tb_carro_idtb_carro INNER JOIN `tb_infracao` ON tb_infracao.idtb_infracao = tb_multa.tb_infracao_idtb_infracao WHERE tb_infracao.idtb_infracao = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultados();
    }

    public function getInfracao($id)
    {
        $this->db->query("SELECT * FROM `tb_infracao` where `idtb_infracao` = :id");
        $this->db->bind(':id', $id);
        return $this->db->resultado();
    }

    public function checarInfracao($id)
    {
        $this->db->query("SELECT * FROM `tb_infracao` WHERE `idtb_infracao` =:id");
        $this->db->bind(':id', $id);
        return ($this->db->resultado()) ? true : false;
    }

    public function getModel(){
        return $this->carroModel;
    }
}
