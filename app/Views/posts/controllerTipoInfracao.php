<!DOCTYPE html>
    <html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dados Solicitados</title>
        <link href="../../public/css/stiloRepositorio.css" rel="stylesheet">
        <?php include('../../public/css/bootstrapCSS.php');?>
    </head>
    <body>
        <div id = 'divRepositorio' class = 'div-principal'>
            <div id = 'divSecundario'>
                <?php
                    
                    include('../../app/autoload.php');
                    $db = new Database;
                    
                    $descricao = $_POST['descricao'];
                    $pontos = $_POST['pontos'];
                    $valor = $_POST['valor'];
                    
                    //Prenchendo a tabela Tipo infracao para logo pegar o Id mais recente para o objeto
                    $db->query("INSERT INTO `tb_tipoInfracao` (`idtb_tipoInfracao`, `descricao`, `pontos`, `valor`) VALUES (NULL, :descricao, :pontos, :valor)");
                    $db->bind(":descricao", $descricao);
                    $db->bind(":pontos", $pontos);
                    $db->bind(":valor", $valor);
                    $db->executar();
                    
                    $id = $db->lastId();
                    
                    $infracao = new TipoInfracao($id, $descricao, $pontos, $valor);
                    $infracao->imprimeDados();
                    
                    
                    echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewCarro.php'>Cadastrar Carro</a>";
                    echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewMulta.php'>Cadastrar Multa</a>";
                    echo "<a class = 'btn btn-primary' href = '../../app/Views/paginas/viewTipoInfracao.php'>Voltar a Cadastrar</a>";
                    
                ?>
            </div>
        </div>
        <?php include('../../public/js/bootstrapJS.php')?>
    </body>
</html>