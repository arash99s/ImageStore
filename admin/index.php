<?php
session_start();
$newURL = 'login.php';
if(isset($_SESSION["username"])){
    $newURL = 'panel.php';
}

header('Location: '.$newURL);
exit();

?>