<?php
// Parametrat e lidhjes me serverin lokal XAMPP
$host = "localhost";
$user = "root"; // Përdoruesi standard i XAMPP
$pass = "";     // Fjalëkalimi standard i XAMPP (i zbrazët)
$db   = "social_db"; // Emri i databazës që krijuam në phpMyAdmin

// Krijimi i lidhjes me portin 3307
$conn = mysqli_connect($host, $user, $pass, $db, 3307);

// Kontrolli i lidhjes - Kërkesë e Syllabusit për trajtimin e gabimeve
if (!$conn) {
    // Në rast dështimi, shfaqet gabimi teknik
    die("Lidhja me bazën e të dhënave dështoi: " . mysqli_connect_error());
}

// Konfigurimi i kodimit për të mbështetur karakteret shqipe
mysqli_set_charset($conn, "utf8mb4");

// Ky skedar do të përfshihet (include) në index.php dhe auth.php
?>