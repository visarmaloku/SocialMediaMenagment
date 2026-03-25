<?php
include('db.php');

// Aktivizojmë shfaqjen e gabimeve
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>
<html lang='sq'>
<head>
    <meta charset='UTF-8'>
    <title>Statusi i Porosisë</title>
    <style>
        body { 
            background: #0f172a; 
            color: white; 
            font-family: sans-serif; 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            margin: 0; 
            text-align: center;
        }
        .message-box { 
            background: #1e293b; 
            padding: 50px; 
            border-radius: 20px; 
            box-shadow: 0 10px 40px rgba(0,0,0,0.4);
            max-width: 500px;
            border: 1px solid #334155;
        }
        .success-icon { font-size: 60px; color: #4ade80; margin-bottom: 20px; }
        h2 { margin-top: 0; font-size: 24px; }
        p { color: #94a3b8; line-height: 1.6; margin-bottom: 30px; }
        .btn-home { 
            display: inline-block; 
            background: #6366f1; 
            color: white; 
            text-decoration: none; 
            padding: 15px 35px; 
            border-radius: 10px; 
            font-weight: bold; 
            transition: 0.3s ease;
        }
        .btn-home:hover { background: #4f46e5; transform: scale(1.05); }
    </style>
</head>
<body>
    <div class='message-box'>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastrimi i të dhënave
    $link = mysqli_real_escape_string($conn, $_POST['business_link']);
    $platform = mysqli_real_escape_string($conn, $_POST['focus_platform']);
    $goal = mysqli_real_escape_string($conn, $_POST['goal']);
    $budget = mysqli_real_escape_string($conn, $_POST['ads_budget']);
    $audience = mysqli_real_escape_string($conn, $_POST['audience']);
    $plan = mysqli_real_escape_string($conn, $_POST['plan']);
    
    // Ruajtja në Database
    $sql = "INSERT INTO orders (plan_name, business_link, focus_platform, goal, ads_budget, audience) 
            VALUES ('$plan', '$link', '$platform', '$goal', '$budget', '$audience')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='success-icon'>✔</div>
              <h2>U dërgua me sukses!</h2>
              <p>Faleminderit që na besuat biznesin tuaj. Ekipi ynë do të fillojë punën menjëherë dhe do t'ju kontaktojë brenda pak orësh.</p>";
    } else {
        echo "<div class='success-icon' style='color: #ef4444;'>✘</div>
              <h2>Ndodhi një gabim!</h2>
              <p>Të dhënat nuk u ruajtën: " . mysqli_error($conn) . "</p>";
    }
}

// Butoni që kërkove
echo "    <a href='index.php' class='btn-home'>Kthehu në Home</a>
    </div>
</body>
</html>";
?>