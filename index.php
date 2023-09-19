<?php
require_once 'login.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $segments = explode('/', $_SERVER['REQUEST_URI']);
    $page = $segments[1];


    switch ($page) {
        case 'index.php':
            $loginController = new login();
            $loginController->showLoginForm();
            break;
        case 'login.php':
            include 'login.php'; 
            break;

        default:
            header('Location: index.php');
            echo 'Trang không tồn tại';
            break;
    }
} else {
    include 'login.php'; 
}
?>