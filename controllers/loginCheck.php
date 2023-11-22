<?php

    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];


    // New Logic

    if(isset($_POST['btn'])){
        
        if($role == 'select'){
            header('location: ../views/signup.php?err=emptyRole');
         }
         else if($username == ''){
            header('location: ../views/signup.php?err=emptyUsername');
         }
         else if($password == ''){
            header('location: ../views/signup.php?err=emptyPassword');
         }

        else if($role != "" && $username != "" && $password != "" ){

            // Donor log in
            if($role == 'Donor'){
                require_once "../models/donorModel.php";
                $donor = ['username' => $username, 'password' => $password];
                $status = donorLogin($donor);

                if($status){
                    session_start();
                    $_SESSION['donorStatus'] = true;
                    $donorSession = $username;
                    $_SESSION['donorStatus'] = $donorSession;

                    setcookie('donorStatus', 'true', time()+3600, '/');
                    header('location: ../views/donor.php');
                }
                else{
                    header('location: ../views/login.php?err=invalid');
                }
            }
            
            // Requester log in
            else if($role == 'Requester'){
                require_once "../models/requesterModel.php";
                $requester = ['username' => $username, 'password' => $password];
                $status = requesterLogin($requester);

                if($status){
                    session_start();
                    $_SESSION['requesterStatus'] = true;
                    $requesterSession = $username;
                    $_SESSION['requesterStatus'] = $requesterSession;

                    setcookie('requesterStatus', 'true', time()+3600, '/');

                    header('location: ../views/requester.php');
                }
                else{
                    header('location: ../views/login.php?err=invalid');
                }
            }

            // Volunteer log in
            else if($role == 'Volunteer'){
                require_once "../models/volunteerModel.php";
                $volunteer = ['username' => $username, 'password' => $password];
                $status = volunteerLogin($volunteer);

                if($status){
                    session_start();
                    $_SESSION['volunteerStatus'] = true;
                    $volunteerSession = $username;
                    $_SESSION['volunteerUsername'] = $volunteerSession;

                    setcookie('volunteerStatus', 'true', time()+3600, '/');
                    header('location: ../views/volunteer.php');
                }
                else{
                    header('location: ../views/login.php?err=invalid');
                }
            }
        }
        else{
            header('location: login.php?err=empty');
        }
    }
?>