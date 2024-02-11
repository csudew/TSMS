function validateForm(){
    var adminName = document.forms["adminForm"]["AName"].value;
    var adminUserName = document.forms["adminForm"]["AUName"].value;
    var adminGender = document.forms["adminForm"]["gender"].value;
    var email = document.forms["adminForm"]["Aemail"].value;
    var phoneNumber = document.forms["adminForm"]["APnum"].value;
    var category = document.forms["adminForm"]["Acategory"].value;
    var password = document.forms["adminForm"]["Apw"].value;
    var reEnterPassword = document.forms["adminForm"]["ARpw"].value;

    if (adminName == "") {
        alert("Admin Name must be filled out");
        return false;
    }else if (adminUserName == "") {
        alert("Admin User Name must be filled out");
        return false;
    }else if (adminGender == "") {
        alert("Admin Gender must be filled out");
        return false;
    }else if (email == "") {
        alert("Email must be filled out");
        return false;
    }else if (phoneNumber == "") {
        alert("Phone Number must be filled out");
        return false;
    }else if (category == "") {
        alert("Expert category must be filled out");
        return false;
    }else if (password == "") {
        alert("Password must be filled out");
        return false;
    }else if (reEnterPassword == "") {
        alert("Re-Enter Password must be filled out");
        return false;
    }else if (password !== reEnterPassword) {
        alert("Passwords do not match");
        return false;
    }

    return true;
}

