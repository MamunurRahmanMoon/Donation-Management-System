<?php
    //Error Handling Message
    if(isset($_GET['err'])){
        
        if($_GET['err'] == 'success'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Image uploaded successfully!
            </div>";
        }
        if($_GET['err'] == 'emptyUsername'){
            echo '<p>Enter username</p>';
        }
        if($_GET['err'] == 'failed'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Image upload failed!
            </div>";
        }

    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles/adminProfile.css">
</head>
<body>
    <div class='adminLogIn'>
        <div>
            <div class="extra-gap">
                <a class="dashboard_btn" href="adminRequester.php">Back To Dashboard</a>
            </div>
            <form name="userForm"  action="../controllers/editAdminRequesterCheck.php" method="POST">
                    <fieldset>
                        <legend>Requester Profile</legend>
                        <div>
                            <table border=1>
                                <?php
                                        $ID = base64_decode($_GET['requesterID']);
                                        session_start();
                                        $_SESSION['updateRequester'] = true;

                                        require_once('../models/requesterModel.php');
                                        $result = displayAdminRequesterProfile($ID);
                                        $data = mysqli_fetch_assoc($result);
                                ?>
                                <tr>
                                    <td>User ID</td>
                                    <td>
                                        <input name="displayID" disabled="disabled" type="text" value="<?= $data['ID']?>">
                                        <?php 
                                            $_SESSION['currentAdminRequesterID'] = $data['ID'];
                                        ?>
                                     </td>
                                </tr>
                                <tr>
                                    <td>Fullname</td>
                                    <td> <input name="displayFullname" type="text" value="<?= $data['fullname']?>"> </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td> <input name="displayUsername" type="text" value="<?= $data['username']?>">
                                    <?php
                                        $_SESSION['currentAdminRequesterUsername'] = $data['username'];
                                    ?>
                                </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td> <input name="displayPassword" type="text" value="<?= $data['password']?>"> </td>
                                </tr>
                                <tr>
                                    <td>District</td>
                                    <td> <input name="displayDistrict" type="text" value="<?= $data['district']?>"> </td>
                                </tr>
                                <tr>
                                    <td>City</td>
                                    <td> <input name="displayCity" type="text" value="<?= $data['city']?>"> </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td> <input name="displayPhone" type="text" value="<?=$data['phone']?>"> </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td> <input name="displayEmail" type="text" value="<?= $data['email']?>"> </td>
                                </tr>
                                <tr>
                                    <td>Profile Image</td>
                                    <td style="color: white">
                                   <?php 
                                    if($data['image'] == null){
                                        echo "No image";
                                    }else{
                                       echo "{$data['image']}";
                                    }
                                    ?>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div>
                            <input name="update_userProfile" class="submitButton" type="submit" value="Update">
                        </div>
                    </fieldset>
            </form>  
        </div>
       
        <div class="profile-image-area">
            <form method="POST" action="../controllers/editAdminRequesterCheck.php" enctype="multipart/form-data">
                <div class="inside-profile-image">
                    
                    <div>
                        <img class="profile-image" src="../assets/images/uploads/requesterUpload/<?php
                            if($data['image'] == null){
                                echo "default.png";
                            }else{
                                echo "{$data['image']}";
                            }
                        ?>" 
                        alt="Default Profile Image">
                    </div>

                    <div class="image-upload-button-area">
                        <input name="upload_image_requester" type="file" id="">
                        <input name="upload_image_btn" class="image-upload-button" type="submit" value="Upload">
                    </div>
                </div>
            </form>
        </div> 
    </div>
</body>