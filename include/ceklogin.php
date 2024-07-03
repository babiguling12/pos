<?php

if(!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    header("Location: http://localhost/tugasPOS/auth/index.php");
}