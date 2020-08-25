<?php
$loged=true;
if (!Session::exists("loged") && !Session::exists("username")) {
    $loged=false;
    // Redirect::to(WEB_ROOT);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // indert css librarie and files using bundles class methodes
    Bundles::insertCSS('w3');
    Bundles::insertCSS('index');
    ?>
    <title><?= $title ?></title>
</head>

<body>
    <!-- //header pages -->
    <?php if ($loged) { ?>
        <div class="w3-bar w3-gray">
            <div class="w3-right">
                <a href="<?= WEB_ROOT . 'users/profil' ?>" class="w3-bar-item w3-btn w3-border w3-margin w3-round w3-red w3-right">Pofil</a>
                <a href="<?= WEB_ROOT . 'users/logout' ?>" class="w3-bar-item w3-btn w3-border w3-margin w3-round w3-red w3-right" onclick="logout()">logout</a>

            </div>

            <a href="<?= WEB_ROOT . 'users' ?>" class="w3-bar-item w3-btn w3-border w3-margin w3-round w3-blue">user</a>
            <a href="<?= WEB_ROOT . 'messages' ?>" class="w3-bar-item w3-btn w3-border w3-margin w3-round w3-green" >messages</a>
        </div>
    <?php } else { ?>
        <div class="w3-bar w3-black">
            <div class="w3-bar-item w3-btn w3-border w3-margin w3-round w3-blue" onclick="w3.show('#login','#register')">Login</div>
            <div class="w3-bar-item w3-btn w3-border w3-margin w3-round w3-green" onclick="w3.show('#register','#login')">Register</div>
        </div>
    <?php }
    echo $pageContent;

    //insert js using php class methode
    Bundles::insertJS('w3');
    Bundles::insertJS('index');

    //include alert messages
    if (Session::exists('error')) {
        include "./alert/danger.php";
    }
    if (Session::exists('question')) {
        include "./alert/question.php";
    }
    if (Session::exists('success')) {
        include "./alert/success.php";
    }
    ?>
    <script>
        w3.show("#succesModal");
        w3.show("#errorModal");
    </script>
</body>

</html>