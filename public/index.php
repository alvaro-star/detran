<?php
session_start();
include('../app/configuracao.php'); //constantes
include(APP . '/autoload.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/detran.png" />
    <title><?= APP_NAME ?></title>
    <?php include(PUBLICO . '/css/bootstrapCss.php'); ?>
    <link href="../public/css/container.css" rel="stylesheet">

</head>

<body>
    <?php
    //Nas configuracoes, a barra es invertida, Antes: APP.\autoload... Ahora:APP./autoload...

    $db = new Database();
    include(APP . '/Views/cabecalho.php');
    $rotas = new Rota();
    var_dump($rotas);
    include(APP . '/Views/rodape.php');
    ?>

    <?php include(PUBLICO . '/js/bootstrapJs.php'); ?>
    <script src="<?= APP ?>/public/js/main.js" crossorigin="anonymous"></script>

</body>

</html>