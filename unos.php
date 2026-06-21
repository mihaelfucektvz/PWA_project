<?php
session_start();
include 'connect.php';

$pristupDozvoljen = true;

if(
    !isset($_SESSION['username']) ||
    $_SESSION['razina'] != 1
)
{
    $pristupDozvoljen = false;
}

if(isset($_POST['submit'])){

    $picture = $_FILES['pphoto']['name'];

    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];

    $date = date('d.m.Y.');

    $archive = isset($_POST['archive']) ? 1 : 0;

    /* Upload slike */

    if(!empty($picture)){
        $target_dir = 'img/' . $picture;

        move_uploaded_file(
            $_FILES['pphoto']['tmp_name'],
            $target_dir
        );
    }

    /* PREPARED STATEMENT */

    $stmt = mysqli_prepare(
        $dbc,
        "INSERT INTO vijesti
        (
            datum,
            naslov,
            sazetak,
            tekst,
            slika,
            kategorija,
            arhiva
        )
        VALUES
        (?, ?, ?, ?, ?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ssssssi",
        $date,
        $title,
        $about,
        $content,
        $picture,
        $category,
        $archive
    );

    if(mysqli_stmt_execute($stmt)){
        echo "<h2>Vijest uspješno spremljena!</h2>";
    }
    else{
        echo "Greška: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Unos vijesti</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>

    <!-- LOGO -->
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

    <!-- NAVIGACIJA -->
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

<?php if(!$pristupDozvoljen) { ?>

    <h1>Pristup unosu</h1>

    <?php if(!isset($_SESSION['username'])) { ?>

        <p class="error-message">
            Morate biti prijavljeni za pristup unosu.
        </p>

        <div class="form-buttons">
            <a href="login.php">
                <button type="button">PRIJAVA</button>
            </a>

            <a href="registracija.php">
                <button type="button">REGISTRACIJA</button>
            </a>
        </div>

    <?php } else { ?>

        <p class="error-message">
            Nemate administratorska prava za pristup unosu.
        </p>

        <div class="form-buttons">
            <a href="index.php">
                <button type="button">POVRATAK NA POČETNU</button>
            </a>
        </div>

    <?php } ?>

<?php } else { ?>

    <h1>Nova vijest</h1>

    <!-- FORMA -->
    <form action="unos.php"
          method="POST"
          name="unos_vijesti"
          enctype="multipart/form-data">

        <div class="form-item">
            <label for="title">Naslov</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-item">
            <label for="about">Sažetak</label>
            <textarea id="about" name="about" rows="5" required></textarea>
        </div>

        <div class="form-item">
            <label for="content">Sadržaj</label>
            <textarea id="content" name="content" rows="10" required></textarea>
        </div>

        <div class="form-item">
            <label for="category">Kategorija</label>
            <select id="category" name="category">
                <option value="Parisien">Parisien</option>
                <option value="Vivre Mieux">Vivre Mieux</option>
            </select>
        </div>

        <div class="form-item">
            <label for="pphoto">Slika</label>
            <input type="file" id="pphoto" name="pphoto">
        </div>

        <div class="form-item checkbox">
            <input type="checkbox" id="archive" name="archive">
            <label for="archive">Sakrij članak</label>
        </div>

        <div class="form-buttons">
            <button type="reset">Odustani</button>
            <button type="submit" name="submit">Pošalji</button>
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