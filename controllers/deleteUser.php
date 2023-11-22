Delete user page
<?php
    if(isset($_GET['donorID'])){

        $ID = base64_decode($_GET['donorID']);
        require_once('../models/donorModel.php');
        $status = deleteDonor($ID);
        if($status){
            header("location: ../views/adminDonor.php?err=donorDelSuccess");
        }
        else{
            header("location: ../views/adminDonor.php?err=donorDelFailed");
        }
    }
    if(isset($_GET['requesterID'])){

        $ID = base64_decode($_GET['requesterID']);
        require_once('../models/requesterModel.php');
        $status = deleteRequester($ID);
        if($status){
            header("location: ../views/adminRequester.php?err=requesterDelSuccess");
        }
        else{
            header("location: ../views/adminRequester.php?err=requesterDelFailed");
        }
    }
?>