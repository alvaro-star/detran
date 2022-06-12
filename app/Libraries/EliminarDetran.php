<?php

    $db->query("DROP TABLE `tb_tipoinfracao`");
    $db->executar();
    $db->query("DROP TABLE `tb_carro`");
    $db->executar();
    $db->query("DROP TABLE `tb_multa`");
    $db->executar();
    $db->query("DROP TABLE `tb_usuario`");
    $db->executar();
    
?>