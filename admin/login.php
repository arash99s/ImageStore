<?php

if (isset($_POST["ID"]) and isset($_POST["password"]))
{
  $user = $_POST["ID"];
  $pass = $_POST["password"];
  echo $user . " is your username";
  echo "<br>";
  echo $pass . " is your password";
} 
else 
{
  $user = null;
  echo "no username supplied";
}

// setcookie(session_name() , session_id() , time()+3600)






?>