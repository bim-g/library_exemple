<?php
    ob_start();
    $title = "profil";
    $name=$username=null;
    if(Session::exists('name') && Session::exists('username')){
        $name=Session::get('name');
        $username=Session::get('username');
    }
?>

<div class=" w3-border w3-margin " id="login" style="width: 300px;">
    <h4 class="w3-padding w3-blue">Profil</h4>
    <div class="w3-padding">
        Full Name<br>
        <input type="text" value="<?= $name?>" class="w3-input w3-border w3-round-large" placeholder="fullname" disabled><br>
        UserName<br>
        <input type="text" value="<?= $username?>" class="w3-input w3-border w3-round-large" placeholder="username" disabled><br>
    </div>
</div>

<?php
    $pageContent=ob_get_clean();
    include('./views/template.php');
?>