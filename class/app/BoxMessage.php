<?php

namespace Wepesi\App\Core;

class BoxMessage
{
    static function errors($type, $result)
    {
        $lang=(object)LANG_BOX_MESSAGE;
        $message = [];
        $err_msg = null;
        if (is_array($result)) {
            foreach ($result as $value) {
                $err_msg .= "<p>" . $value . "</p>";
            }
        } elseif ($result) {
            $err_msg .= "<p class=\" w3-text-red \">" . $result . "</p>";
        }
        
        switch($type){
                case 1: $message=[ 'type'=>'Error Input',
                                        'errorText'=>$err_msg];
                break;
                case 2: $message=[ 'type'=>'No Information',
                                        'errorText'=>$lang->no_information];
                break;
                case 3: $message=[ 'type'=>'Error Operation Save',
                                        'errorText'=> $err_msg? $err_msg:$lang->error_operation_save];
                break;
                case 4: $message=[ 'type'=>'Error Operation Update',
                                        'errorText'=>$err_msg? $err_msg:$lang->error_operation_update];
                break;
                case 5: $message=[ 'type'=>'Error Operation delete',
                                        'errorText'=>$err_msg? $err_msg:$lang->error_operation_delete];
                break;
                case 6: $message=[ 'type'=>'No Data ',
                                        'errorText'=>$err_msg? $err_msg:$lang->no_data];
                break;
                case 123: $message=[ 'type'=>'Page Error',
                                        'errorText'=>$err_msg? $err_msg:$lang->page_error];
                break;
                case 10: $message=[ 'type'=>'error param',
                                        'errorText'=>$err_msg? $err_msg:$lang->error_param];
                break;
                case 11: $message=[ 'type'=>'error data',
                                        'errorText'=>$err_msg? $err_msg:$lang->error_data];
                break;
            }        
            return $message;
        }

        static function success($val){
            $message=array();
        $lang = (object)LANG_BOX_MESSAGE;
            switch($val){
                case 1: $message=['type'=>'success Save','text'=>$lang->success_save];
                break; 
                case 2: $message=['type'=>'success Update','text'=>$lang->success_update];
                break; 
                case 3: $message=['type'=>'success Delete','text'=>$lang->success_delete];
                break; 
                case 4: $message=['type'=>'found','text'=>$lang->found];
                break; 
                case 5: $message=['type'=>'Success','text'=>$lang->success_operation];
                break; 
            }
            return $message;        
        }
    static function warning($val)
    {
        $message = array();
        switch ($val) {
            case 1:
                $message = array('type' => 'Record', 'warning' => 'There is no record found');
                break;
            case 2:
                $message = array('type' => 'Data', 'warning' => 'No data found');
                break;
            case 3:
                $message = array('type' => 'Param', 'warning' => 'information is not correct');
                break;
            case 4:
                $message = array('type' => 'found', 'warning' => '');
                break;
        }
        return $message;
    }
}
