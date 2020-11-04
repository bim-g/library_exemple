<?php
    $route->get("/messages","messagesCtrl#getMessages");
    $route->post("/messages/postmessage","messagesCtrl#postMessages");