<?php 
    session_start();
    include ('../app/configuracao.php');//constantes
    include (APP.'\autoload.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NAME?></title>
    <?php include(PUBLICO.'\css\bootstrapCss.php'); ?>
    <link href="../public/css/container.css" rel="stylesheet">

</head>
<body>
    <?php
        $db = new Database();

        include(APP.'\Views\cabecalho.php');
        $rotas = new Rota();
        include(APP.'\Views\rodape.php');

    ?>

    <?php include(PUBLICO.'\js\bootstrapJS.php'); ?>
    <script src="<?=URL?>/public/js/main.js" crossorigin="anonymous"></script>

</body>
</html>