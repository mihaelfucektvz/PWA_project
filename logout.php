<?php
session_start();

/* Briše sve SESSION varijable */
$_SESSION = array();

/* Uništava sesiju */
session_destroy();

/* Povratak na početnu stranicu */
header("Location: index.php");
exit();
?>