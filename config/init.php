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
require "./vendor/autoload.php";
require_once 'controller/sanitize.php';