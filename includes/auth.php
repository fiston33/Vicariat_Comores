<?php

session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: ../login.php");
    exit();
}

if(
    $_SESSION['role'] != 'admin' &&
    $_SESSION['role'] != 'editor'
)
{
    header("Location: ../index.php");
    exit();
}