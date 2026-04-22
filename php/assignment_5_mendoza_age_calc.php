<!DOCTYPE HTML>
<html>
<head>
    <title>Assignment 5</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="basic.css">
</head>

<body>

<header class="assignment-header">
    Assignment 5
</header>

<?php

 $firstname = $_POST[''];
 $age = $_POST[''];
 $hours = $_POST[''];
 $message = "See Your Unconscious Life";
 $class = "greentext";

// Check if the form was submitted
if (isset($_POST['firstname'])) {

    $firstname = $_POST['firstname'];
    $age = $_POST['age'];
    $hours = $_POST['hours'];

    if ($age != "" && $hours != "") {
        $yearsSlept = round($age * ($hours / 24));
        $message = "Hi $firstname. You have slept $yearsSlept years of your life away.";
        $class = "textblue";
    }
}
?>

<main class="form-wrapper">

    <!-- ✅ FORM STAYS VISIBLE -->
    <form method="post" action="">

        <p>
            First Name:<br>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>" class="wide">
        </p>

        <p>
            Enter Your Age:<br>
            <input type="text" name="age" value="<?php echo htmlspecialchars($age); ?>" class="small">
        </p>

        <p>
            Hours Slept Each Night:<br>
            <input type="text" name="hours" value="<?php echo htmlspecialchars($hours); ?>" class="small">
        </p>

        <p>
            <input type="submit" value="Calculate Unconsciousness">
        </p>

    </form>


</main>


    <!-- ✅ MESSAGE UPDATES AND CHANGES COLOR -->
    <p id="mymsg" class="<?php echo $class; ?>">
        <?php echo $message; ?>
    </p>

</body>
</html>