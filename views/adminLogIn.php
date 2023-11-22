<?php
    //Error Handling Message
    if(isset($_GET['err'])){
        
        if($_GET['err'] == 'bad_request'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Log in first
            </div>";
        }
        if($_GET['err'] == 'emptyUsername'){
            echo '<p>Enter username</p>';
        }
        if($_GET['err'] == 'invalid'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Invalid username or code
            </div>";
        }
        if($_GET['err'] == 'infoSuccess'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: darkviolet; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                User info updated successfully!
            </div>";
        }
        if($_GET['err'] == 'infoFailed'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: darkviolet; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                User info update failed!
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
    <title>Admin Login</title>
    <link rel="stylesheet" href="../assets/styles/LogIn.css">
</head>
<body>
    <div class='adminLogIn'>
        <form name="adminForm" onsubmit="return validateForm();" action="../controllers/adminLogInCheck.php" method="POST">
            <fieldset>
                <legend>Admin Login</legend>
                <table>
                <tr>
                    <td>
                    <h4 class="colorText">Admin Username:</h4> <input type="text" name="admin_username">
                        <div style="font-size: 14px; margin-left: 120px; color: blue;" id="username"><p class="displayError"></p></div>
                    </td>
                    
                </tr>
                
                <tr>
                    <td>
                        <h4 class="colorText">Admin Code : </h4><input type="password" name="admin_code" value=""/> 
                        <div style="font-size: 14px; margin-left: 120px; color: blue;" id="code"><p class="displayError"></p></div>
                    </td>
                </tr>
            
                <tr>
                    <td>
                    <input class='submitButton' type="submit" name='btn' value="Submit"/>
                    </td>
                </tr>
                </table>
            </fieldset>
        </form>
    </div>

    <script src="../assets/JS/adminLogIn.js"></script>
</body>
</html>