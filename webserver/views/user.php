<?php
ob_start();
$title = "users";
$users = [];
if (count($result)) {
    $users = $result;
}

?>
<div class="w3-margin">
    <h3 class="w3-blue w3-padding">Users Registered</h3>
    <table class="w3-table-all w3-hoverable w3-border-0 w3-border w3-round-large">
        <tr>
            <th>Number</th>
            <th>name</th>
            <th>username</th>
        </tr>
        <?php
        $x = 1;
        foreach ($users as $user) { ?>
            <tr>
                <td><?= $x ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
            </tr>
        <?php $x++;
        } ?>
    </table>
</div>
<?php
$pageContent = ob_get_clean();
include("./views/template.php");
?>