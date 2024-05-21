<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">   <title>Prikaz prtljaga</title>
</head>
<body>
    <div class = "container mt-5">
        <h2>Prikaz prtljaga</h2>
<table class="table table-stripped">
    <thead>
        <tr>
        <th>ID prtljaga</th>
        <th>Sifra prtljaga</th>
        <th>Tezina</th>
        <th>ID putnika</th>
</tr>
</thead>
<tbody>
    <?php
require_once "./php/bazapod.php";

$sql = "SELECT * FROM prtljag";
$result = mysqli_query($conn, $sql);

while ($prtljag = mysqli_fetch_array($result)) {
    
echo "<tr>";
echo "<td>" . $prtljag['id'] . "</td>";
echo "<td>" . $prtljag['sifra_prtljaga'] . "</td>";
echo "<td>" . $prtljag['tezina'] 
. "</td>";
echo "<td>" . $prtljag['putnik_id'] . "</td>";
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