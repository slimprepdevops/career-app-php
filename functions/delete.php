<?php

include_once('../config/connect.php');
include_once('../config/director.php');

    if(isset($_POST['del_job'])){
        if(
            !empty($_POST['job_id']) &&
            !empty($_POST['com_id'])
        )
        {
            $user_id = $user_data['id'];
            $com_id = trim($_POST['com_id']);
            $job_id = trim($_POST['job_id']);

            if($user_id === $com_id){
                $sql = "DELETE from jobs where id = '$job_id' and com_id = '$com_id'";
                if(mysqli_query($conn, $sql)){
                    $cookie_name = 'success';
                    $cookie_value = 'you deleted one job!';
                    setcookie($cookie_name, $cookie_value, time() + (2), "/");
                    header('location: ../com_jobs.php');
                }
            }else{
                $cookie_name = 'error';
                $cookie_value = 'You are not authorised to perform this operation!';
                setcookie($cookie_name, $cookie_value, time() + (2), "/");
                header('location: ../com_jobs.php');
            }
        }
    }
