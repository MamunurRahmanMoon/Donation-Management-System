<?php
    require_once('db.php');
    function donorSignup($fullname, $username, $password, $district, $city, $phone, $email){
        $con = getConnection();
        // $sql = "INSERT INTO `donors` (`ID`,`fullname`,`username`,`password`,`district`,`city`,`phone`,`email`) VALUES(NULL, {$user['fullname']}, {$user['username']}, {$user['password']}, {$user['district']}, {$user['city']}, {$user['phone']}, {$user['email']})";

        // Working one
        $sql = "INSERT INTO `donors` (`ID`, `fullname`, `username`, `password`, `district`, `city`, `phone`, `email`) VALUES (NULL, '$fullname', '$username', '$password', '$district', '$city', '$phone', '$email')";

        $result = mysqli_query($con, $sql);
        
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function donorLogin($user){
        $con = getConnection();
        $sql = "SELECT * FROM `donors` where username='{$user['username']}' and password='{$user['password']}'";

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

    
    function displayDonor(){
        $con = getConnection();
        $sql = "select * from donors";

        $result = mysqli_query($con, $sql);

        return $result;
    }

    function deleteDonor($ID){
        $con = getConnection();
        $sql = "DELETE FROM `donors` WHERE `ID` = '$ID'";

        $result = mysqli_query($con
        , $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function displayAdminDonorProfile($ID){ // For admin page
        $con = getConnection();
        $sql = "SELECT * FROM `donors` WHERE `ID` = '$ID'";

        $result = mysqli_query($con, $sql);

        // $user = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function displayDonorProfile($username){
        $con = getConnection();
        $sql = "SELECT * FROM `donors` WHERE username = '$username'";

        $result = mysqli_query($con, $sql);

        // $user = mysqli_fetch_assoc($result);
        
        return $result;
    }

    function updateDonorInfo($ID, $fullname, $username, $password, $district, $city, $phone, $email){
        $con = getConnection();

        $sql = "UPDATE `donors` SET `fullname` = '$fullname', `username` = '$username', `password` = '$password',`district` = '$district', `city` = '$city', `phone` = '$phone', `email` = '$email' WHERE `ID` = '$ID'";
        // $sql = "UPDATE `admins` SET `username`= '{$userProfile['username']}', `password`= '{$userProfile['password']}' WHERE `ID`='{$userProfile['ID']}'";

        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function updateDonorImg($img_name,$username){
        $con = getConnection();
        $sql = "UPDATE `donors` SET image='$img_name' where username = '$username'";
        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function searchDonorByUserame($key){
        $con = getConnection();
        $query = "SELECT * FROM `donors` WHERE username LIKE '%$key%'";
        $result = mysqli_query($con, $query);

        // $user = mysqli_fetch_assoc($result);
        return $result;
    }
    
?>