<?php
    $db->query("CREATE TABLE IF NOT EXISTS `tb_carro`(`idtb_carro` INT UNSIGNED NULL AUTO_INCREMENT, 
                                                        `placa` VARCHAR(50) NOT NULL, PRIMARY KEY (`idtb_carro`), 
                                                        UNIQUE INDEX `idtb_carro_UNIQUE` (`idtb_carro` ASC)) 
                                                        ENGINE = InnoDB");
    $db->executar();

    $db->query("CREATE TABLE IF NOT EXISTS `tb_tipoInfracao`(`idtb_tipoInfracao` INT UNSIGNED NULL AUTO_INCREMENT, 
                                                            `descricao` VARCHAR(200) NOT NULL, 
                                                            `pontos` INT NOT NULL, 
                                                            `valor` DOUBLE NOT NULL, 
                                                            PRIMARY KEY (`idtb_tipoInfracao`), 
                                                            UNIQUE INDEX `idtb_tipoInfracao_UNIQUE` (`idtb_tipoInfracao` ASC)) 
                                                            ENGINE = InnoDB");
    $db->executar();
    //Criar a tabela Multa
    $db->query("CREATE TABLE IF NOT EXISTS `tb_multa`(`idtb_multa` INT UNSIGNED NULL AUTO_INCREMENT, 
                                                        `ano` INT NOT NULL, 
                                                        `cidade` VARCHAR(50) NOT NULL, 
                                                        `tb_carro_idtb_carro` INT UNSIGNED NOT NULL, 
                                                        `tb_tipoInfracao_idtb_tipoInfracao` INT UNSIGNED NOT NULL, 
                                                        PRIMARY KEY (`idtb_multa`), INDEX `fk_tb_multa_tb_carro_idx` (`tb_carro_idtb_carro` ASC), 
                                                        INDEX `fk_tb_multa_tb_tipoInfracao1_idx` (`tb_tipoInfracao_idtb_tipoInfracao` ASC)) 
                                                        ENGINE = InnoDB;");
    $db->executar();

    $db->query("CREATE TABLE IF NOT EXISTS `tb_usuario` ( `idtb_usuario` INT UNSIGNED NULL AUTO_INCREMENT,
                                                        `nome` VARCHAR(200) NOT NULL,
                                                        `email` VARCHAR(70) NOT NULL,
                                                        `senha` VARCHAR(100) NOT NULL,
                                                        PRIMARY KEY (`idtb_usuario`))
                                                    ENGINE = InnoDB");
    $db->executar();



    //insere dados

    $db->query("INSERT INTO `tb_tipoInfracao` (`idtb_tipoInfracao`, `descricao`, `pontos`, `valor`) VALUES (NULL, 'Escolha um..', '0', '0')");
    $db->executar();
    
    $db->query("INSERT INTO tb_carro (`idtb_carro`, `placa`) VALUES (NULL, 'Escolha um...')");
    $db->executar();
    $i=1;
    foreach ($descricoes as $descricao):
        $db->query("INSERT INTO `tb_tipoInfracao` (`idtb_tipoInfracao`, `descricao`, `pontos`, `valor`) VALUES (NULL, '$descricao', '".(80*$i)."', '".(50*$i)."')");
        $db->executar();
        $i++;
    endforeach;


    $db->query("INSERT INTO tb_carro (`idtb_carro`, `placa`) VALUES (NULL, 'Escolha um...')");
    $db->executar();

    for ($i=1; $i < 10; $i++):
        $placa = $i.''.($i*3).''.($i*2).' FBI';
        $db->query("INSERT INTO tb_carro (`idtb_carro`, `placa`) VALUES (NULL, '$placa')");
        $db->executar();
    endfor;
    
?>