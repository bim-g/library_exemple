<?php

namespace Wepesi\App\Core;
    class Input{
        static function exists($type="post"){
            switch($type){
                case "post":
                    return (!empty($_POST))?true:false;
                break;
                default: 
                    return false;
                break;
            }
        }
        static function get($item){
            $object_data=[];
            if(json_decode(file_get_contents("php://input"), true)){
                $object_data=(array)(json_decode(file_get_contents("php://input"), true));
            }
            if(isset($_POST[$item])){
                return $_POST[$item];
            }else if(isset($_GET[$item])){
                return $_GET[$item];
            }else if(isset($object_data[$item])){
                return $object_data[$item];
            }
            return "";
        }
    }
?>