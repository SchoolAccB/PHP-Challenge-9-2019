<?php
session_start();

if (!isset($_SESSION['boodschappen'])) {
    $_SESSION['boodschappen'] = ["aardappelen", "aardbeien", "3 pakken melk", "yoghurt"];
}
?>

<form action="opdracht4.php" id="voegboodschap" method="post">
    <input type="text" name="boodschap" placeholder="Boerenkool">
    <button type="submit" name="verstuurboodschap">Verstuur</button>
</form>

<?php

if (isset($_POST["verstuurboodschap"])) {
    $nieuweBoodschap = $_POST["boodschap"];
    array_push($_SESSION['boodschappen'], $nieuweBoodschap);
}

echo "<ul>";

foreach ($_SESSION['boodschappen'] as $boodschap) {
    echo "<li>" . $boodschap . "</li>";
}
echo "</ul>";




