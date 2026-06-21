<?php

include 'connect.php';
session_start();

define('UPLPATH', 'img/');

$kategorija = $_GET['id'];

$sql = "SELECT * FROM vijesti WHERE kategorija=? AND arhiva=0 ORDER BY id DESC";

$stmt = mysqli_prepare($dbc, $sql);
mysqli_stmt_bind_param($stmt, "s", $kategorija);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $kategorija; ?></title>

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
    <a href="registracija.php">REGISTRACIJA</a>

<?php } ?>
</div>

    <nav>
        <ul>
            <li><a href="index.php">HOME</a></li>

            <li>
                <a href="kategorija.php?id=Parisien">
                    PARISIEN
                </a>
            </li>

            <li>
                <a href="kategorija.php?id=Vivre Mieux">
                    VIVRE MIEUX
                </a>
            </li>

            <li>
                <a href="administrator.php">
                    ADMINISTRACIJA
                </a>
            </li>

            <li>
                <a href="unos.php">
                    UNOS
                </a>
            </li>
        </ul>
    </nav>

</header>

<main>

    <section class="category">

       <h2><?php echo htmlspecialchars(strtoupper($kategorija)); ?></h2>

        <div class="news-grid">

            <?php

            if(mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
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
            else
            {
                echo "<p>Nema vijesti u ovoj kategoriji.</p>";
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