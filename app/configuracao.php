<?php
//echo dirname(dirname(__FILE__));//aula 11
    define('APP', dirname(__FILE__)); //Aula 11
    define('PUBLICO', dirname(dirname(__FILE__)) . "\public");
    define('URL', 'http://localhost/detran');
    define('APP_NAME', 'PHP7 OO + MVC');
    const APP_VERSAO = '7.0.0';

    const TBCARRO = 'tb_carro';
    const TBINFRACAO = 'tb_tipoInfracao';
    const TBMULTA = 'tb_multa';
    const TBUSUARIO = 'tb_usuario';
?>