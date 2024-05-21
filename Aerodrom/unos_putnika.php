<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Unos putnika</title>
</head>
<body>
<?php
include ("./php/bazapod.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $broj_pasosa = $_POST['broj_pasosa'];
    $let_id = $_POST['let_id'];
    $sql_pr = "SELECT * FROM putnici WHERE ime = '$ime' OR prezime = '$prezime' OR broj_pasosa = '$broj_pasosa'";
    $result_pr = mysqli_query($conn, $sql_pr);
    if (mysqli_num_rows($result_pr) > 0) {
        echo "Putnik vec postoji!";
        header("Location: index.php");
        exit();
    } else {

    $sql = "INSERT INTO putnici (ime, prezime, broj_pasosa, let_id) VALUES ('$ime', '$prezime', '$broj_pasosa', '$let_id')";

    if (mysqli_query($conn, $sql)) {
        echo "Novi putnik je uspesno dodat!";
    } else {
        echo "Greska: " . $sql . "<br>" . mysqli_error($conn);
} mysqli_close($conn);
    header("Location: index.php");
    exit();
}
}
?>
    <div class = "container mt-5">
      <h2 class="mt-5 mb-3">Unesi novog putnika</h2>
        <form action="unos_putnika.php" method="post" class="mb-5">
    <div class="form-group">
        <label for="ime">Ime</label>
        <input type="text" class="form-control" id="ime" name="ime" required>
    </div>
    <div class="form-group">
        <label for="prezime">Prezime</label>
        <input type="text" class="form-control" id="prezime" name="prezime" required>
    </div>

    <div class="form-group">
        <label for="broj_pasosa">Broj pasosa</label>
        <input type="text" class="form-control" id="broj_pasosa" name="broj_pasosa" required>
    </div>

    <div class="form-group">
        <label for="let_id">ID leta</label>
        <input type="number" class="form-control" id="let_id" name="let_id" required>
     </div>
     <hr class = "mb-3">
      <button type="submit" class="btn btn-primary">Unesi novog putnika</button>
        </form>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>