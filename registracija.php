<?php
include 'connect.php';
define('UPLPATH','img/');

$msg = "";
$registriranKorisnik = false;

if(isset($_POST['registracija'])){

    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $passRep = $_POST['passRep'];

    if($pass != $passRep){

        $msg = "Lozinke nisu jednake!";

    } else {

        $sql = "SELECT korisnicko_ime
                FROM korisnik
                WHERE korisnicko_ime=?";

        $stmt = mysqli_stmt_init($dbc);

        if(mysqli_stmt_prepare($stmt,$sql)){

            mysqli_stmt_bind_param($stmt,"s",$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if(mysqli_stmt_num_rows($stmt) > 0){

                $msg = "Korisničko ime već postoji!";

            } else {

                $hashed_password =
                    password_hash($pass, PASSWORD_BCRYPT);

                $razina = 0;

                $sql = "INSERT INTO korisnik
                        (ime, prezime, korisnicko_ime, lozinka, razina)
                        VALUES (?, ?, ?, ?, ?)";

                $stmt = mysqli_stmt_init($dbc);

                if(mysqli_stmt_prepare($stmt,$sql)){

                    mysqli_stmt_bind_param(
                        $stmt,
                        "ssssi",
                        $ime,
                        $prezime,
                        $username,
                        $hashed_password,
                        $razina
                    );

                    mysqli_stmt_execute($stmt);

                    $registriranKorisnik = true;
                }
            }
        }
    }
}
?>

<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija | Le Parisien</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<header>


<div class="logo">
    <a href="index.php">
        <img src="img/logo.png" alt="Le Parisien">
    </a>
</div>
<div class="user-links">
<?php if(isset($_SESSION['username'])) { ?>

    <a href="logout.php">ODJAVA</a>

<?php } else { ?>

    <a href="login.php">PRIJAVA</a>

<?php } ?>
</div>

<nav>
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="kategorija.php?id=Parisien">PARISIEN</a></li>
        <li><a href="kategorija.php?id=Vivre Mieux">VIVRE MIEUX</a></li>
        <li><a href="administrator.php">ADMINISTRACIJA</a></li>
        <li><a href="unos.php">UNOS</a></li>
    </ul>
</nav>


</header>

<main>


<div class="form-container">

    <?php if($registriranKorisnik){ ?>

        <h1>Registracija uspješna</h1>

        <p style="text-align:center; font-size:20px;">
            Korisnik je uspješno registriran.
        </p>

        <p style="text-align:center; margin-top:20px;">
            <a href="administrator.php">
                Prijavite se ovdje
            </a>
        </p>

    <?php } else { ?>

    <h1>Registracija korisnika</h1>

    <?php if($msg != ""){ ?>
        <p style="color:red; margin-bottom:20px;">
            <?php echo $msg; ?>
        </p>
    <?php } ?>

    <form method="POST">

        <div class="form-item">
            <label>Ime</label>
            <input type="text" name="ime" required>
        </div>

        <div class="form-item">
            <label>Prezime</label>
            <input type="text" name="prezime" required>
        </div>

        <div class="form-item">
            <label>Korisničko ime</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-item">
            <label>Lozinka</label>
            <input type="password" name="pass" required>
        </div>

        <div class="form-item">
            <label>Ponovite lozinku</label>
            <input type="password" name="passRep" required>
        </div>

        <div class="form-buttons">
            <button type="submit" name="registracija">
                Registracija
            </button>
        </div>

    </form>

    <?php } ?>

</div>

</main>

<footer>
    © Le Parisien
    <br>
    Mihael Fuček | mfucek@tvz.hr | 2026
</footer>

</body>
</html>
