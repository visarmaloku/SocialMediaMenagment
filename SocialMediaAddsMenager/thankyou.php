<?php
include('db.php');
$plan = isset($_GET['plan']) ? $_GET['plan'] : "Social";
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <title>Faleminderit! | Social Ads Manager</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { background: #0f172a; color: white; font-family: sans-serif; }
        .success-container { max-width: 700px; margin: 50px auto; background: #1e293b; padding: 40px; border-radius: 15px; border-top: 5px solid #6366f1; }
        .form-group { margin-bottom: 20px; text-align: left; }
        label { display: block; margin-bottom: 8px; color: #94a3b8; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 12px; border-radius: 8px; border: 1px solid #334155; background: #0f172a; color: white; box-sizing: border-box; }
        .btn-submit { background: #6366f1; color: white; padding: 15px; border: none; border-radius: 8px; width: 100%; cursor: pointer; font-weight: bold; font-size: 16px; }
        .highlight { color: #6366f1; }
    </style>
</head>
<body>

    <div class="success-container">
        <h1 style="font-size: 2.5rem;">Faleminderit! 🎉</h1>
        <p>Pagesa juaj për paketën <span class="highlight"><strong><?php echo $plan; ?></strong></span> u krye me sukses.</p>
        <hr style="border: 0; border-top: 1px solid #334155; margin: 30px 0;">
        
        <h3>Plotësoni Detajet e Shërbimit</h3>
        <p style="color: #94a3b8;">Na jepni informacionet e nevojshme që të fillojmë punën sa më parë.</p>

        <form action="save_details.php" method="POST">
            <input type="hidden" name="plan" value="<?php echo $plan; ?>">

            <div class="form-group">
                <label>Linku i Faqes Zyrtare (Instagram/Facebook/Website)</label>
                <input type="url" name="business_link" placeholder="https://instagram.com/biznesi-juaj" required>
            </div>

            <div class="form-group">
                <label>Ku dëshironi të fokusohemi më shumë?</label>
                <select name="focus_platform">
                    <option value="instagram">Instagram (Reels & Growth)</option>
                    <option value="facebook">Facebook (Ads & Community)</option>
                    <option value="tiktok">TikTok (Viral Content)</option>
                    <option value="all">Të gjitha barabartë</option>
                </select>
            </div>

            <div class="form-group">
                <label>Cili është qëllimi kryesor (Goal)?</label>
                <select name="goal">
                    <option value="sales">Rritja e Shitjeve (Sales)</option>
                    <option value="followers">Rritja e Ndjekësve (Brand Awareness)</option>
                    <option value="leads">Mbledhja e Klientëve Potencialë (Leads)</option>
                </select>
            </div>

            <div class="form-group">
                <label>Buxheti i parashikuar për Reklama (Ads Budget) në muaj</label>
                <select name="ads_budget">
                    <option value="50-100">€50 - €100 / muaj</option>
                    <option value="100-500">€100 - €500 / muaj</option>
                    <option value="500+">Mbi €500 / muaj</option>
                </select>
            </div>

            <div class="form-group">
                <label>Përshkruani shkurtimisht audidencën tuaj (Kush janë klientët tuaj?)</label>
                <textarea name="audience" rows="4" placeholder="Psh: Femra 18-35 vjeç në Prishtinë që pëlqejnë modën..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Dërgo Detajet & Fillo Punën</button>
        </form>
    </div>

</body>
</html>