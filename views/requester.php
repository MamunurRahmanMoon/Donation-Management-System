<?php
    session_start();
    if(!isset($_COOKIE['requesterStatus'])){
        header('location: login.php?err=bad_request');
    }
    if(isset($_SESSION['requesterStatus'])){
    echo "You are welcome, ".$_SESSION['requesterStatus'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Page</title>
    <link rel="stylesheet" href="../assets/styles/donorPage.css">
</head>

<body>
    <form method="post" action="../controllers/requesterCheck.php">
        <div class="main-container">
            <div class="menubar">
                <div class="left-menu-element">
                    <a class="menu-button" href="../views/home.php">Home</a>
                </div>
                <div>
               
                    <?php
                        $requesterUserame = $_SESSION['requesterStatus'];

                        require_once('../models/requesterModel.php');
                        $result = displayRequesterProfile($requesterUserame);
                        $data = mysqli_fetch_assoc($result);
                        
                    ?>

                    <!-- Edit Profile Start -->
                    <a class="right-menu-element" href="editRequester.php?requesterID=<?= base64_encode($data['ID'])?>">
                    
                    <!-- Profile thumbnail start -->
                    <div class="profile-thumbnail">
                        <img id="user-image" src="../assets/images/uploads/requesterUpload
                            <?php
                                if($data['image'] == null){
                                    echo "default.png";
                                }else{
                                echo "{$data['image']}";
                                }
                            ?>"  alt="">
                        
                    </div>
                        
                        <h3>
                            <?php
                            echo "$requesterUserame" ;
                            ?>
                        </h3>
                    </a>
                </div>
            </div>

            <div class="main-element">
                <div class="sidebar">
                    <a href="requester.php" class="bar-element" style="background-color: rgb(71, 18, 120);">
                        <b>Create Request</b>
                    </a>
                    <a href="approvedRequester.php" class="bar-element">
                        <b>Requesters</b>
                    </a>
                    <a href="approvedCampaign.php" class="bar-element">
                        <b>Campaigns</b>
                    </a>
                </div>
                <div class="display-area">
                    <div>
                        <fieldset>
                            <legend>Request for donation </legend>
                            <table>
                            <tr>
                                <td> Request for::
                                    <select name="requestFor">
                                        <option selected disabled value="select">--Select--</option>
                                        <option value="medical">Medical</option>
                                        <option value="education">Education</option>
                                    </select>
                                    <div style="font-size: 14px; margin-left: 100px; color: blue;" id="role"><span class="displayError"></span></div>
                                </td>
                    
                            </tr>
                            <tr>
                                <td>
                                Request amount:<input type="number" name="requestAmount" value="1000">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                Request Desciption:<input type="text" name="requestDescription">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input name="requestBtn" type="submit" value="Submit Request">
                                </td>
                            </tr>
                            </table>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>

<footer>
    <a href="../controllers/logout.php">Log-out</a>
</footer>
</html> 