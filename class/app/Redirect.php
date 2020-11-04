<?php

namespace Wepesi\Core\App;
    class Redirect{
        static function to($location=null){
            if($location){
                if(is_numeric($location)){
                    $location="error/";
                    switch($location){
                        case 404: $location.="404";
                        break;
                    }
                }else if(strpos($location, ".php")){
                    header('Location:'.$location);
                }else{
                    header('Location:' . $location);
                }
                exit();
            }
        }
    }
?>