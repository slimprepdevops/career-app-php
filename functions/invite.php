<?php

    include_once('../config/connect.php');
    include_once('../config/director.php');
    include_once('../core/functionality.php');

function checkInvite($_id){
    global $conn;

    $sql= "SELECT * FROM job_apply WHERE id = '$_id'";
    $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    if($row['invite'] < 1){
        return 0;// user not registered
    }else{
        return 1;//already using given user email

    }
}


    if(
        !empty($_POST['_id']) && !empty($_POST['uid'])
    ) {
        $user_id = trim($_POST['uid']);
        $tid = trim($_POST['_id']);

        if(checkInvite($tid) < 1){

            $invite = 1;

            $sql = "UPDATE job_apply SET invite='$invite' WHERE id='$tid'";

            if(mysqli_query($conn, $sql)) {
                //get user names
                $user = getOne($user_id, 'users');

                $response['success'] = true;
                $response['names'] = $user['fname'] . ' ' . $user['lname'];
                echo json_encode($response) ;
            } else {
                $response['success'] = false;
                $response['errors'] = mysqli_error($conn);

                echo json_encode($response) ;
                die();
            }
        }else{
            $response['success'] = false;
            $response['errors'] = 'You already invited this user!';

            echo json_encode($response) ;
        }

    }else{
        $response['success'] = false;
        $response['errors'] = 'One or more required fields are empty.';

        echo json_encode($response) ;

    }

