<?php

    namespace Wepesi\App\Core;
    class Controller{        
        private static function useModel($fileName){
            $directories = get_Sub_Directories("corp");
            foreach($directories as $dir){
                $file=ROOT.$dir."/".check_file_extention($fileName);
                if (is_file($file )) {
                    require_once($file);
                }
            }
        }
        static function useController($fileName){
            $directories=get_Sub_Directories("controller");
            foreach($directories as $dir){
                $file=$dir."/".check_file_extention($fileName);
                if (is_file($file)) {
                    require_once($file);
                }
            }
        }       
    }
?>