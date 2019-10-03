<?php
//session_start();

//include_once('connect.php');

function auth(){
    if(!isset($_SESSION['c_user_id'])){
        header('location: index.php');
    }

}

auth();