var $ = function(id) {
    return document.getElementById(id);
};

// Enhancement: Function to handle capitalization and trimming
var formatName = function(name) {
    // Trim whitespace
    var trimmed = name.trim();
    if (trimmed.length === 0) return "";
    
    // Capitalize first letter, lowercase the rest
    return trimmed.charAt(0).toUpperCase() + trimmed.slice(1).toLowerCase();
};

var addPatron = function() {
    // Enhancement: Trim and Capitalize names before validation/submission
    $("firstname").value = formatName($("firstname").value);
    $("lastname").value = formatName($("lastname").value);

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

    // Reset background colors to white on clear
    var inputs = document.querySelectorAll("input[type='text'], select");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].style.backgroundColor = "white";
    }

    $("firstname").focus();
};

// Enhancement: Functions for focus/blur background changes
var setFocus = function() {
    this.style.backgroundColor = "yellow";
};

var clearFocus = function() {
    this.style.backgroundColor = "white";
};

window.onload = function() {
    $("addpatron").onclick = addPatron;
    $("clearfields").onclick = clearFields;

    // Enhancement: Attach focus and blur events to all input fields
    var inputs = document.querySelectorAll("input[type='text'], select");
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].onfocus = setFocus;
        inputs[i].onblur = clearFocus;
    }

    $("firstname").focus();
};