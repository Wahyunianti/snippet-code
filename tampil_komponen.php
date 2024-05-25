<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/themes/prism-tomorrow.min.css" rel="stylesheet">

  <title>Komponen Unicodes</title>
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <?php include 'sidebar.php'; ?>
    </div>
    <?php if (is_array($current_kpn)): ?>
    <div class="main">
      <nav>      
        <p><?= htmlspecialchars($current_kpn['judul']) ?></p>
        <p class="keterangan">
        <?= htmlspecialchars($current_kpn['keterangan']) ?>
        </p>
      </nav>
      <div class="row2">
        <div class="content">
          <div class="isian">
          <?php if (is_array($current_data) && !empty($current_data)): ?>
          <?php foreach ($current_data as $index => $datakpn): ?>
            <?php if (is_array($datakpn)): ?>
            <div class="namaku">
              <div class="taglines">
                <p><?= htmlspecialchars($datakpn['nama']) ?></p>
                <span><button type="button" class="copy-button" data-index="<?= $index ?>">Copy</button></span>
              </div>
              <div class="isisnipet">
                    <pre>
                        <code id="code-block-<?= $index ?>" class="language-css">
                        <?= htmlspecialchars($datakpn['kode']) ?>
                        </code>
                    </pre>
              </div>
            </div>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php endif; ?>
          </div>
        </div>
        <div class="content">
          <div class="headline">
            <div class="psi">
             <?php if ($current_kpn): ?>
              <p><?= htmlspecialchars($current_kpn['judul']) ?></p>
             <?php else: ?>
              <p>Navbar CSS</p>
             <?php endif; ?>
            </div>
            <div class="gambar">
            <?php if (!empty($current_kpn['image'])): ?>
              <img style="margin-top: auto;
    margin-bottom: 60px;" src="<?= htmlspecialchars($current_kpn['image']) ?>" alt="" />
            <?php else: ?>
              <img style="margin-top: auto;
    margin-bottom: 60px;" src="image.png" alt="" />
             <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <footer>
        <p>@Unicodes2024</p>
      </footer>
    </div>        
    <?php endif; ?>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.28.0/prism.min.js"></script>
  <script src="scriptcode.js"></script>
</body>

</html>