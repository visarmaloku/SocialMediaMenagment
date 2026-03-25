<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Marrim të dhënat dhe i pastrojmë nga karakteret e rrezikshme
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);

    if (!empty($plan) && !empty($email)) {
        $sql = "INSERT INTO orders (plan_name, company_name, email, details) 
                VALUES ('$plan', '$company', '$email', '$details')";

        if (mysqli_query($conn, $sql)) {
            echo "<b style='color: #4ade80;'>Success! Porosia u ruajt me sukses.</b>";
        } else {
            echo "<b style='color: #ff4444;'>Gabim në MySQL: " . mysqli_error($conn) . "</b>";
        }
    } else {
        echo "Ju lutem plotësoni fushat kryesore.";
    }
}
mysqli_close($conn);
?>