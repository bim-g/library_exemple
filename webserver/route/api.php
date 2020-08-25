<?php
    $route->post("/api/users/register","usersCtrl#apiregister");
    $route->post("/api/users/connexion","usersCtrl#apiconnection");
    $route->post("/api/messages/list","messageCtrl#apiMessageAll");