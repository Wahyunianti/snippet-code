<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Komponen Unicodes</title>
</head>
<body>
    <div class="container">
        <div class="sidebar">
        <?php include 'sidebar.php'; ?>
        </div>
        <div class="main">
            <nav><p>Welcome Unicodes</p><p class="keterangan">Selamat datang !</p></nav>
            <div class="content">
                <img class="img-home" src="unicorn.png" alt="">
                <p>Total Ada <?= htmlspecialchars($total_rows) ?> Komponen Kode Snippets</p>
            </div>
            <footer><p>@Unicodes2024</p></footer>
        </div>
    </div>
</body>
</html>