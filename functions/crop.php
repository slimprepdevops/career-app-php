<?php


    include_once('../config/connect.php');
    include_once('../config/director.php');

if($_SERVER['REQUEST_METHOD']=='POST'){

    // array of valid extensions
    $validExtensions = array('.jpg', '.jpeg', '.gif', '.png');

    $src = $_POST['imgurl'];

    $newName = time() . '_' . '.jpg';
    $destination = '../public/uploads/' . $newName;

    $targ_w = $targ_h = 250;

    $jpeg_quality = 100;

    $img_r = imagecreatefromjpeg($src);
    $dst_r = imagecreatetruecolor($targ_w, $targ_h);

    imagecopyresampled($dst_r, $img_r, 0, 0, $_POST['x'], $_POST['y'], $targ_w, $targ_h, $_POST['w'], $_POST['h']);


    imagejpeg($dst_r, $destination, $newName);

    //update user image url
    $userid = $user_data['id'];
    $sql = "UPDATE users SET image='$newName' WHERE id='$userid'";
    if(mysqli_query($conn, $sql)) {
        $cookie_name = 'success';
        $cookie_value = 'Image upload successful!';
        setcookie($cookie_name, $cookie_value, time() + (5), "/");
        header('location: ../dashboard.php');
    }else{
        $cookie_name = 'error';
        $cookie_value = 'Unable to complete this operation!';
        setcookie($cookie_name, $cookie_value, time() + (5), "/");
        header('location: ../dashboard.php');
    }


}
?>