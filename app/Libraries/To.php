<?php 
    class To extends Controller{
        public static function array($obj){
            foreach ($obj as $key => $value) {
                $dados["$key"] = $value;
            }
            return $dados;
        }
        /*
        public static function obj($array){
            foreach ($array as $key => $value) {
                $dados->$key = $value;
            }

            //call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

            //call
            return $dados;
        }*/
    }
?>