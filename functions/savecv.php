<?php

include_once('../config/connect.php');
include_once('../config/director.php');

//session_start();



if(isset($_POST['dcv'])){

    if(
        !empty($_POST['exp']) &&
        !empty($_POST['edu']) &&
        !empty($_POST['fun_areas']) &&
        !empty($_POST['hobbies']) &&
        !empty($_POST['lang']) &&
        !empty($_POST['core_area']) &&
        !empty($_POST['referee'])
    ) {

        $exp = trim($_POST['exp']);
        $edu = trim($_POST['edu']);
        $fun_areas = trim($_POST['fun_areas']);
        $hobbies = trim($_POST['hobbies']);
        $lang = trim($_POST['lang']);
        $core_area = trim($_POST['core_area']);
        $referee = trim($_POST['referee']);
        $user_id = $user_data['id'];


        //Insert data in our database
        $sql = "INSERT INTO resume(user_id, exp, edu, fun_areas,hobbies, lang, core_area , referee) 
                VALUES 
                ('$user_id ','$exp ','$edu ','$fun_areas ','$hobbies ', '$lang ', '$core_area ', '$referee ')";

        if(mysqli_query($conn, $sql)) {


            $cookie_name = 'success';
            $cookie_value = 'Your Digital CV has been updated! Best of Luck!';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");

            header('location: ../dashboard.php');

        } else {
            $cookie_name = 'error';
            $cookie_value = 'Sorry, Unable to complete operation at the moment. try again later.';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");

            header('location: ../dashboard.php');
            die();
        }

    }else{
        $cookie_name = 'missing_field';
        $cookie_value = 'One or more required fields are missing';
        setcookie($cookie_name, $cookie_value, time() + (5), "/");

        header('location: ../add_resume.php');
        die();
    }





}