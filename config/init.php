<?php
    session_start();
    
    require_once 'global.php';
    //
    $GLOBALS['config']=array(
        'mysql'=>array(
            'host'=> HOST,
            'username'=> USER,
            'password'=> PASSWORD,
            'db'=> DATABASE
        ),
        'remender'=>array(),
        'session'=>array(
            "token_name"=>"token"
        )
    );
    /**
     * @ $fileName : this is the name of the file to be checked
     * 
     * this method help to check the file extension
     */
    function check_file_extention($fileName){    
        $file_parts = pathinfo($fileName);
        // check if the extension key existe and if it a php file
        $file = (isset($file_parts['extension']) && $file_parts['extension'] == "php") ? $fileName : $fileName . ".php";
        return $file;
    }
    /**
     * @dirName : this is the name of the directorie to check on
     * 
     * this method help to get sub-directori of a selected directorie 
     */
    function get_Sub_Directories($dirName)    {
        $sub_Dir = array();
        $directories = array_filter(glob($dirName), 'is_dir');
        $sub_Dir = array_merge($sub_Dir, $directories);
        foreach ($directories as $directory) $sub_Dir = array_merge($sub_Dir, get_Sub_Directories($directory . '/*'));
        return $sub_Dir;
    }
require_once 'controller/sanitize.php';