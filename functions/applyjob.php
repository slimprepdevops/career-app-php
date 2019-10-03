<?php

    include_once('../config/connect.php');
    include_once('../config/director.php');


    function checkApply($user_id, $jid){
        global $user_data;
        global $conn;

        $uid = $user_data['id'];

        $sql= "SELECT id FROM job_apply WHERE job_id = '$jid' AND user_id = '$user_id'";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        $row = mysqli_num_rows($result);
        if($row <=0){
            return 0;// user not registered
        }else{
            return 1;//already using given user email

        }
    }

    if(
        !empty($_POST['com_id']) &&
        !empty($_POST['user_id']) &&
        !empty($_POST['job_id'])
    )
    {
        $user_id = trim($_POST['user_id']);
        $com_id = trim($_POST['com_id']);
        $job_id = trim($_POST['job_id']);
        $invite = 0;

        if(checkApply($user_id,$job_id ) < 1){
            $sql = "INSERT INTO job_apply(user_id, com_id, job_id, invite) VALUES ('$user_id','$com_id','$job_id', '$invite')";

            $response['user_id'] = $user_id ;
            $response['com_id'] = $com_id ;
            $response['job_id'] = $job_id ;
            if(mysqli_query($conn, $sql)) {
                $response['success'] = true;
                echo json_encode($response) ;
            } else {
                $response['success'] = false;
                $response['errors'] = mysqli_error($conn);

                echo json_encode($response) ;
                die();
            }
        }else{

            $response['success'] = false;
            $response['errors'] = 'You have already applied for this job.';

            echo json_encode($response) ;
        }


    }

