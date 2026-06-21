<?php
session_start();
include 'connect.php';

$uspjesnaPrijava = false;

/* LOGIN */
if(isset($_POST['prijava']))
{
    $username = $_POST['username'];
    $lozinka = $_POST['lozinka'];

    $sql = "SELECT korisnicko_ime, lozinka, razina
            FROM korisnik
            WHERE korisnicko_ime=?";

    $stmt = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        mysqli_stmt_bind_result(
            $stmt,
            $imeKorisnika,
            $lozinkaKorisnika,
            $razinaKorisnika
        );

        mysqli_stmt_fetch($stmt);

        if(
            mysqli_stmt_num_rows($stmt) > 0 &&
            password_verify($lozinka, $lozinkaKorisnika)
        )
        {
            $uspjesnaPrijava = true;

            $_SESSION['username'] = $imeKorisnika;
            $_SESSION['razina'] = $razinaKorisnika;

            header("Location: login.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Prijava</title>
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

    <a href="registracija.php">REGISTRACIJA</a>

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

<main class="form-container">

<?php if(isset($_SESSION['username'])) { ?>

    <h1>Već ste prijavljeni</h1>

    <p class="success-message">
        Prijavljeni ste kao <strong><?php echo $_SESSION['username']; ?></strong>
    </p>

    <div class="form-buttons">
        <a href="logout.php">
            <button type="button">Odjava</button>
        </a>
    </div>

<?php } else { ?>

    <h1>Prijava korisnika</h1>

    <?php
    if(isset($_POST['prijava'])){
        echo "<p class='error-message'>Pogrešno korisničko ime ili lozinka.</p>";
    }
    ?>

    <form method="POST">

        <div class="form-item">
            <label>Korisničko ime</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-item">
            <label>Lozinka</label>
            <input type="password" name="lozinka" required>
        </div>

        <div class="form-buttons">
            <button type="submit" name="prijava">Prijava</button>
        </div>

    </form>

<?php } ?>

</main>

<footer>
    © Le Parisien
    <br>
    Mihael Fuček | mfucek@tvz.hr | 2026
</footer>

</body>
</html>