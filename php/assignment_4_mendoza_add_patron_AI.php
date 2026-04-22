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

/* ===============================
   Validation Function
=============================== */
function validateInput($firstname, $lastname, $email, $birthyear, $city)
{
    $errorFoundFlag = 'N';

    /* First Name */
    if ($firstname == "") {
        print "Error: You must enter a First Name<br>";
        $errorFoundFlag = 'Y';
    }

    /* Last Name */
    if ($lastname == "") {
        print "Error: You must enter a Last Name<br>";
        $errorFoundFlag = 'Y';
    }

    /* ===============================
       Email Validation (Step 9)
    =============================== */

    /* Trim whitespace */
    $email = trim($email);

    if ($email == "") {
        print "Error: You must enter your Email<br>";
        $errorFoundFlag = 'Y';
    }
    else {

        /* Exactly one @ */
        if (substr_count($email, '@') != 1) {
            print "Error: Email must contain exactly one @ symbol<br>";
            $errorFoundFlag = 'Y';
        }
        else {

            $emailParts = explode('@', $email);
            $local  = $emailParts[0];
            $domain = $emailParts[1];

            /* Local Part */
            if ($local == "" || strlen($local) > 32) {
                print "Error: Invalid email local part<br>";
                $errorFoundFlag = 'Y';
            }
            else {
                for ($i = 0; $i < strlen($local); $i++) {
                    $ch = $local[$i];
                    if (
                        !ctype_alpha($ch) &&
                        !ctype_digit($ch) &&
                        $ch != '.' &&
                        $ch != '!' &&
                        $ch != '#'
                    ) {
                        print "Error: Invalid character in email local part<br>";
                        $errorFoundFlag = 'Y';
                        break;
                    }
                }
            }

            /* Domain Part */
            if ($domain == "" || strlen($domain) > 32) {
                print "Error: Invalid email domain part<br>";
                $errorFoundFlag = 'Y';
            }
            else {

                if (strpos($domain, '.') === false) {
                    print "Error: Email domain must contain a period<br>";
                    $errorFoundFlag = 'Y';
                }
                else {

                    for ($i = 0; $i < strlen($domain); $i++) {
                        $ch = $domain[$i];
                        if (
                            !ctype_alpha($ch) &&
                            !ctype_digit($ch) &&
                            $ch != '.' &&
                            $ch != '-'
                        ) {
                            print "Error: Invalid character in email domain<br>";
                            $errorFoundFlag = 'Y';
                            break;
                        }
                    }

                    $domainParts = explode('.', $domain);
                    $tld = $domainParts[count($domainParts) - 1];

                    if (strlen($tld) < 2) {
                        print "Error: Email top-level domain must be at least 2 letters<br>";
                        $errorFoundFlag = 'Y';
                    }
                }
            }
        }
    }

    /* Birth Year */
    if ($birthyear == "") {
        print "Error: You must enter your Birth Year<br>";
        $errorFoundFlag = 'Y';
    }
    else if (!ctype_digit($birthyear)) {
        print "Error: Birth year must be numeric<br>";
        $errorFoundFlag = 'Y';
    }

    /* City */
    if ($city == "" || $city == "-" || strtolower($city) == "select") {
        print "Error: You must select a City<br>";
        $errorFoundFlag = 'Y';
    }

    return $errorFoundFlag;
}

/* ===============================
   Main Program
=============================== */

$firstname = $_POST['firstname'];
$lastname  = $_POST['lastname'];
$email     = $_POST['email'];
$birthyear = $_POST['birthyear'];
$city      = $_POST['city'];

$errorFoundFlag = validateInput(
    $firstname,
    $lastname,
    $email,
    $birthyear,
    $city
);

if ($errorFoundFlag == 'Y') {
    print "<p>Go BACK and make corrections</p>";
    exit;
}

/* ===============================
   Business Logic
=============================== */

$fullname = $firstname . " " . $lastname;
$current_year = date('Y');
$age = $current_year - $birthyear;

if ($age <= 15) {
    $section = "Children";
}
else if ($age <= 54) {
    $section = "Adult";
}
else {
    $section = "Senior";
}

print "<p>Thank you for Registering!</p>";
print "<p>Name: $fullname</p>";
print "<p>Email: $email</p>";
print "<p>Section: $section</p>";

/* ===============================
   Write to File
=============================== */

$filename = 'data/patrons_AI.txt';

$fp = fopen($filename, 'a');

$output_line =
    $lastname . "|" .
    $firstname . "|" .
    $email . "|" .
    $city . "|" .
    $birthyear . "\n";

fwrite($fp, $output_line);
fclose($fp);

?>

<p>
  For Admin Use Only:
  <a href="assignment_4_view_patrons_AI.php">
    <span style="text-decoration: underline; color: blue;">
      View Patrons
    </span>
  </a>
</p>

</div>
</body>
</html>