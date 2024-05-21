<?php
session_start();
if (!isset($_SESSION["korisnik"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aerodromski informacioni sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav class = "navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#aerodr">Aerodrom</a>
        <button class = "navbar-toggler" type = "button" data-bs-toggle="collapse" data-bs-target = "#navbarNav" aria-controls = "navbarNav"
        aria-expanded = "false" aria label = "Toggle navigation">
          <span class = "navbar-toggler-icon"></span>
        </button>
        <div class = "collapse navbar-collapse" id = "navbarNav">
            <ul class = "navbar-nav">
                <li class = "nav-item">
                    <a class = "nav-link" href = "unos_leta.php">Unos leta</a>
                </li> 
                <li class = "nav-item">
                    <a class = "nav-link" href = "unos_putnika.php">Unos putnika</a>
                </li> 
                <li class = "nav-item">
                    <a class = "nav-link" href = "unos_prtljaga.php">Unos prtljaga</a>
                </li>    
                <li class = "nav-item">
                    <a class = "nav-link" href = "unos_aviona.php">Unos aviona</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "prikaz_letova.php">Prikaz letova</a>
                </li> 
                <li class = "nav-item">
                    <a class = "nav-link" href = "prikaz_putnika.php">Prikaz putnika</a>
                <li class = "nav-item">
                    <a class = "nav-link" href = "prikaz_prtljaga.php">Prikaz prtljaga</a>
                </li> 
                <li class = "nav-item">
                    <a class = "nav-link" href = "prikaz_aviona.php">Prikaz aviona</a>
                </li>          
            </ul>    
            <ul class = "navbar-nav">
                <li class = "nav-item">
                    <a class = "nav-link btn btn-danger text-white" href = "./php/odjavljivanje.php">Odjavi se</a>
                </li>
            </ul>
        </div>
      </div>                                
    </nav>  

    <div class="container mt-5">
          <h1>Dobrodosli u Aerodromski informacioni sistem!</h1>
          <p>Upotrebom navigacionog bara iznad možete dodati nove podatke.</p>
      

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>