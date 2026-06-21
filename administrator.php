<?php
session_start();
include 'connect.php';

define('UPLPATH', 'img/');

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
            $_SESSION['username'] = $imeKorisnika;
            $_SESSION['razina'] = $razinaKorisnika;
        }
    }
}

/* BRISANJE */
if(isset($_POST['delete']) && isset($_SESSION['razina']) && $_SESSION['razina'] == 1)
{
    $id = $_POST['id'];

    $sql = "DELETE FROM vijesti WHERE id=?";

    $stmt = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    }
}

/* IZMJENA */
if(isset($_POST['update']) && isset($_SESSION['razina']) && $_SESSION['razina'] == 1)
{
    $id = $_POST['id'];

    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 1 : 0;

    $sql = "UPDATE vijesti SET naslov=?, sazetak=?, tekst=?, kategorija=?, arhiva=? WHERE id=?";

    $stmt = mysqli_stmt_init($dbc);

    if(mysqli_stmt_prepare($stmt, $sql))
    {
        mysqli_stmt_bind_param($stmt, "ssssii",
            $title, $about, $content, $category, $archive, $id
        );

        mysqli_stmt_execute($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="hr">
<head>
<meta charset="UTF-8">
<title>Administracija</title>
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
    <li><a href="kategorija.php?id=Parisien">PARISIEN</a></li>
    <li><a href="kategorija.php?id=Vivre Mieux">VIVRE MIEUX</a></li>
    <li><a href="administrator.php">ADMINISTRACIJA</a></li>
    <li><a href="unos.php">UNOS</a></li>
</ul>
</nav>

</header>

<main class="admin-container">

<?php if(isset($_SESSION['username']) && $_SESSION['razina'] == 1) { ?>

    <h1>Administracija vijesti</h1>

    <?php
    $query = "SELECT * FROM vijesti";
    $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_array($result)) {
    ?>

    <form method="POST">

        <div class="form-item">
            <label>Naslov vijesti</label>
            <input type="text" name="title" value="<?php echo $row['naslov']; ?>">
        </div>

        <div class="form-item">
            <label>Sažetak</label>
            <textarea name="about"><?php echo $row['sazetak']; ?></textarea>
        </div>

        <div class="form-item">
            <label>Sadržaj</label>
            <textarea name="content"><?php echo $row['tekst']; ?></textarea>
        </div>

        <div class="form-item">
            <label>Kategorija</label>
            <select name="category">
                <option value="Parisien" <?php if($row['kategorija']=="Parisien") echo "selected"; ?>>Parisien</option>
                <option value="Vivre Mieux" <?php if($row['kategorija']=="Vivre Mieux") echo "selected"; ?>>Vivre Mieux</option>
            </select>
        </div>

        <div class="form-item">
            <label>
                <input type="checkbox" name="archive" <?php if($row['arhiva']==1) echo "checked"; ?>>
                Arhiviraj vijest
            </label>
        </div>

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-buttons">
            <button type="submit" name="update">Izmijeni</button>
            <button type="submit" name="delete">Izbriši</button>
        </div>

        <hr>

    </form>

    <?php } ?>

<?php } elseif(isset($_SESSION['username']) && $_SESSION['razina'] == 0) { ?>

    <h1>Pristup administraciji</h1>
    <p class="error-message">
            Nemate administratorska prava za pristup administraciji.
        </p>

        <div class="form-buttons">
            <a href="index.php">
                <button type="button">POVRATAK NA POČETNU</button>
            </a>
        </div>

<?php } else { ?>

    <h1>Pristup administraciji</h1>

    <p class="error-message">
        Morate biti prijavljeni za pristup administraciji.
    </p>

    <div class="form-buttons">
        <a href="login.php"><button type="button">PRIJAVA</button></a>
        <a href="registracija.php"><button type="button">REGISTRACIJA</button></a>
    </div>

<?php } ?>

</main>

<footer>
© Le Parisien
<br>
Mihael Fuček | mfucek@tvz.hr | 2026
</footer>

</body>
</html>

<?php mysqli_close($dbc); ?>