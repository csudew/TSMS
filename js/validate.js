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
    }else if (phoneNumber.length > 10) {
        alert("Phone number must be less than 10 digits ");
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

function customersearchvalidation(event) {
    if (event.submitter && event.submitter.name === "CPNsearch") {
        var phoneNumber = document.forms["customerSearch"]["CPnum"].value;

        if (phoneNumber.length !== 10) {
            alert("Phone number must be 10 digits long");
            return false; 
        }
    }

    return true; 
}

function faqvalidation() {
    var category = document.forms["faqvali"]["category"].value;
    var subject = document.forms["faqvali"]["ksubject"].value;
    var message = document.forms["faqvali"]["kcontent"].value; 
    
    if (category == "") {
        alert("Category must be selected");
        return false;
    } else if (subject == "") {
        alert("Subject must be filled out");
        return false;
    } else if (message == "") {
        alert("Message must be filled out");
        return false;
    }
    return true;
}





