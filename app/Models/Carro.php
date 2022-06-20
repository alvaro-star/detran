<?php
class Carro
{

    private $db;
    private $id_usuario;
    private $id;
    private $nome;
    private $placa;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function newCarro($placa, $nome, $id = null)
    {
        $this->placa = $placa;
        $this->nome = $nome;
        $this->id = $id;
    }

    public function insertBD()
    {
        $this->db->query("INSERT INTO tb_carro (`usuario_id`, `nome`, `placa`) VALUES (:usuario_id, :nome, :placa)");
        $this->db->bind(':usuario_id', $_SESSION['usuario_id']);
        $this->db->bind(':nome', $this->nome);
        $this->db->bind(':placa', $this->placa);
        $this->db->executar();
    }

    public function updateBD()
    {
        $this->db->query("UPDATE `tb_carro` SET `nome` = :nome, `placa` = :placa WHERE `tb_carro`.`idtb_carro` = :id");
        $this->db->bind(':nome', $this->nome);
        $this->db->bind(':placa', $this->placa);
        $this->db->bind(':id', $this->id);
        $this->db->executar();
    }

    public function removeBD()
    {
        $this->db->query("DELETE FROM `tb_carro` WHERE `tb_carro`.`idtb_carro` " . '=' . " :id");
        $this->db->bind(':id', $this->id);
        $this->db->executar();
    }
}
