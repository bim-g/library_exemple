<?php

    namespace Wepesi\App\Core;
    class Controller{
        
        static function useModel($file){
            if (is_file(ROOT . 'corp/' . $file . ".php")) {
                require_once(ROOT . 'corp/' . $file . '.php');
            }
        }
        static function useController($fileName){
            $file=check_file_extention($fileName);
            if (is_file(ROOT . 'controller/' . $file )) {
                require_once(ROOT . 'controller/' . $file);
            }
        }       
    }
?>