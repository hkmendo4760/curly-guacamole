<!DOCTYPE HTML>
<html>
    <head>
    <title>0303 HTML Forms</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css">    
    </head>
<body>
    <header>
    <h3> Success!</h3>
    </header>
    
    <?php
        $firstname = $_POST['firstname'];
        print "<p>Congratulations $firstname</p>";
    ?>
    <p>You've just written your first PHP script.</p>
    <footer>
    <p>Copyright &copy; 2024 (Hector Mendoza)</p>
    </footer>
</body>
</html>