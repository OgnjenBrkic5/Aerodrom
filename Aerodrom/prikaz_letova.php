<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz letova</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">

<h2>Prikaz Letova</h2>
<table class="table table-bordered">
    <thead>
        <tr>
        <th>ID</th>    
        <th>Broj leta</th>
        <th>Polazni grad</th>
        <th>Dolazni grad</th>
        <th>Vreme polaska</th>
        <th>Vreme dolaska</th>
        <th>Avion ID</th>
        </tr>
    </thead>
    <tbody>

<?php
require_once "./php/bazapod.php";

// Proveri konekciju
if (!$conn) {
    die("Konekcija nije uspela: " . mysqli_connect_error());
}

$sql = "SELECT * FROM letovi";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("SQL greška: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    while ($let = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $let['id'] . "</td>";
        echo "<td>" . $let['broj_leta'] . "</td>";
        echo "<td>" . $let['polazni_grad'] . "</td>";
        echo "<td>" . $let['dolazni_grad'] . "</td>";
        echo "<td>" . $let['vreme_polaska'] . "</td>";
        echo "<td>" . $let['vreme_dolaska'] . "</td>";
        echo "<td>" . $let['avion_id'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>Nema letova u bazi</td></tr>";
}

mysqli_close($conn);
?>
    </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
