<?php
session_start();
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) > 0) {
        // LOGIN LOGIC
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // NDRYSHIMI: Ridrejtimi gjithmonë në index.php
            header("Location: index.php");
            exit();
        } else {
            $error = "Fjalëkalimi është i gabuar!";
        }
    } else {
        // SIGNUP LOGIC
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Regjistrimi si klient i thjeshtë
        $insert = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', 'client')";
        
        if (mysqli_query($conn, $insert)) {
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            $_SESSION['username'] = $username;
            $_SESSION['role'] = 'client';
            
            // NDRYSHIMI: Ridrejtimi gjithmonë në index.php
            header("Location: index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Hyrja | SocialGrowth</title>
    <style>
        body { background: #0f172a; color: white; font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .auth-container { background: #1e293b; padding: 40px; border-radius: 15px; width: 350px; border: 1px solid #334155; text-align: center; }
        input { width: 100%; padding: 12px; margin: 10px 0; border-radius: 8px; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #6366f1; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: bold; margin-top: 10px; }
        .error { color: #f87171; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="auth-container">
        <h2>Mirësevini</h2>
        <p style="color: #94a3b8; font-size: 14px;">Identifikohuni për të zhbllokuar të gjitha opsionet e faqes.</p>
        
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Email ose Username" required>
            <input type="password" name="password" placeholder="Fjalëkalimi" required>
            <button type="submit">Hyr në sistem</button>
        </form>
    </div>
</body>
</html>