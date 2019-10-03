<?php
ob_start();
session_start();

include_once('connect.php');

function checkSession(){


    if(!isset($_SESSION['c_user_name']) && !isset($_SESSION['c_user_id']) ){
        $user = null;
    }else if(!isset($_SESSION['c_user_name']) && !isset($_SESSION['com_user_id']) ){
        $user = null;
    }else{
        $user =  $_SESSION['c_user_name'];
    }

}

function getdata()
{
    global $conn;

    if (!isset($_SESSION['c_user_name']) && !isset($_SESSION['c_user_id'])) {
        return null;
    } else {
        $id = $_SESSION['c_user_id'];
        //user helper to get full user details into array
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $user_data = mysqli_fetch_array($parser);
        return $user_data;

    }
}

function getComData()
{
    global $conn;

    if (!isset($_SESSION['c_user_name']) && !isset($_SESSION['com_user_id'])) {
        return null;
    } else {
        $id = $_SESSION['com_user_id'];
        //user helper to get full user details into array
        $sql = "SELECT * FROM company WHERE id = '$id'";
        $parser = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $user_data = mysqli_fetch_array($parser);
        return $user_data;

    }
}

checkSession();


if(isset($_SESSION['c_user_id'])){
    $user_data = getdata();
}elseif(isset($_SESSION['com_user_id'])){
    $user_data = getComData();
}else{
    $user_data = array();
    $user_data['acc_type'] = '0';
}

function starCounter($id){
    return $id;
}


