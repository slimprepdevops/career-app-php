<?php
session_start();

include_once('../config/connect.php');


if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));

    if(!empty($username) && !empty($password)){
        $sql = "SELECT id FROM users WHERE email = '$email' AND hashed_pass = '$password'";

        // $result = mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $row = mysqli_num_rows($result);


        if($row < 1){
            $cookie_name = 'useraccount';
            $cookie_value = 'block';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");
            header('location: ../index.php');
        }else{

            $sql = "SELECT * FROM users WHERE email = '$email'";
            $parser = mysqli_query($conn, $sql) or die(mysqli_error());

            $x = mysqli_fetch_array($parser);


            $_SESSION['c_user_name'] =  $x['fname'];
            $_SESSION['c_user_id'] =  $x['id'];

            if(isset($_SESSION['username'])) {
                header('location: ../index.php');
            }

            header('location: ../index.php');

        }



    } else {
        echo 'Please enter login credentials!';
    }

}

if(isset($_POST['clogin'])){
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));

    if(!empty($username) && !empty($password)){
        $sql = "SELECT id FROM company WHERE email = '$email' AND hashed_pass = '$password'";

        // $result = mysqli_query($conn, $sql);
        $result = mysqli_query($conn, $sql) or die(mysqli_error());

        $row = mysqli_num_rows($result);


        if($row < 1){
            $cookie_name = 'useraccount';
            $cookie_value = 'block';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");
            header('location: ../index.php');

        }else{

            $sql = "SELECT * FROM company WHERE email = '$email'";
            $parser = mysqli_query($conn, $sql) or die(mysqli_error());

            $x = mysqli_fetch_array($parser);

            $_SESSION['c_user_name'] =  $x['cname'];
            $_SESSION['com_user_id'] =  $x['id'];

            if(isset($_SESSION['username'])) {
                header('location: ../index.php');
            }

            header('location: ../index.php');

        }

    } else {
        echo 'Please enter login credentials!';
    }

}



