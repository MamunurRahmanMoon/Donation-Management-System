<?php
require_once('db.php');

    function login($user){
        $con = getConnection();
        $sql = "select * from admins where username='{$user['username']}' and password='{$user['password']}'";

        $result = mysqli_query($con
        , $sql);
        $count  = mysqli_num_rows($result);

        if($count > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function displayUser(){
        $con = getConnection();
        $sql = "select * from admins";

        $result = mysqli_query($con, $sql);

        return $result;
    }
    
    function displayProfile($username){
        $con = getConnection();
        $sql = "select * from admins where username = '$username'";

        $result = mysqli_query($con, $sql);

        // $user = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function updateUserInfo($userProfile){
        $con = getConnection();

        $sql = "UPDATE `admins` SET `username`= '{$userProfile['username']}', `password`='{$userProfile['password']}' WHERE `ID`='{$userProfile['ID']}'";
        // $sql = "UPDATE `admins` SET `username`= '{$userProfile['username']}', `password`= '{$userProfile['password']}' WHERE `ID`='{$userProfile['ID']}'";

        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }


    function updateUserImg($img_name,$username){
        $con = getConnection();
        $sql = "update admins set image='$img_name' where username = '$username'";
        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }


    function searchUser($key){
        $con = getConnection();
        $query = "SELECT username from admins where username like '%$key%'";
        $result = mysqli_query($con, $query);

        $user = mysqli_fetch_assoc($result);
        return $user;
    }

    function searchUserByName($key){
        $con = getConnection();
        $query = "SELECT * from admins where username like '%$key%'";
        $result = mysqli_query($con, $query);

        // $user = mysqli_fetch_assoc($result);
        return $result;
    }
    
?>