<!DOCTYPE HTML>
<html>
  <head>
    <title>Adding Patron</title>
    <link rel="stylesheet" type="text/css" href="KingLib_4.css">    
  </head>
<body>  
<header>
  <div class="logo-container"> 
    <img class="logo" 
         src="http://profperry.com/Classes20/PHPwithMySQL/KingLibLogo.jpg" 
         alt="King Real Estate Logo" />
  </div>   
</header>
    
<div class="form-wrapper">
     
<?php
   
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $birthyear = $_POST['birthyear'];
    $city      = $_POST['city'];


    $errorFoundFlag = 'N';


    if ($firstname == "") {
        print "Error: You must enter a First Name<br>";
        $errorFoundFlag = 'Y';
    }

    if ($lastname == "") {
        print "Error: You must enter a Last Name<br>";
        $errorFoundFlag = 'Y';
    }

    if ($email == "") {
        print "Error: You must enter your Email<br>";
        $errorFoundFlag = 'Y';
    }


    if ($birthyear == "") {
        print "Error: You must enter your Birth Year<br>";
        $errorFoundFlag = 'Y';
    } 
    else if (!ctype_digit($birthyear)) {
        print "Error: Birth year must be numeric<br>";
        $errorFoundFlag = 'Y';
    }


    if ($city == "" || $city == "-" || strtolower($city) == "select") {
        print "Error: You must select a City<br>";
        $errorFoundFlag = 'Y';
    }


    if ($errorFoundFlag == 'Y') {
        print "<p>Go BACK and make corrections</p>";
        exit;
    }

    $fullname = $firstname . " " . $lastname;
	$current_year = date('Y');
	$age = $current_year - $birthyear;


    if ($age <= 15) {
        $section = "Children";
    }
    else if ($age >= 16 && $age <= 54) {
        $section = "Adult";
    }
    else {
        $section = "Senior";
    }
    print "<p>Thank you for Registering!</p>";
    print "<p>Name: $fullname</p>";
    print "<p>Email: $email</p>";
    print "<p>Section: $section</p>";
?>
</div>

</body>
</html>