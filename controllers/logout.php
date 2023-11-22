<?php
    session_destroy();
    
    setcookie('adminStatus', 'true', time()-10, '/');
    setcookie('requesterStatus', 'true', time()-10, '/');
    setcookie('volunteerStatus', 'true', time()-10, '/');
    setcookie('donorStatus', 'true', time()-10, '/');
    
    header('location: ../views/home.php');
 ?>