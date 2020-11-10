<?php

use Wepesi\App\Core\View;

$route->get('/users', "usersCtrl#getusers");
    $route->get("/users/:id/detail", "usersCtrl#userDetail");
    $route->get("users/profil",function(){
        new View("profil");
    });
    
    $route->post("/users/login", "usersCtrl#login");
    $route->post('/users/register',"usersCtrl#register");
    $route->get('/users/register',function(){
        new View('register');
    });
   