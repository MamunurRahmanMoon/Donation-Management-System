<?php
     session_start();
     $role = $_POST['role'];
     $fullname = $_POST['fullname'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $district = $_POST['district'];
     $city = $_POST['city'];
     $phone = $_POST['phone'];
     $email = $_POST['email'];

     if($role == 'select'){
        header('location: ../views/signup.php?err=emptyRole');
     }
     else if($fullname == ''){
        header('location: ../views/signup.php?err=emptyFullname');
     }
     else if($username == ''){
        header('location: ../views/signup.php?err=emptyUsername');
     }
     else if($password == ''){
        header('location: ../views/signup.php?err=emptyPassword');
     }
     else if($district == ''){
        header('location: ../views/signup.php?err=emptyDistrict');
     }
     else if($city == ''){
        header('location: ../views/signup.php?err=emptyCity');
     }
     else if($phone == ''){
        header('location: ../views/signup.php?err=emptyPhone');
     }
     else if($email == ''){
        header('location: ../views/signup.php?err=emptyEmail');
     }
     else if($role != '' && $fullname != '' &&  $username != '' && $password != '' && $district != '' && $city != '' && $phone != '' && $email != ''){

         //For Donor Sign-up
         if($role == 'Donor'){
            require_once('../models/donorModel.php');
            // echo $role;
            // $donor = ['fullname' => $fullname, 'username' => $username, 'password' => $password, 'district' => $district, 'city' => $city, 'phone' => $phone, 'email' => $email];

            $status = donorSignup($fullname, $username, $password, $district, $city, $phone, $email);
   
            if($status){
               session_start();
               setcookie('donorStatus', 'true', time()+3600, '/');
               header('location: ../views/login.php?err=infoSuccess');
            }
            else{
               header('location: ../views/signup.php?err=infoFailed');
            }  
         }

         // For Requester Sign-up
         else if($role == 'Requester'){
            require_once('../models/requesterModel.php');
            // echo $role;
            $status = requesterSignup($fullname, $username, $password, $district, $city, $phone, $email);
   
            if($status){
               header('location: ../views/login.php?err=infoSuccess');
            }
            else{
               header('location: ../views/signup.php?err=infoFailed');
            }  
         }

         // For Volunteer Sign-up
         else if($role == 'Volunteer'){
            require_once('../models/volunteerModel.php');
            // echo $role;
            
            $status = volunteerSignup($fullname, $username, $password, $district, $city, $phone, $email);
   
            if($status){
               header('location: ../views/login.php?err=infoSuccess');
            }
            else{
               header('location: ../views/signup.php?err=infoFailed');
            }  
         }

     }
     else{
      header('location: ../views/signup.php?err=empty');
     }
?>