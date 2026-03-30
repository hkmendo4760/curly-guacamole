<!DOCTYPE html>
<html>
<head>
    <title>View Patrons</title>
    <link rel="stylesheet" type="text/css" href="KingLib_4.css">

    <style>
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #cccccc;
        }

        .row1 {
            background-color: #ffffff;
        }

        .row2 {
            background-color: #e6e6e6;
        }
    </style>
</head>

<body>

<h2 style="text-align:center;">Registered Patrons</h2>

<table>
<tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Email</th>
    <th>City</th>
    <th>Birth Year</th>
</tr>

<?php
$filename = 'data/patrons.txt';

if (file_exists($filename)) {

    $fp = fopen($filename, 'r');
    $rowNum = 0;

    while (($line = fgets($fp)) !== false) {

        $line = trim($line);
        if ($line == "") continue;

        $data = explode('|', $line);

        $rowClass = ($rowNum % 2 == 0) ? 'row1' : 'row2';

        echo "<tr class='$rowClass'>";
        echo "<td>$data[0]</td>";
        echo "<td>$data[1]</td>";
        echo "<td>$data[2]</td>";
        echo "<td>$data[3]</td>";
        echo "<td>$data[4]</td>";
        echo "</tr>";

        $rowNum++;
    }

    fclose($fp);
}
else {
    echo "<tr><td colspan='5'>No patrons found</td></tr>";
}
?>

</table>

<p style="text-align:center;">
    <a href="assignment_4_mendoza_register.html">Back to Registration</a>
</p>

</body>
</html>