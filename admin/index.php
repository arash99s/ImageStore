<?php

$newURL = 'panel.html';
if(isset($_SESSION["username"])){
    $newURL = 'login.html';
}

header('Location: '.$newURL);
exit();

?>