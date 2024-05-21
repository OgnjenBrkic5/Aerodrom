<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz Putnika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class = "container mt-5">
    <h2>Prikaz putnika</h2>
    <table class="table table-bordered">
    <thead>
        <tr>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Broj pasosa</th>
          <th>Let ID</th>
        </tr>
    </thead>
      <tbody>
    <?php
require_once "./php/bazapod.php";

$sql = "SELECT * FROM putnici";
$result = mysqli_query($conn, $sql);

while ($putnik = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
echo "<tr>";
echo "<td>" . $putnik['ime'] . "</td>";
echo "<td>" . $putnik['prezime'] . "</td>";
echo "<td>" . $putnik['broj_pasosa'] . "</td>";
echo "<td>" . $putnik['let_id'] . "</td>";
echo "</tr>";

}
mysqli_close($conn);
?>
      </tbody>
    </table>
  </div>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>