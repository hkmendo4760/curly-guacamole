<!DOCTYPE html>
<html>
<head>
    <title>View Patrons (Sorted)</title>
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
        .row1 { background-color: #ffffff; }
        .row2 { background-color: #e6e6e6; }
    </style>
</head>

<body>

<h2 style="text-align:left;">View Patrons - AI</h2>

<table>
<tr>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Email</th>
    <th>City</th>
    <th>Birth Year</th>
</tr>

<?php

$filename = 'data/patrons_AI.txt';

$patrons = array();

/* Read file into array */
if (file_exists($filename)) {

    $fp = fopen($filename, 'r');

    while (($line = fgets($fp)) !== false) {
        $line = trim($line);
        if ($line != "") {
            $patrons[] = $line;
        }
    }

    fclose($fp);
}

/* Sort by Last Name, First Name */
usort($patrons, function ($a, $b) {

    $aData = explode('|', $a);
    $bData = explode('|', $b);

    if ($aData[0] == $bData[0]) {
        return strcmp($aData[1], $bData[1]);
    }

    return strcmp($aData[0], $bData[0]);
});

/* Display sorted patrons */
$rowNum = 0;

foreach ($patrons as $line) {

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

if (count($patrons) == 0) {
    echo "<tr><td colspan='5' style='text-align:center;'>No patrons found</td></tr>";
}

?>

</table>

<p style="text-align:center;">
    <a href="assignment_4_mendoza_register_AI.html">Back to Registration</a>
</p>

</body>
</html>