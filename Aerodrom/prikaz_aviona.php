<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prikaz aviona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class = "container mt-5">
        <h2>Prikaz aviona</h2>
<table class="table table-bordered">
    <thead>
        <tr>
        <th>ID Aviona</th>
        <th>Model</th>
        <th>Kapacitet</th>
</tr>
</thead>
<tbody>
    <?php
require_once "./php/bazapod.php";

$sql = "SELECT * FROM avioni";
$result = mysqli_query($conn, $sql);

while ($avion = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    
echo "<tr>";
echo "<td>" . $avion['id'] . "</td>";
echo "<td>" . $avion['model'] . "</td>";
echo "<td>" . $avion['broj_sedista'] . "</td>";
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