<?php
    $route=new Router();
    $route->get('/',function(){
        new view('home');
    });

    include('users.php');
    include('messages.php');
    include('api.php');
    $route->get("/users/logout","usersCtrl#logout");
    $route->run();
?>