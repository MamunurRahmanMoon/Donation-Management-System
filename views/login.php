<?php 

    if(isset($_GET['err'])){

        if($_GET['err'] == 'bad_request'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Log in first
            </div>";
        }

        if($_GET['err'] == 'empty'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Fields can not be empty!
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
                Invalid username or Password
            </div>";
        }
        if($_GET['err'] == 'infoSuccess'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: darkviolet; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Signed-up successfully, log in now!
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
    <title>User Login</title>
    <link rel="stylesheet" href="../assets/styles/LogIn.css">
</head>
<body>
    <div class='userLogIn'>
        <form name="loginForm" onsubmit="return validateForm();" action="../controllers/loginCheck.php" method="POST">

        <fieldset>
        <legend><b>Log-in</b></legend>
            <table>
                <tr>
                    <td> Log-in as:
                        <select name="role">
                            <option selected disabled value="select">--Select--</option>
                            <option value="Donor">Donor</option>
                            <option value="Requester">Requester</option>
                            <option value="Volunteer">Volunteer</option>
                        </select>
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="role"><span class="displayError"></span></div>
                    </td>
                    
                </tr>
                <tr>
                    <td>
                        Username: <input type="text" name="username" value="">
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="username"><span class="displayError"></span></div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password : <input type="password" name="password" value=""/> 
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="password"><span class="displayError"></span></div>
                    </td>
                </tr>

                    <tr>
                    <td>
                    <input class="submitButton" type="submit" name="btn" value="Submit"/>
                    </td>
                    </tr>

                    <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td>
                        Haven't registered yet? <a href="signup.php">Sign-up</a>
                    </td>
                    <td>
                    <a href="adminLogIn.php">Log-in as Admin</a>
                    </td>
                </tr>
            </table>
        </fieldset>

        </form>
    </div>
        
    <script src="../assets/JS/loginCheck.js"></script>
</body>
</html>