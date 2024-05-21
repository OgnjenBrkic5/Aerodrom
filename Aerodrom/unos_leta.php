<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unos leta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
<?php
include './php/bazapod.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $broj_leta = $_POST['broj_leta'];
    $polazni_grad = $_POST['polazni_grad'];
    $dolazni_grad = $_POST['dolazni_grad'];
    $vreme_polaska = $_POST['vreme_polaska'];
    $vreme_dolaska = $_POST['vreme_dolaska'];
    $avion_id = $_POST['avion_id'];

    $sql = "INSERT INTO letovi (broj_leta, polazni_grad, dolazni_grad, vreme_polaska, vreme_dolaska, avion_id) VALUES 
    ('$broj_leta', '$polazni_grad', '$dolazni_grad', '$vreme_polaska', '$vreme_dolaska', '$avion_id')";
    if (mysqli_query($conn, $sql)) {
        echo "Novi let je uspesno dodat!";
        header("Location: index.php");
        exit();
    } else {
        echo "Greska: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
   
}
?>

<div class = "container mt-5">
    <h2 class="mt-5 mb-3">Dodaj novi let</h2>
    <form action="unos_leta.php" method="post" class="mb-5">
        <div class="form-group">
            <label for="broj_leta">Broj leta</label>
            <input type="text" class="form-control" id="broj_leta" name="broj_leta" required>
        </div>
        <div class="form-group">
            <label for="polazni_grad">Polazni grad</label>
            <input type="text" class="form-control" id="polazni_grad" name="polazni_grad" required>
        </div>
        <div class="form-group">
            <label for="dolazni_grad">Dolazni grad</label>
            <input type="text" class="form-control" id="dolazni_grad" name="dolazni_grad" required>
        </div>
        <div class="form-group">
            <label for="vreme_polaska">Vreme polaska</label>
            <input type="datetime-local" class="form-control" id="vreme_polaska" name="vreme_polaska" required>
        </div>    
        <div class="form-group">
            <label for="vreme_dolaska">Vreme dolaska</label>
            <input type="datetime-local" class="form-control" id="vreme_dolaska" name="vreme_dolaska" required>
        </div>
        <div class="form-group">
            <label for="avion_id">Avion ID</label>
            <input type="number" class="form-control" id="avion_id" name="avion_id" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj let</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>