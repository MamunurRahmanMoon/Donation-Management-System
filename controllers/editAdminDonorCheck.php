<?php

if(isset($_POST['upload_image_btn'])){
        
        session_start();
        $donorName = $_SESSION['currentAdminDonorUsername'];
        // print_r($_FILES);
    
        $src = $_FILES['upload_image_donor']['tmp_name'];
        $img = explode('.',$_FILES['upload_image_donor']['name']);
        $img = "png";
        $img_name = $donorName.'.'.$img;

        $des ="../assets/images/uploads/donorUpload/".$img_name;

        if(move_uploaded_file($src, $des)){
            require_once('../models/donorModel.php');
            updateDonorImg($img_name,$donorName);
            header("location: ../views/adminDonor.php?err=imageSuccess");
        }else{
            header("location: editAdminDonor.php?err=imageFailed");
        }
    }

    if(isset($_POST['update_userProfile'])){

        session_start();
        $currentUserID = $_SESSION['currentAdminDonorID'];

        $fullname = $_POST['displayFullname'];
        $username = $_POST['displayUsername'];
        $password = $_POST['displayPassword'];
        $district = $_POST['displayDistrict'];
        $city = $_POST['displayCity'];
        $phone = $_POST['displayPhone'];
        $email = $_POST['displayEmail'];


        require_once('../models/donorModel.php');

        $status = updateDonorInfo($currentUserID, $fullname, $username, $password, $district, $city, $phone, $email);
        
        if($status){
            header("location: ../views/adminDonor.php?err=infoSuccess");
        }
        else{
            header("location: ../views/editAdminDonor.php?err=infoFailed");
        }
    }
       


?>