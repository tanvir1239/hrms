<?php
include("header.php");
include("db.php");
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);

session_destroy();
header('location:index.php');
?>