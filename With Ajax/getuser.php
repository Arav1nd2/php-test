<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];
include_once 'connect.php';
$sql="SELECT * FROM test WHERE name = '".$q."'";
$result = mysqli_query($conn,$sql);
if ($result) {


echo "<table>
<tr>
<th>Name</th>
<th>Phone number</th>
<th>E-Mail</th>
</tr>";
$row = mysqli_fetch_array($result) ;
    $f1 = $row[0];
    $f2 = $row[1];
    $f3 = $row[2];
    echo "<tr>";
    echo "<td>" .$f1. "</td>";
    echo "<td>" .$f2. "</td>";
    echo "<td>" .$f3. "</td>";
    echo "</tr>";

echo "</table>";
mysqli_close($conn);
}
?>
</body>
</html>