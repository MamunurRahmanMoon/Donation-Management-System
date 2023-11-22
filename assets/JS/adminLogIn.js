function printError(id, error) {
    let element = document.getElementById(id);
    element.getElementsByClassName('displayError')[0].innerHTML = error;
}

function validateForm() {
    let formSubmit = true;
    let getAdminName = document.forms['adminForm']["admin_username"].value;
    let getAdminCode = document.forms['adminForm']["admin_code"].value;

    if (getAdminName.length == 0) {
        printError('username', 'Admin name cannot be empty!');
        formSubmit = false;
    }
    if (getAdminCode.length == 0) {
        printError('code', 'Admin code cannot be empty!');
        formSubmit = false;
    }

    return formSubmit;
}