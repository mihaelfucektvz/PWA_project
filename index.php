<?php
include 'connect.php';
session_start();

define('UPLPATH', 'img/');

/* funkcija za dohvat vijesti po kategoriji */
function getVijesti($dbc, $kategorija)
{
    $sql = "SELECT * FROM vijesti WHERE kategorija=? AND arhiva=0 ORDER BY id DESC LIMIT 3";

    $stmt = mysqli_stmt_init($dbc);

    $result = false;

    if(mysqli_stmt_prepare($stmt, $sql)) {

        mysqli_stmt_bind_param($stmt, "s", $kategorija);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
    }

    return $result;
}

/* dvije kategorije */
$resultParisien = getVijesti($dbc, 'Parisien');
$resultVivre = getVijesti($dbc, 'Vivre Mieux');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Parisien</title>

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
            <a href="logout.php">Odjava</a>
        <?php } else { ?>
            <a href="login.php">Prijava</a>
            <a href="registracija.php">Registracija</a>
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

<section class="category">

<h2>PARISIEN</h2>

<div class="news-grid">

<?php
if($resultParisien && mysqli_num_rows($resultParisien) > 0)
{
    while($row = mysqli_fetch_assoc($resultParisien))
    {
?>

<a href="clanak.php?id=<?php echo $row['id']; ?>" class="news-card">

    <img src="<?php echo UPLPATH . $row['slika']; ?>" alt="<?php echo $row['naslov']; ?>">

    <h3>
        <?php echo $row['naslov']; ?>
    </h3>

</a>

<?php
    }
}
?>

</div>
</section>

<section class="category">

<h2>VIVRE MIEUX</h2>

<div class="news-grid">

<?php
if($resultVivre && mysqli_num_rows($resultVivre) > 0)
{
    while($row = mysqli_fetch_assoc($resultVivre))
    {
?>

<a href="clanak.php?id=<?php echo $row['id']; ?>" class="news-card">

    <img src="<?php echo UPLPATH . $row['slika']; ?>" alt="<?php echo $row['naslov']; ?>">

    <h3>
        <?php echo $row['naslov']; ?>
    </h3>

</a>

<?php
    }
}
?>

</div>
</section>

</main>

<footer>
    © Le Parisien
    <br>
    Mihael Fuček | mfucek@tvz.hr | 2026
</footer>

</body>
</html>