<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div>
        <div class = "row">
            <div class = "col-md-6 offset-md-3">
                <div class = "card">
                    <div class = "card-header">
                    <h1>Registracija</h1>
                    </div>
                    <div class = "card-body">
    <?php
require "./php/bazapod.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['e-mail']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $repeat_password = mysqli_real_escape_string($conn, $_POST['repeat_password']);

    if (empty($fullname) || empty($email) || empty($password) || empty($repeat_password)) {
        echo "Sva polja moraju biti popunjena!";
    } elseif ($password != $repeat_password) {
        echo "Lozinke se ne poklapaju!";
    } else {
        $sql = "SELECT * FROM korisnici WHERE ime='$fullname' OR email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "Korisnik već postoji!";
        } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO korisnici (ime, email, lozinka) VALUES ('$fullname', '$email', '$hashed_password')";

        if (mysqli_query($conn, $sql)) {
            echo "Uspešno ste registrovani!";
            header("Location: index.php");
        } else {
            echo "Greška: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
}
?>
       <hr class = "mb-3">
        <form action="registracija.php" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="fullname" placeholder="Korisnik:">
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="e-mail" placeholder="E-mail:">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Lozinka:">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" name="repeat_password" placeholder="Ponovo lozinka:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Registruj se" name="submit">
            </div>
        </form>
    </div>
    <div class = "card-footer">
        <div><p>Imate nalog?<a href="login.php">Ulogujte se ovde</a></p></div>
    </div>
</div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>