<?php

include '../../config.php';
session_start();
if(isset($_SESSION['email'])) {
    session_destroy();
    header("Location: ".$URL."/login.php");
}