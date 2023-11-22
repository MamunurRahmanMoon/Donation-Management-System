<?php

    if(isset($_POST['btn'])){

        require_once "../models/adminModel.php";
        $adminUsername = $_POST['admin_username'];
        $adminCode = $_POST['admin_code'];

            if(empty($adminUsername) || empty($adminCode)){
                header('location: ../views/amdinLogIn.php?err=bad_request');
            }
            else{
                if(empty($adminUsername)){
                    header("location: ../views/adminLogIn.php?err=emptyUsername");
                    
                }
                else if(empty($adminCode)){
                    header("location: ../views/adminLogIn.php?err=emptyPassword");
                }
                else{
                    $admin = ['username' => $adminUsername, 'password' => $adminCode];
                    $status = login($admin);

                    if($status){
                        session_start();
                        setcookie('adminStatus', 'true', time()+3600, '/');
                        $_SESSION['adminUsername'] = $adminUsername;
                        header('location: ../views/admin.php');
                    }
                    else{
                        header('location: ../views/adminLogIn.php?err=invalid');
                    }
                }
            }
        }
        else{
            header('location: ../views/adminLogIn.php?err=error');
        }
?>