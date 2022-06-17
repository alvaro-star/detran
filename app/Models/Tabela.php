<?php
class Tabela extends Database
{

    //Criacao de Tabelas

    public function criarTabelaUsuario()
    {
        $this->query("CREATE TABLE IF NOT EXISTS `tb_usuario` ( `idtb_usuario` INT UNSIGNED NULL AUTO_INCREMENT,
                                                                    `nome` VARCHAR(200) NOT NULL,
                                                                    `email` VARCHAR(70) NOT NULL,
                                                                    `senha` VARCHAR(100) NOT NULL,
                                                                    PRIMARY KEY (`idtb_usuario`))
                                                                    ENGINE = InnoDB");
        $this->executar();
    }

    public function criarTabelaCarro($quantidade)
    {
        $this->query("CREATE TABLE IF NOT EXISTS `tb_carro`(`idtb_carro` INT UNSIGNED NULL AUTO_INCREMENT, 
                                                        `placa` VARCHAR(50) NOT NULL, PRIMARY KEY (`idtb_carro`), 
                                                        UNIQUE INDEX `idtb_carro_UNIQUE` (`idtb_carro` ASC)) 
                                                        ENGINE = InnoDB");
        $this->executar();

        //Inserindo Valores

        $placas = ['FBI', 'ABCD', 'FCC'];
        for ($i = 1; $i <= $quantidade; $i++) :
            $placa = $i . '' . ($i * 3) . '' . ($i * 2) . $placas[$i % count($placas)];
            $this->query("INSERT INTO tb_carro (`placa`) VALUES ('$placa')");
            $this->executar();
        endfor;
    }

    public function criarTabelaInfracao()
    {
        $this->query("CREATE TABLE IF NOT EXISTS `tb_infracao`(`idtb_infracao` INT UNSIGNED NULL AUTO_INCREMENT, 
                                                            `descricao` VARCHAR(200) NOT NULL, 
                                                            `pontos` INT NOT NULL, 
                                                            `valor` DOUBLE NOT NULL, 
                                                            PRIMARY KEY (`idtb_infracao`), 
                                                            UNIQUE INDEX `idtb_infracao_UNIQUE` (`idtb_infracao` ASC)) 
                                                            ENGINE = InnoDB");
        $this->executar();
        //Inserindo Valores

        $descricoes = ['Assasinar a um bebe', 'Feiminicidio', 'Atropelamento', 'assasinato'];
        $i = 1;
        foreach ($descricoes as $descricao) {
            $pontos = $i * 80;
            $valor = $i * 50;
            $this->query("INSERT INTO `tb_infracao` (`idtb_infracao`, `descricao`, `pontos`, `valor`) VALUES (NULL, '$descricao', $pontos, $valor)");
            $this->executar();
            $i++;
        }
    }

    public function criarTabelaMulta()
    {
        $this->query("CREATE TABLE IF NOT EXISTS `tb_multa`(`idtb_multa` INT UNSIGNED NULL AUTO_INCREMENT, 
                                                        `ano` INT NOT NULL, 
                                                        `cidade` VARCHAR(50) NOT NULL, 
                                                        `tb_carro_idtb_carro` INT UNSIGNED NOT NULL, 
                                                        `tb_infracao_idtb_infracao` INT UNSIGNED NOT NULL, 
                                                        PRIMARY KEY (`idtb_multa`), INDEX `fk_tb_multa_tb_carro_idx` (`tb_carro_idtb_carro` ASC), 
                                                        INDEX `fk_tb_multa_tb_infracao1_idx` (`tb_infracao_idtb_infracao` ASC)) 
                                                        ENGINE = InnoDB;");
        $this->executar();
    }

    public function eliminarTabelaUsuario()
    {
        $this->query("DROP TABLE `tb_usuario`");
        $this->executar();
    }

    public function eliminarTabelaCarro()
    {
        $this->query("DROP TABLE `tb_carro`");
        $this->executar();
    }

    public function eliminarTabelaInfracao()
    {
        $this->query("DROP TABLE `tb_infracao`");
        $this->executar();
    }
    public function eliminarTabelaMulta()
    {
        $this->query("DROP TABLE `tb_multa`");
        $this->executar();
    }
}
