<?php
//session_start();

//include_once('connect.php');

function authenticate(){
    if(!isset($_SESSION['c_user_id']) && !isset($_SESSION['com_user_id'])){
//        header('location: index.php');

        $cookie_name = 'error';
        $cookie_value = 'You need to be logged in to perform this operation!';
        setcookie($cookie_name, $cookie_value, time() + (2), "/");
        header('location: index.php');
    }

}

authenticate();

