<?php

include '../../config.php';
session_start();
if(isset($_SESSION['emailu'])) {
    session_destroy();
    header("Location: ".$URL."/login.php");
}