<?php
    if(isset($_GET['err'])){
        // if($_GET['err'] == 'null'){
        //     echo "Invalid username/password";
        // }

        if($_GET['err'] == 'empty'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Fields can not be empty!
            </div>";
        }
        if($_GET['err'] == 'emptyRole'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Define your role
            </div>";
        }
        if($_GET['err'] == 'emptyFullname'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter Full-name
            </div>";
        }

        if($_GET['err'] == 'emptyUsername'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter username
            </div>";
        }
        if($_GET['err'] == 'emptyPassword'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter a password
            </div>";
        }
        if($_GET['err'] == 'emptyDistrict'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter your district
            </div>";
        }
        if($_GET['err'] == 'emptyCity'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter yout city
            </div>";
        }
        if($_GET['err'] == 'emptyPhone'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter Phone-no
            </div>";
        }
        if($_GET['err'] == 'emptyEmail'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: aquamarine; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
                Enter e-mail
            </div>";
        }

        if($_GET['err'] == 'infoFailed'){
            echo "<div style='color: orange; height:50px; margin: 0 auto; text-align: center; background-color: darkviolet; display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;'>
               Sign-up failed!
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
    <title>Signup Page</title>
    <link rel="stylesheet" href="../assets/styles/LogIn.css">
</head>

<body>
    <div class="userSignup">
        <form name="signupForm"  onsubmit="return validateForm();"  method="post" action="../controllers/signupCheck.php">
            <fieldset>
                <legend><b>Sign-Up</b></legend>
                <table>
                    <tr>
                        <td> Sign-up as:
                            <select name="role" id="">
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
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Full-name: <input type="text" name="fullname" value="" />
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="fullname"><span class="displayError"></span></div>
                        </td>
                        
                    </tr>
                    <tr>
                        <td>
                        Username: <input type="text" name="username" value="" />
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
                        District: <input type="text" name="district" value="" />
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="district"><span class="displayError"></span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        City: <input type="text" name="city" value="" />
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="city"><span class="displayError"></span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Phone: <input type="number" name="phone" value="" />
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="phone"><span class="displayError"></span></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        Email :<input type="email" name="email" value=""/> 
                        <div style="font-size: 14px; margin-left: 100px; color: blue;" id="email"><span class="displayError"></span></div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <br>
                        </td>
                    </tr>

                    <tr>
                        <td>
                        <input class="submitButton" type="submit" name="btn" value="Submit" />
                        </td>
                    </tr>
                </table>
                
            </fieldset>
        </form>
    </div>

    <script src="../assets/JS/signupCheck.js"></script>
</body>

</html>