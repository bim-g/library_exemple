<?php

use Wepesi\App\Core\{Controller,View};

Controller::useController("CtrlException");
    class viewCtrl extends CtrlException{
        function view($pages,$data=[]){
            $view= new View($pages);
            if($data) $view->assign("result",$data);
        }
    }