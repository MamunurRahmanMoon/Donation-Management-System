<?php
        
        if(isset($_POST['upload_image_btn'])){
        
            session_start();
            $requesterName = $_SESSION['currentAdminRequesterUsername'];
            // print_r($_FILES);
        
            $src = $_FILES['upload_image_requester']['tmp_name'];
            $img = explode('.',$_FILES['upload_image_requester']['name']);
            $img = "png";
            $img_name = $requesterName.'.'.$img;
    
            $des ="../assets/images/uploads/requesterUpload/".$img_name;
    
            if(move_uploaded_file($src, $des)){
                require_once('../models/requesterModel.php');
                updateRequesterImg($img_name,$requesterName);
                header("location: ../views/adminRequester.php?err=imageSuccess");
            }else{
                header("location: editAdminRequester.php?err=imageFailed");
            }
        }
    
        if(isset($_POST['update_userProfile'])){
    
            session_start();
            $currentUserID = $_SESSION['currentAdminRequesterID'];
    
            $fullname = $_POST['displayFullname'];
            $username = $_POST['displayUsername'];
            $password = $_POST['displayPassword'];
            $district = $_POST['displayDistrict'];
            $city = $_POST['displayCity'];
            $phone = $_POST['displayPhone'];
            $email = $_POST['displayEmail'];
    
    
            require_once('../models/requesterModel.php');

        $status = updateRequesterInfo($currentUserID, $fullname, $username, $password, $district, $city, $phone, $email);
        if($status){
            header("location: ../views/adminRequester.php?err=requesterInfoSuccess");
        }
        else{
            header("location: ../views/editAdminRequester.php?err=requesterInfoFailed");
        }
        }
?>