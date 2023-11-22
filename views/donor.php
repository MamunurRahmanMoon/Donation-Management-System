<?php
    session_start();
    if(!isset($_COOKIE['donorStatus'])){
        header('location: login.php?err=bad_request');
    }
    if(isset($_SESSION['donorStatus'])){
    echo "You are welcome, ".$_SESSION['donorStatus'];
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
    <form method="post" action="../controllers/donorCheck.php">
        <div class="main-container">
            <div class="menubar">
                <div class="left-menu-element">
                    <a class="menu-button" href="../views/home.php">Home</a>
                </div>
                <div>
               
                    <?php
                        $donorUserame = $_SESSION['donorStatus'];

                        require_once('../models/donorModel.php');
                        $result = displayDonorProfile($donorUserame);
                        $data = mysqli_fetch_assoc($result);
                        
                    ?>
                    <!-- Edit Profile Start -->
                    <a class="right-menu-element" href="editDonor.php?donorID=<?= base64_encode($data['ID'])?>">
                    
                    <!-- Profile thumbnail start -->
                    <div class="profile-thumbnail">
                        <img id="user-image" src="../assets/images/uploads/donorUpload/
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
                            echo "$donorUserame" ;
                            ?>
                        </h3>
                    </a>
                </div>
            </div>

            <div class="main-element">
                <div class="sidebar">
                    <a href="donor.php" class="bar-element" style="background-color: rgb(71, 18, 120);">
                        <b>Donate</b>
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
                        <!-- Donate area -->
                        <div>
                            Donate to feed a person for 3 months!
                            <input name="personDonate" id="personDonate" type="number" value="3000" disabled="disabled">
                            <input name="personMsg" id="personMsg" type="text" value="" placeholder="Enter your message">
                            <button onclick="donationConfirmation()">Donate</button>
                        </div>
                        <div id="personDonateConfirm">
                            <p ></p>
                        </div>
                        <div>
                            Donate to feed a family for 1 months!
                            <input type="number" value="7000" disabled="disabled">
                            <input type="text" value="Enter your message">
                            <input type="submit" value="Donate">
                        </div>
                        <div>
                            Custom Donation
                            <input type="number" value='20'>
                            <input type="text" value="Enter your message">
                            <input type="submit" value="Donate">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    <script src="../assets/JS/donor.js"></script>
    <!-- <script>
        let amount = document.getElementById('personDonate').value;
        let msg = document.getElementById('personMsg').value;
        let donation = {'amount': amount, 'msg': msg};
        console.log(amount);
        console.log(donation);
    </script> -->
</body>

<footer>
    <a href="../controllers/logout.php">Log-out</a>
</footer>
</html> 

