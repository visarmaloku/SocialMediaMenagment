<?php
session_start();
include('db.php');

// SIGURIA: Nëse nuk je i loguar ose nuk je Admin, të kthen te login-i
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: auth.php");
    exit();
}

// LOGJIKA PËR FSHIRJE
if (isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    mysqli_query($conn, "DELETE FROM orders WHERE id = '$id'");
    header("Location: admin.php");
}

// MARRJA E TË DHËNAVE (Bashkojmë orders me users nëse duam të dimë kush e bëri)
$query = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Panel i Adminit | SocialGrowth</title>
    <style>
        body { background: #0f172a; color: white; font-family: sans-serif; padding: 40px; }
        .dashboard { max-width: 1100px; margin: 0 auto; }
        header { display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #334155; padding-bottom: 20px; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; background: #1e293b; border-radius: 10px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #334155; font-size: 14px; }
        th { background: #334155; color: #6366f1; text-transform: uppercase; }
        .badge { background: #6366f1; padding: 4px 8px; border-radius: 4px; font-size: 11px; }
        .btn-delete { color: #f87171; text-decoration: none; font-weight: bold; }
        .logout { color: #94a3b8; text-decoration: none; font-size: 14px; }
        tr:hover { background: #2d3748; }
    </style>
</head>
<body>

    <div class="dashboard">
        <header>
            <h1>Paneli i Menaxhimit 📊</h1>
            <div>
                <span style="margin-right: 20px; color: #4ade80;">Admin: <?php echo $_SESSION['username']; ?></span>
                <a href="logout.php" class="logout">Dil nga sistemi</a>
            </div>
        </header>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paketa</th>
                    <th>Linku i Biznesit</th>
                    <th>Qëllimi (Goal)</th>
                    <th>Buxheti Ads</th>
                    <th>Veprime</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td>#<?php echo $row['id']; ?></td>
                    <td><span class="badge"><?php echo $row['plan_name']; ?></span></td>
                    <td><a href="<?php echo $row['business_link']; ?>" target="_blank" style="color: #6366f1;">Hap Faqen</a></td>
                    <td><?php echo $row['goal']; ?></td>
                    <td>€<?php echo $row['ads_budget']; ?></td>
                    <td>
                        <a href="admin.php?delete_id=<?php echo $row['id']; ?>" class="btn-delete" onclick="return confirm('A jeni të sigurt?')">Fshij</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>