<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "toor";
$dBName = "boodschappen";
$port = "8889";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName, $port);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
$sql = "SELECT idproduct, omschrijving FROM product";
$result = $conn->query($sql);

echo "<ul>";

if($result -> num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        echo "<li>".$row["omschrijving"]."</li>";
    }
} else{
    echo "No data found";
}

echo "</ul>";



