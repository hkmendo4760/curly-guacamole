<!DOCTYPE HTML>
<html>
    <head>
    <title>Adding Patron</title>
    <link rel="stylesheet" type="text/css" href="basic.css">    
    </head>
<body>
    <div id="logo">
        <img src="http://profperry.com/Classes20/PHPwithMySQL/KingLibLogo.jpg" alt="King Real Estate Logo">
    </div>

    <header>
    <h3> Thank You for Registering!</h3>
    </header>
    
    <?php
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $city = $_POST['city'];

        $fullname = $firstname . " " . $lastname;
              
        print "<p>Name: $fullname</p>";
        print "<p>Email: $email</p>";
        print "<p>City: $city</p>";
    ?>
   
    <footer>
    <p><br>Copyright &copy; 2026 (Hector Mendoza)</p>
    </footer>
</body>
</html>