<?php
session_start();
if(!(isset($_SESSION['did']) && !empty($_SESSION['did']))){
    header("location: ../Guest/login.php");
}
