<?php
session_start();

include_once('connect.php');

function checkSession(){
    if(!isset($_SESSION['admin'])){
        //show login with this variable
        $active = false;
        header('location: cpages/login.php');
    }else{
        $active = true;

        $helper = Helper::class;
        $userName = $helper->activeUser();
    }

}

checkSession();