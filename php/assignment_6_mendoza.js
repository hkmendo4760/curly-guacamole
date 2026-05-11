var $ = function (id) {
    return document.getElementById(id);
};

function processInfo() {

    var firstName = $("firstname").value;
    var lastName = $("lastname").value;
    var numPets = $("num_pets").value; 
    
    var errorFoundFlag = 'N';

    if (firstName.length == 0) {
        $("firstname_error").firstChild.nodeValue = "Please enter first name";
        errorFoundFlag = 'Y';
    } else {
        $("firstname_error").firstChild.nodeValue = " ";
    }

    if (lastName.length == 0) {
        $("lastname_error").firstChild.nodeValue = "Please enter last name";
        errorFoundFlag = 'Y';
    } else {
        $("lastname_error").firstChild.nodeValue = " ";
    }

    if (numPets == "" || isNaN(numPets) || numPets < 0 || numPets > 3) {
        $("num_pets_error").firstChild.nodeValue = "Please enter the number of pets you have";
        errorFoundFlag = 'Y';
    } else {
        $("num_pets_error").firstChild.nodeValue = " ";
    }


    if (errorFoundFlag == 'N') {
        var today = new Date();
        var dateString = (today.getMonth() + 1) + "-" + today.getDate() + "-" + today.getFullYear();
        var formattedName = lastName + ", " + firstName;

        var myStoredPetNames = "";

        for (counter = 1; counter <= numPets; counter++) {
            myPetId = 'pet' + counter;
            myPetName = $(myPetId).value;

     
            if (myPetName.length > 0) {
             
                myStoredPetNames = myStoredPetNames + " Your Pet #" + counter + " is named " + myPetName + ".";
            }
        }

  
        var finalMsg = "Your Name is listed as " + formattedName + " and today's date is " + dateString + "." + myStoredPetNames;
    
        $("display_message").firstChild.nodeValue = finalMsg;
    }
}

window.onload = function () {
    $("mybutton").onclick = processInfo;
};