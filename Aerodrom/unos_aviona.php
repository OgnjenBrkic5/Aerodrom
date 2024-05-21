<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Unos aviona</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mt-5 mb-3">Dodaj novi avion</h2>

<?php
include './php/bazapod.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $model = $_POST['model'];
    $broj_sedista = $_POST['broj_sedista'];

    $sql = "INSERT INTO avioni (model, broj_sedista) VALUES 
    ('$model', '$broj_sedista')";
    if (mysqli_query($conn, $sql)) {
        echo "Novi avion je uspesno dodat!";
    } else {
        echo "Greska: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    header("Location: index.php");
    exit();
}
?>
    
    <form action="unos_aviona.php" method="post" class="mb-5">
        <div class="form-group">
            <label for="model">Model aviona</label>
            <input type="text" class="form-control" id="model" name="model" required>
        </div>
        <div class="form-group">
            <label for="broj_sedista">Broj sedišta</label>
            <input type="text" class="form-control" id="broj_sedista" name="broj_sedista" required>
        </div>
        <hr class="mb-3">
        <button type="submit" class="btn btn-primary">Dodaj avion</button>
    </form>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>