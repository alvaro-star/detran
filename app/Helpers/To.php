<?php 
    class To extends Controller{
        public static function array($obj){
            foreach ($obj as $key => $value) {
                $dados["$key"] = $value;
            }
            return $dados;
        }
    }
?>