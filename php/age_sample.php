<!DOCTYPE HTML>
<html>
    <head>
    <title>308 Assigning Values</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">    
    </head>
<body>
    <header>
    <h3> Success!</h3>
    </header>
    
    <?php
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];

        $fullname = "$firstname  $lastname";
        $factor = 5;
        $ageIn5Years = $age + $factor;
        $currentYear = date('Y');
        $birthYear = $currentYear - $ageIn5Years;
        
        print "<p>Congratulations $fullname";
        print "and you say your age is $age";
        print "but I bet you are really $ageIn5Years";
        print "and were born in $birthYear.</p>";
    ?>
    <p>You've just written your second PHP script.</p>
    <footer>
    <p>Copyright &copy; 2024 (Hector Mendoza)</p>
    </footer>
</body>
</html>