<?php
session_start();

if(isset($_GET['verwijder'])) {
    $hulparray = [];
    foreach($_SESSION['boodschappen'] as $boodschap) {
        if($boodschap != $_GET['verwijder']) {
            $hulparray[] = $boodschap;
        }
    }
    $_SESSION['boodschappen'] = $hulparray;
}

if(isset($_GET['leegmaken']) && $_GET['leegmaken'] == 'ja') {
    $_SESSION['boodschappen'] = [];
}

if(!isset($_SESSION['boodschappen'])) {
    $_SESSION['boodschappen'] = ["aardappelen", "aardbeien", "3 pakken melk", "yoghurt"];
}
?>

<form action="opdracht5.php" id="voegboodschap" method="post">
    <input type="text" name="boodschap" placeholder="Boerenkool">
    <button type="submit" name="verstuurboodschap">Add</button>
    <button type="submit" name="emptyboodschappen">Empty</button>
</form>

<?php

if (isset($_POST["verstuurboodschap"])) {
    $nieuweBoodschap = $_POST["boodschap"];
    array_push($_SESSION['boodschappen'], $nieuweBoodschap);
}

if (isset($_POST["emptyboodschappen"])) {
    $_SESSION['boodschappen'] = [];
}

echo "<ul>";

foreach ($_SESSION['boodschappen'] as $b) {
    echo "<li><a href='opdracht5.php?verwijder=$b'>$b</a></li>";
}
echo "</ul>";