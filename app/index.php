<?php
if(!isset($_SESSION['id'])){
    include './views/auth/login.php';
} else {
    include './views/home/home.php';
}