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

        public static function NumberFloat($number){
            $re = '/^\d{0,6}+(\.\d{1,2})?$/';
            return (!preg_match($re, $number)) ? true : false;
        }

        public static function NumberInt($number, $tamanho){
            $re = '/^[0-9]{0,'.$tamanho.'}+$/';
            return (!preg_match($re, $number)) ? true : false;
        }

        public static function Placa($placa){
            $re = '/[A-Z]{3}[0-9]{4}/';
            //Modelo: AAA0000
            return (!preg_match($re, $placa)) ? true : false;
        }

        public static function Text($text){
            $re = '/^[aA-zZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÒÖÚÇÑ ]{0,200}+$/m';
            return (!preg_match($re, $text)) ? true : false;
        }
    }
?>