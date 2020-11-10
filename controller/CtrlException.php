<?php

use Wepesi\App\Core\Session;

class CtrlException{
        function exception($msg=null){
            $tiltle="session expired";
            Session::put("error", 1);
            if($msg){
                $title=$msg;
            }
            Session::put("errorMessage", $title);
        }
    }