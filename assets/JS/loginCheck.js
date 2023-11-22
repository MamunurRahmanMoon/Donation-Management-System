function printError(id, error) {
    let element = document.getElementById(id);
    element.getElementsByClassName('displayError')[0].innerHTML = error;
}

function validateForm(){
    let formSubmit = true;
    let getRole = document.forms['loginForm']["role"].value;
    let getUsername = document.forms['loginForm']["username"].value;
    let getPassword = document.forms['loginForm']["password"].value;

    if(getRole == 'select'){
        printError('role', 'Select your role first!');
        formSubmit = false;
    }
    if(getUsername.length == 0) {
        printError('username', 'Username cannot be empty!');
        formSubmit = false;
    }
    if(getPassword.length == 0){
        printError('password', 'Password cannot be empty!');
        formSubmit = false;
    }

    return formSubmit;
}