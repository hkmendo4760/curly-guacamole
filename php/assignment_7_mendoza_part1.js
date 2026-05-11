
var $ = function(id) {
    return document.getElementById(id);
};


var addPatron = function() {
 
    var isValid = validateItems();

    if (isValid) {
 
        $("myform").submit();
    } else {

        $("endmessage").innerHTML = "Patron Not Added!";
    }
};


var validateItems = function() {
    var isValid = true;


    var firstName = $("firstname").value;
    var lastName = $("lastname").value;
    var email = $("email").value;
    var city = $("city").value;
    var donation = $("donation").value;


    $("firstnameerror").innerHTML = "";
    $("lastnameerror").innerHTML = "";
    $("emailerror").innerHTML = "";
    $("cityerror").innerHTML = "";
    $("donationerror").innerHTML = "";
    $("endmessage").innerHTML = "";


    if (firstName === "") {
        $("firstnameerror").innerHTML = "Enter First Name";
        isValid = false;
    }

  
    if (lastName === "") {
        $("lastnameerror").innerHTML = "Enter Last Name";
        isValid = false;
    }

 
    if (email === "") {
        $("emailerror").innerHTML = "Enter Email";
        isValid = false;
    }

    if (city === "-") {
        $("cityerror").innerHTML = "Select a City from the list";
        isValid = false;
    }

    if (donation === "") {
        $("donationerror").innerHTML = "Enter Donation Amount";
        isValid = false;
    } else if (isNaN(donation)) {
        $("donationerror").innerHTML = "Donation must be numeric";
        isValid = false;
    }

    return isValid;
};


var clearFields = function() {

    $("firstname").value = "";
    $("lastname").value = "";
    $("email").value = "";
    $("donation").value = "";

 
    $("city").selectedIndex = 0;


    $("firstnameerror").innerHTML = "";
    $("lastnameerror").innerHTML = "";
    $("emailerror").innerHTML = "";
    $("cityerror").innerHTML = "";
    $("donationerror").innerHTML = "";
    $("endmessage").innerHTML = "";

    $("firstname").focus();
};


window.onload = function() {
    $("addpatron").onclick = addPatron;
    $("clearfields").onclick = clearFields;
    $("firstname").focus();
};