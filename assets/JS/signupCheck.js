function printError(id, error) {
    let element = document.getElementById(id);
    element.getElementsByClassName('displayError')[0].innerHTML = error;
}

function validateForm(){
    let formSubmit = true;
    let getRole = document.forms['signupForm']["role"].value;
    let getFullname = document.forms['signupForm']["fullname"].value;
    let getUsername = document.forms['signupForm']["username"].value;
    let getPassword = document.forms['signupForm']["password"].value;
    let getDistrict = document.forms['signupForm']["district"].value;
    let getCity = document.forms['signupForm']["city"].value;
    let getPhone = document.forms['signupForm']["phone"].value;
    let getEmail = document.forms['signupForm']["email"].value;


    if(getRole == 'select'){
        printError('role', 'Select your role first!');
        formSubmit = false;
    }
    if(getFullname.length == 0) {
        printError('fullname', 'Full-name cannot be empty!');
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
    if(getDistrict.length == 0){
        printError('district', 'District cannot be empty!');
        formSubmit = false;
    }
    if(getCity.length == 0){
        printError('city', 'City name cannot be empty!');
        formSubmit = false;
    }
    if(getPhone.length == 0){
        printError('phone', 'Phone-no cannot be empty!');
        formSubmit = false;
    }
    if(getEmail.length == 0){
        printError('email', 'Email cannot be empty!');
        formSubmit = false;
    }

    return formSubmit;
}