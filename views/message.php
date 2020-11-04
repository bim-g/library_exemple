<?php
    ob_start();
    $title = "message";    
    $token = Token::generate();
    $username = Session::get("username");
    $userid = Session::get("id");
    $messages=[];
    if(isset($result)){
        $messages=$result;
    }
?>
<div class="w3-margin w3-row">
    <div class="w3-col m4 l3 s6 w3-border w3-round-large w3-margin-right">
        <h4 class="w3-padding w3-blue">Message</h4>
        <form action="<?= WEB_ROOT . 'messages/postmessage' ?>" method="post">
            <div class="w3-padding">
                <input type="hidden" name="token" value="<?= $token ?>">
                <input type="hidden" name="username" value="<?= $username ?>">
                <input type="hidden" name="userid" value="<?= $userid ?>">
                <h3>Message</h3>
                <input type="text" name="message" class="w3-input w3-border w3-round-large" placeholder="fullname"><br>
                <div class="w3-padding">
                    <input type="reset" class="w3-btn w3-red" value="Annuler">
                    <input type="submit" class="w3-btn w3-blue" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
    <div class="w3-col m7 l7 s8 w3-border w3-round-large">
        <h4 class="w3-padding w3-blue">Fil d'actualite</h4>
        <div class="w3-padding" id="actualite">
        <?php foreach($messages as $msg){   ?>
            <div class="w3-padding w3-light-gray">
                <i><span class="w3-small w3-text-gray"><?= $msg["username"]?></span></i><br>
                <span class="w3-text-gray"><?= $msg["message"]?></span>
            </div><br>
        <?php } ?>
        </div><br>
    </div>
</div>
<?php

$pageContent = ob_get_clean();
include('./views/template.php');
