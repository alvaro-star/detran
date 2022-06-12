<div id='divRepositorio' class='div-principal'>
    <div id='divSecundario'>
        <?php
        
        $placa = $_POST['placa'];

        //Prenchendo a tabela carro para logo pegar o Id mais recente para o objeto
        $db->query("INSERT INTO tb_carro (`idtb_carro`, `placa`) VALUES (NULL, :placa)");
        $db->bind(":placa", $placa);
        $db->executar();
        $id = $db->lastId();

        $carro = new Carro($id, $placa);
        $carro->imprimeDados();

        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewMulta.php'>Cadastrar Multa</a>";
        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewTipoInfracao.php'>Cadastrar Infracao</a>";
        echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewCarro.php'>Voltar a Cadastrar</a>";

        ?>
    </div>
</div>