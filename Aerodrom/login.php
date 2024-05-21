<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uloguj se</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div>
  <div class = "row">
            <div class = "col-md-6">
                <div class = "card">
                    <div class = "card-header">
                    <h1>Login</h1>
                    </div>
                    <div class = "card-body">
    <?php
session_start();
if (isset($_SESSION["korisnik"])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $lozinka = $_POST["password"];
    
    require "./php/bazapod.php";
    
    if (empty($email) || empty($lozinka)) {
        echo "<div class='alert alert-danger'>Popunite sva polja!</div>";
    } else{
    $sql = "SELECT * FROM korisnici WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $korisnik = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if ($korisnik) {
            if (password_verify($lozinka, $korisnik["lozinka"])) {
                $_SESSION["korisnik"] = $korisnik["email"];
                header("Location: index.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Lozinka se ne podudara!</div>";
            }
            
        } else {
            echo "<div class='alert alert-danger'>E-mail se ne podudara!</div>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "<div class='alert alert-danger'>Greška u pripremi upita: " . mysqli_error($conn) . "</div>";
    }
    
 }
    mysqli_close($conn);
}
?>
        <hr class="mb-3">
        <form action="login.php" method="post">
            <div class="form-group mb-3">
                <input type="email" placeholder="E-mail" name="email" class="form-control">
            </div>
            <div class="form-group mb-3">
                <input type="password" placeholder="Lozinka" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="submit" class="btn btn-primary">
            </div>
        </form>
</div>
        <div class = "card-footer">
        <div><p>Niste registrovani? <a href="registracija.php">Registrujte se ovde</a></p></div>
    </div>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>