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
            <nav>
                <p>Komponen</p>
                <p class="keterangan">Anda dapat menambahkan potongan kode favorit anda</p>
            </nav>
            <form class="content" method="post" enctype="multipart/form-data">
                <div class="isian">
                    <div class="box">
                        <div class="inputan">
                            <div class="judul">
                                <p>Tambah Data Komponen</p>
                            </div>
                            <div class="col" id="column">
                                <div class="row">
                                    <p>Judul</p>
                                    <input type="text" name="judul" id="" class="styled-input"
                                        placeholder="Judul Komponen">
                                </div>
                                <div class="row">
                                    <p>Keterangan</p>
                                    <input type="text" name="keterangan" id="" class="styled-input"
                                        placeholder="Keterangan Komponen">
                                </div>
                                <div class="row">
                                    <p>Masukan Potongan Kode</p>
                                </div>
                                <div class="snipcode" id="snipcode">                                    
                                    <div class="row">
                                        <p>Nama Kode</p>
                                        <input type="text" name="nama[]" id="" class="styled-input"
                                            placeholder="Nama Kode">
                                    </div>
                                    <div class="row">
                                        <p>Kode</p>
                                        <textarea name="kode[]" placeholder="Potongan Kode" class="styled-input" id=""></textarea>
                                    </div>
                                </div>
                                <div class="add-input">
                                    <a href="" id="gelas"><i class="fa-regular fa-circle-xmark addbaru"></i><span>
                                            <p>Tambah Kode</p>
                                        </span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <div class="image-upload">
                            <input onchange="previewFile()" type="file" id="file-input" name="image"
                                accept="image/jpeg, image/png">
                            <div class="cover">
                                <img id="previewImage" src="photo.png" alt="">
                                <label for="file-input" class="file-label">Upload Image</label>
                            </div>
                            <?php if (isset($errors['judul'])): ?>
                                <div class="cover">
                                    <p><?= htmlspecialchars($errors['judul']) ?></p>
                                </div>
                            <?php elseif (isset($errors['keterangan'])): ?>
                                <div class="cover">
                                <p><?= htmlspecialchars($errors['keterangan']) ?></p>
                                </div>                                
                            <?php elseif (isset($errors['image'])): ?>
                                <div class="cover">
                                <p><?= htmlspecialchars($errors['image']) ?></p>
                                </div>
                            <?php endif; ?><br>
                        </div>
                        <div class="submited">
                            <button type="submit" class="simpan">SIMPAN</button>
                        </div>
                    </div>
                </div>
            </form>
            <footer>
                <p>@Unicodes2024</p>
            </footer>
        </div>
    </div>
    <script src="scripts.js"></script>
</body>

</html>