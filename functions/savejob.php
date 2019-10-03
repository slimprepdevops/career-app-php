<?php

    include_once('../config/connect.php');
    include_once('../config/director.php');

//get data from the page


    if(isset($_POST['savejob'])){
        if(
            !empty($_POST['title']) &&
            !empty($_POST['desc']) &&
            !empty($_POST['Indus']) &&
            !empty($_POST['Pos']) &&
            !empty($_POST['Date']) &&
            !empty($_POST['Time']) &&
            !empty($_POST['Venue']) &&
            !empty($_POST['MinR'])
        ) {

            $title = $_POST['title'];

            $com_id = $user_data['id'];

            $desc = $_POST['desc'];

            $indus = $_POST['Indus'];

            $pos = $_POST['Pos'];

            $date = $_POST['Date'];

            $time = $_POST['Time'];

            $venue = $_POST['Venue'];

            $minr = $_POST['MinR'];

            $fa = $_POST['FA'];
            $salary = intval($_POST['Salary']);
            $exp = intval($_POST['Exp']);

            $sql = "INSERT INTO jobs(com_id, title, description, status,min_req, indus, func_area , pos, salary, idate, itime, ivenue, iexp) 
                VALUES 
                ('$com_id','$title ','$desc ', 1,'$minr', '$indus', '$fa', '$pos', '$salary', '$date', '$time', '$venue', '$exp')";

            if(mysqli_query($conn, $sql)) {
                $cookie_name = 'success';
                $cookie_value = 'Success! Your Job Details has been posted!';
                setcookie($cookie_name, $cookie_value, time() + (5), "/");

                header('location: ../com_jobs.php');

            } else {
                $cookie_name = 'error';
                $cookie_value = 'Unable to complete operation: ' . mysqli_error($conn);
                setcookie($cookie_name, $cookie_value, time() + (5), "/");

                header('location: ../com_jobs.php');
                die();
            }


        }else{
            $cookie_name = 'missing_field';
            $cookie_value = 'One or more required fields are missing';
            setcookie($cookie_name, $cookie_value, time() + (5), "/");

            header('location: ../com_new_job.php');
            die();
        }
    }
