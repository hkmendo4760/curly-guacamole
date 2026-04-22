// Shortcut function shown in class
var $ = function (id) {
    return document.getElementById(id);
};

window.onload = function () {

    $("calcBtn").onclick = function () {

        var name = $("firstname").value;
        var age = $("age").value;
        var hours = $("hours").value;

        // Calculate years slept
        var yearsSlept = age * (hours / 24);

        // Round to nearest integer
        yearsSlept = Math.round(yearsSlept);

        // Build message
        var message = "Hi " + name +
            ". You have slept " +
            yearsSlept +
            " years of your life away.";

        // Display message
        $("mymsg").innerHTML = message;

        // Change color and size by assigning a class
        $("mymsg").className = "bluetext";
    };
};