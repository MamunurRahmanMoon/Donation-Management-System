<?php
    require_once('db.php');
    function volunteerSignup($fullname, $username, $password, $district, $city, $phone, $email){
        $con = getConnection();

        $sql = "INSERT INTO `volunteers` (`ID`, `fullname`, `username`, `password`, `district`, `city`, `phone`, `email`) VALUES (NULL, '$fullname', '$username', '$password', '$district', '$city', '$phone', '$email')";

        $result = mysqli_query($con, $sql);
        
        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function volunteerLogin($user){
        $con = getConnection();
        $sql = "SELECT * FROM `volunteers` where username='{$user['username']}' and password='{$user['password']}'";

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

    function displayVolunteer(){
        $con = getConnection();
        $sql = "SELECT * FROM `volunteers`";

        $result = mysqli_query($con, $sql);

        return $result;
    }


    function displayAdminVolunteerProfile($ID){
        $con = getConnection();
        $sql = "SELECT * FROM `volunteers` WHERE `ID` = '$ID'";

        $result = mysqli_query($con, $sql);

        // $user = mysqli_fetch_assoc($result);
        
        return $result;
    }


    function updateVolunteerInfo($ID, $fullname, $username, $password, $district, $city, $phone, $email){
        $con = getConnection();

        $sql = "UPDATE `volunteers` SET `fullname` = '$fullname', `username` = '$username', `password` = '$password',`district` = '$district', `city` = '$city', `phone` = '$phone', `email` = '$email' WHERE `ID` = '$ID'";

        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }

    function updateVolunteerImg($img_name,$username){
        $con = getConnection();
        $sql = "UPDATE `volunteers` SET image='$img_name' where username = '$username'";
        $result = mysqli_query($con, $sql);

        if($result){
            return true;
        }
        else{
            return false;
        }
    }
?>