<?php
    class Validar{
        public static function Nome($nome){
            $re = '/^((\b[A-zÀ-ú\']{2,40}\b)\s*){2,}$/';
            return (!preg_match($re, $nome)) ? true : false ;
        }

        public static function Email($email){
            $re = '/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/i';
            return (!preg_match($re, $email)) ? true : false;
        }

        public static function Senha($senha){
            $re = '/^(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{6,}$/';
            return (!preg_match($re, $senha)) ? true : false;
        }
    }
?>