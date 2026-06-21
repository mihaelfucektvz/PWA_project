<?php
session_start();
include 'connect.php';

define('UPLPATH','img/');

$id = (int)$_GET['id'];

$query = "SELECT * FROM vijesti WHERE id=$id";

$result = mysqli_query($dbc,$query);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['naslov']; ?></title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>

    <div class="logo">
        <a href="index.php">
            <img src="img/logo.png" alt="Le Parisien">
        </a>
    </div>

    <!-- 🔥 LOGIN / REGISTRACIJA / ODJAVA -->
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

<main class="article-container">

    <h1><?php echo $row['naslov']; ?></h1>

    <p class="article-date">
        <?php echo $row['datum']; ?>
    </p>

    <img
        src="<?php echo UPLPATH . $row['slika']; ?>"
        alt="<?php echo $row['naslov']; ?>"
        class="article-image">

    <p class="article-lead">
        <?php echo $row['sazetak']; ?>
    </p>

    <div class="article-content">
        <?php echo nl2br($row['tekst']); ?>
    </div>

</main>

<footer>
    © Le Parisien
    <br>
    Mihael Fucek | mfucek@tvz.hr | 2026
</footer>

</body>
</html>