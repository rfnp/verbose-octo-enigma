<?php

session_start();
session_unset();

if( !isset($_SESSION["username"]) )
{
    header("Location: ../login.php");
}

?>