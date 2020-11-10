<?php

use Wepesi\App\Core\Token;

ob_start();
$title = "home";
$token = Token::generate();
?>
<div class=" w3-border w3-margin " id="login" style="width: 300px;">
    <h4 class="w3-padding w3-blue">Login</h4>
    <form action="<?= WEB_ROOT . 'users/login' ?>" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        <div class="w3-padding">
            username<br>
            <input type="text" name="username" class="w3-input" placeholder="username"><br>
            password<br>
            <input type="text" name="password" class="w3-input" placeholder="password"><br>
        </div>
        <div class="w3-padding w3-center w3-light-gray">
            <input type="reset" value="Annuler" class="w3-button w3-red">
            <input type="submit" value="Login" class="w3-button w3-blue">
        </div>
    </form>
</div>
<div class=" w3-border w3-margin" id="register" style="width: 300px;display:none;">
    <h4 class="w3-padding w3-green">Register</h4>
    <form action="<?= WEB_ROOT . 'users/register' ?>" method="post">
        <input type="hidden" name="token" value="<?= $token ?>">
        <div class="w3-padding">
            name<br>
            <input type="text" name="name" class="w3-input" placeholder="name"><br>
            username<br>
            <input type="text" name="username" class="w3-input" placeholder="username"><br>
            password<br>
            <input type="text" name="password" class="w3-input" placeholder="password"><br>
        </div>
        <div class="w3-padding w3-center w3-light-gray">
            <input type="reset" value="Annuler" class="w3-button w3-red" onclick="w3.show('#login','#register')">
            <input type="submit" value="Register" class="w3-button w3-blue">
        </div>
    </form>
</div>
<?php
$pageContent = ob_get_clean();
include("./views/template.php");
?>