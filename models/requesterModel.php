<?php
    require_once('db.php');
    function requesterSignup($fullname, $username, $password, $district, $city, $phone, $email){
        $con = getConnection();
        // $sql = "INSERT INTO `donors` (`ID`,`fullname`,`username`,`password`,`district`,`city`,`phone`,`email`) VALUES(NULL, {$user['fullname']}, {$user['username']}, {$user['password']}, {$user['district']}, {$user['city']}, {$user['phone']}, {$user['email']})";

        // Working one
        $sql = "INSERT INTO `requesters` (`ID`, `fullname`, `username`, `password`, `district`, `city`, `phone`, `email`) VALUES (NULL, '$fullname', '$username', '$password', '$district', '$city', '$phone', '$email')";

        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function requesterLogin($user){
        $con = getConnection();
        $sql = "SELECT * FROM `requesters` where username='{$user['username']}' and password='{$user['password']}'";

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

    function displayRequester(){
        $con = getConnection();
        $sql = "select * from requesters";

        $result = mysqli_query($con, $sql);

        return $result;
    }

    function deleteRequester($ID){
        $con = getConnection();
        $sql = "DELETE FROM `requesters` WHERE `ID` = '$ID'";

        $result = mysqli_query($con
        , $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function displayAdminRequesterProfile($ID){
        $con = getConnection();
        $sql = "SELECT * FROM `requesters` WHERE `ID` = '$ID'";

        $result = mysqli_query($con, $sql);

        // $user = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function displayRequesterProfile($username){
        $con = getConnection();
        $sql = "SELECT * FROM `requesters` WHERE username = '$username'";

        $result = mysqli_query($con, $sql);

        // $user = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function updateRequesterInfo($ID, $fullname, $username, $password, $district, $city, $phone, $email){
        $con = getConnection();

        $sql = "UPDATE `requesters` SET `fullname` = '$fullname', `username` = '$username', `password` = '$password', `district` = '$district', `city` = '$city', `phone` = '$phone', `email` = '$email' WHERE `ID` = '$ID'";
        // $sql = "UPDATE `admins` SET `username`= '{$userProfile['username']}', `password`= '{$userProfile['password']}' WHERE `ID`='{$userProfile['ID']}'";

        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    
    function updateRequesterImg($img_name, $username){
        $con = getConnection();
        $sql = "UPDATE `requesters` SET image='$img_name' WHERE username = '$username'";
        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }


    function searchRequesterByUserame($key){
        $con = getConnection();
        $query = "SELECT * from `requesters` where username like '%$key%'";
        $result = mysqli_query($con, $query);

        // $user = mysqli_fetch_assoc($result);
        return $result;
    }

    function createRequest($reqFor, $reqAmount, $reqDescription, $reqBy){
        
        $con = getConnection();
        $sql = "INSERT INTO `request` (`ID`, `reqFor`, `reqAmount`, `reqDescription`, `reqBy`) VALUES (NULL, `$reqFor`, `$reqAmount`, `$reqDescription`, `$reqBy`)";

        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }
?>