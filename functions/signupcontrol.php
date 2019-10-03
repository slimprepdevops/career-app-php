<?php

include_once('../config/connect.php');
session_start();


function checkuseremail($useremail){
    global $conn;
    $sql= "SELECT id FROM users WHERE email = '$useremail'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_num_rows($result);
    if($row <=0){
        return 0;// user not registered
    }else{
        return 1;//already using given user email

    }
}

function checkcomemail($useremail){
    global $conn;
    $sql= "SELECT id FROM company WHERE email = '$useremail'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_num_rows($result);
    if($row <=0){
        return 0;// user not registered
    }else{
        return 1;//already using given user email

    }
}



if(isset($_POST['signup'])){
    if(
        !empty($_POST['fname']) &&
        !empty($_POST['lname']) &&
        !empty($_POST['dob']) &&
        !empty($_POST['location']) &&
        !empty($_POST['phone']) &&
        !empty($_POST['email']) &&
        !empty($_POST['password1']) &&
        !empty($_POST['password2'])
    ) {

        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $dob = trim($_POST['dob']);
        $location = trim($_POST['location']);
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $pass1 = trim($_POST['password1']);
        $pass2 = trim($_POST['password2']);
        $date = strtotime('now');

        if(checkuseremail($email) > 0){
            $cookie_name = 'emailexist';
            $cookie_value = 'This email already exist';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");
            header('location: ../signup.php');
            die();
        }else{
            if($pass1===$pass2){
                $password = md5($pass1);
                $acc_type = 1;

                //Insert data in our database
                $sql = "INSERT INTO users(acc_type, fname, lname, dob, location,address, hashed_pass, email , phone, image,  created_at) 
                VALUES 
                ('$acc_type', '$fname','$lname','$dob','$location', '$address', '$password', '$email', '$phone', '' , $date)";

                if(mysqli_query($conn, $sql)) {


                    $cookie_name = 'welcome_msg';
                    $cookie_value = 'block';
                    setcookie($cookie_name, $cookie_value, time() + (5), "/");

                    header('location: ../welcome.php');

                } else {
                    echo "Error: " . mysqli_error($conn);
                    die();
                }
            }else{
                $cookie_name = 'passmissmatch';
                $cookie_value = 'The passwords you provided do not match!';
                setcookie($cookie_name, $cookie_value, time() + (5), "/");
                header('location: ../signup.php');

            }
        }



    } else {
        $cookie_name = 'missing_field';
        $cookie_value = 'One or more required fields are missing';
        setcookie($cookie_name, $cookie_value, time() + (5), "/");

        header('location: ../signup.php');
        die();
    }
    die();
}


if(isset($_POST['com_signup'])){
    if(
        !empty($_POST['cname'])
        && !empty($_POST['cemail'])
        && !empty($_POST['clocate'])
        && !empty($_POST['cphone'])
        && !empty($_POST['cpassword1'])
        && !empty($_POST['cpassword2'])
    ) {
        echo "passed";

        $cname = trim($_POST['cname']);
        $email = trim($_POST['cemail']);
        $location = trim($_POST['clocate']);
        $address = trim($_POST['caddress']);
        $phone = trim($_POST['cphone']);
        $pass1 = trim($_POST['cpassword1']);
        $pass2 = trim($_POST['cpassword2']);
        $date = strtotime('now');


        if(checkcomemail($email) > 0){
            $cookie_name = 'emailexist';
            $cookie_value = 'This email already exist';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");
            header('location: ../signup.php');
            die();
        }else{
            if($pass1===$pass2){
                $password = md5($pass1);
                $acc_type = 2;

                //Insert data in our database
                $sql = "INSERT INTO company( acc_type, cname, email , location,address, phone,  hashed_pass, logo,  created_at)
                VALUES
                ('$acc_type', '$cname', '$email', '$location', '$address', '$phone',  '$password',  '' , $date)";

                if(mysqli_query($conn, $sql)) {

                    $cookie_name = 'welcome_msg';
                    $cookie_value = 'block';
                    setcookie($cookie_name, $cookie_value, time() + (5), "/");

                    header('location: ../welcome.php');

                } else {
                    echo "Error: " . mysqli_error($conn);
                    header('location: ../welcome.php');
                    die();
                }
            }else{
                $cookie_name = 'passmissmatch';
                $cookie_value = 'The passwords you provided do not match!';
                setcookie($cookie_name, $cookie_value, time() + (5), "/");
                header('location: ../signup.php');
            }
        }



    } else {

        $cookie_name = 'missing_field';
        $cookie_value = 'One or more required fields are missing';
        setcookie($cookie_name, $cookie_value, time() + (5), "/");

        header('location: ../signup.php');
        die();
    }
}
