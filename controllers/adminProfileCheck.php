<?php


    if(isset($_POST['upload_image_btn'])){
        
        session_start();
        $adminName = $_SESSION['adminUsername'];
        // print_r($_FILES);
    
        $src = $_FILES['upload_image']['tmp_name'];
        $img = explode('.',$_FILES['upload_image']['name']);
        $img = "png";
        $img_name = $adminName.'.'.$img;

        $des ="../assets/images/uploads/".$img_name;

        if(move_uploaded_file($src, $des)){
            require_once('../models/adminModel.php');
            updateUserImg($img_name,$adminName);
            header("location: ../views/adminProfile.php?err=success");
        }else{
            header("location: adminProfile.php?err=failed");
        }
    }

    if(isset($_POST['update_adminProfile'])){

        session_start();
        $adminProfileUsername = $_POST['adminProfileUsername'];

        $adminProfilePassword = $_POST['adminProfilePassword'];

        $adminIdSession = $_SESSION['adminIdSession'];

        $userEdit = ['username' => $adminProfileUsername, 'password' => $adminProfilePassword, 'ID' => $adminIdSession];

        require_once('../models/adminModel.php');

        $status = updateUserInfo($userEdit);

        if($status){
            header("location: ../views/adminLogIn.php?err=infoSuccess");
        }
        else{
            header("location: ../views/adminLogIn.php?err=infoFailed");
        }


    }
?>