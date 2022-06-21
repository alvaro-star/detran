<?php
class Multa
{

    private $db;
    private $id;
    private $ano;
    private $cidade;
    private $carro;
    private $infracao;

    public function __construct()
    {
        $this->db = new Database();
        $this->carro = new Carro();
        $this->infracao = new Infracao();
    }

    public function newMulta($ano, $cidade, $carro, $infracao, $id = null)
    {
        $this->id = $id;
        $this->ano = $ano;
        $this->cidade = $cidade;
        $this->carro->newCarro($carro->nome, $carro->placa, $carro->idtb_carro);
        $this->infracao->newInfracao($infracao->descricao, $infracao->pontos, $infracao->valor, $infracao->idtb_infracao);
    }

    public function insertBD()
    {
        $this->db->query("INSERT INTO `tb_multa`(`ano`, `cidade`, `tb_carro_idtb_carro`, `tb_infracao_idtb_infracao`) VALUES (:ano, :cidade, :idtb_carro, :idtb_infracao)");
        $this->db->bind(":ano", $this->ano);
        $this->db->bind(":cidade", $this->cidade);
        $this->db->bind(":idtb_carro", $this->carro->getId());
        $this->db->bind(":idtb_infracao", $this->infracao->getId());
        $this->db->executar();
    }

    public function updateBD()
    {
        $this->db->query("UPDATE `tb_multa` SET `ano` = :ano,`cidade` = :cidade,`tb_carro_idtb_carro` = :idtb_carro,`tb_infracao_idtb_infracao`= :idtb_infracao WHERE `idtb_multa`= :idtb_multa");
        $this->db->bind(":ano", $this->ano);
        $this->db->bind(":cidade", $this->cidade);
        $this->db->bind(":idtb_carro", $this->carro->getId());
        $this->db->bind(":idtb_infracao", $this->infracao->getId());
        $this->db->bind('idtb_multa', $this->id);
        $this->db->executar();
    }

    public function removeBD()
    {
        $this->db->query("DELETE FROM `tb_multa` WHERE `tb_multa`.`idtb_multa` " . '=' . " :id");
        $this->db->bind(':id', $this->id);
        $this->db->executar();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getCarro()
    {
        return $this->carro;
    }

    public function getInfracao()
    {
        return $this->infracao;
    }
}
