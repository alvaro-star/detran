<?php
session_start();
include('../app/configuracao.php'); //constantes
include(APP . '\autoload.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/detran.png" />
    <title><?= APP_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/container.css" rel="stylesheet">

</head>

<body>
    <?php
    echo "steve";
    $db = new Database();

    include(APP . '\Views\cabecalho.php');
    $rotas = new Rota();
    include(APP . '\Views\rodape.php');
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="<?= URL ?>/public/js/main.js" crossorigin="anonymous"></script>

</body>

</html>