<?php
session_start();
    $reqFor = $_POST['requestFor'];
    $reqAmount = $_POST['requestAmount'];
    $reqDescription = $_POST['requestDescription'];
    $requesterUserame = $_SESSION['requesterStatus'];
    $reqBy = $requesterUserame;

    if(isset($_POST['requestBtn'])){
        require_once('../models/requesterModel.php');
            // echo $role;
            // $donor = ['fullname' => $fullname, 'username' => $username, 'password' => $password, 'district' => $district, 'city' => $city, 'phone' => $phone, 'email' => $email];

            $status = createRequest($reqFor, $reqAmount, $reqDescription, $reqBy);
   
            if($status){
               session_start();
               setcookie('createReqStatus', 'true', time()+3600, '/');
               header('location: ../views/requester.php?err=infoSuccess');
            }
            else{
               header('location: ../views/requetser.php?err=infoFailed');
            }  
         }
    
?>