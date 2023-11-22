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
            <form name="adminForm"  action="../controllers/adminProfileCheck.php" method="POST">
                    <fieldset>
                        <legend>Admin Profile</legend>
                        <div>
                            <table border=1>
                                <?php
                                    session_start();
                                    $adminName = $_SESSION['adminUsername'];
                                    require_once('../models/adminModel.php');
                                    $result = displayProfile($adminName);
                                    $data = mysqli_fetch_assoc($result);
                                ?>
                                <tr>
                                    <td>User ID</td>
                                    <td><?php
                                        echo "{$data['ID']}";

                                        $_SESSION['adminIdSession'] = $data['ID'];
                                        $adminIdSession = $_SESSION['adminIdSession'];
                                        // echo $adminIdSession;
                                        ?>
                                     </td>
                                </tr>
                                <tr>
                                    <td>Admin Username</td>
                                    <td> <input name="adminProfileUsername" type="text" value="<?= $data['username']?>"> </td>
                                </tr>
                                <tr>
                                    <td>Admin Code/Password</td>
                                    <td> <input name="adminProfilePassword" type="text" value="<?= $data['password']?>"> </td>
                                </tr>
                                <tr>
                                    <td>Profile Image</td>
                                    <td style="color: white"><?php 
                                    if($data['image'] == null){
                                        echo "No image";
                                    }else{
                                       echo "{$data['image']}";
                                    }
                                    ?></td>
                                </tr>
                            </table>
                        </div>
                        <br>
                        <div>
                            <input name="update_adminProfile" class="submitButton" type="submit" value="Update">
                        </div>
                    </fieldset>
            </form>  
        </div>
       
                <div class="profile-image-area">
                    <form method="POST" action="../controllers/adminProfileCheck.php" enctype="multipart/form-data">
                        <div class="inside-profile-image">
                            
                            <div>
                                <img class="profile-image" src="../assets/images/uploads/<?php
                                    if($data['image'] == null){
                                        echo "default.png";
                                    }else{
                                       echo "{$data['image']}";
                                    }
                                ?>" 
                                alt="Default Profile Image">
                            </div>

                            <div class="image-upload-button-area">
                                <input name="upload_image" type="file" id="">
                                <input name="upload_image_btn" class="image-upload-button" type="submit" value="Upload">
                            </div>
                        </div>
                    </form>
                </div> 
    </div>
</body>
<footer>
<a href="../controllers/logout.php">Log-out</a>
</footer>
</html>