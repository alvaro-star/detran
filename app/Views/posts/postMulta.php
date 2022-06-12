<div class='div-principal'>
    <div id='divSecundario'>
        <?php
        
        $db = new Database;

        $ano = $_POST['ano'];
        $cidade = $_POST['cidade'];
        $carro = $_POST['carro'];
        $infracao = $_POST['tipoInfracao'];

        //Prenchendo o Objeto Carro
        $db->query("SELECT * from `tb_carro` where `idtb_carro` = $carro;");
        $carroBD = $db->resultado();

        $carroMulta = new Carro($carroBD->idtb_carro, $carroBD->placa);

        //prenchendo o Objeto TipoInfracao
        $db->query("SELECT * from `tb_tipoInfracao` where `idtb_tipoInfracao` = $infracao;");
        $infracaoBD = $db->resultado();

        $infracaoMulta = new TipoInfracao($infracaoBD->idtb_tipoInfracao, $infracaoBD->descricao, $infracaoBD->pontos, $infracaoBD->valor);

        //Levando as informacoes no banco de dados para trzer o Id mais recente

        $db->query("INSERT INTO `tb_multa` (`idtb_multa`, `ano`, `cidade`, `tb_carro_idtb_carro`, `tb_tipoInfracao_idtb_tipoInfracao`) VALUES (NULL, :ano, :cidade, " . $carroMulta->getId() . ", " . $infracaoMulta->getId() . ");");

        $db->bind(":ano", $ano);
        $db->bind(":cidade", $cidade);

        $db->executar();
        $id = $db->lastId();

        //prenchendo o Objeto Multa
        $multa = new Multa($id, $ano, $cidade, $carroMulta, $infracaoMulta);
        $multa->imprimeDados();


        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewCarro.php'>Cadastrar Carro</a>";
        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewTipoInfracao.php'>Cadastrar Infracao</a>";
        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewTabelaMulta.php'>Tabela de Multa</a>";
        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewMulta.php'>Voltar a Cadastrar</a>";


        ?>
    </div>
</div>