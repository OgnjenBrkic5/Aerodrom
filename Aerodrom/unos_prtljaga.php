<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Unos prtljaga</title>
</head>
<body>
<div class="container mt-5">
<?php
include ("./php/bazapod.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sifra_prtljaga = $_POST['sifra_prtljaga'];
    $tezina = $_POST['tezina'];
    $putnik_id = $_POST['putnik_id'];

    $sql = "INSERT INTO prtljag (sifra_prtljaga, tezina, putnik_id) VALUES ('$sifra_prtljaga', '$tezina', '$putnik_id')";

    if (mysqli_query($conn, $sql)) {
        echo "Novi prtljag je uspešno dodat!";
    } else {
        echo "Greška: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: index.php");
    exit();
}
?>

    <h2 class="mt-5 mb-3">Unesi novi prtljag</h2>
    
   
    <form action="unos_prtljaga.php" method="post" class="mb-5">

        <div class="form-group">
            <label for="sifra_prtljaga">Sifra prtljaga</label>
            <input type="text" class="form-control" id="sifra_prtljaga" name="sifra_prtljaga" required>
        </div>

        <div class="form-group">
            <label for="tezina">Težina (kg)</label>
            <input type="number" class="form-control" id="tezina" name="tezina" required>
        </div>

        <div class="form-group">
            <label for="putnik_id">ID putnika</label>
            <input type="number" class="form-control" id="putnik_id" name="putnik_id" required>
        </div>
        <hr class = "mb-3">
        <button type="submit" class="btn btn-primary">Dodaj prtljag</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>