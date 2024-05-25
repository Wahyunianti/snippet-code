<?php
require 'Komponen.php';

$kpn = new Komponen();
$rd_kpn = $kpn->read();
$total_rows = $kpn->getBaris();
$current_kpn = null;
$current_data = [];
$errors = [];
$judul = '';
$keterangan = '';
$image = '';

$id = $_GET['id'] ?? null;
if ($id !== null) {
    $current_kpn = $kpn->getKomponenById($id);
    $current_data = $kpn->getDataById($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode_array = $_POST['kode'];
    $nama_array = $_POST['nama'];

    if (empty($_POST['judul'])) {
        $errors['judul'] = 'Mohon isi judul.';
    } else {
        $judul = $_POST['judul'];
    }

    if (empty($_POST['keterangan'])) {
        $errors['keterangan'] = 'Mohon isi keterangan.';
    } else {
        $keterangan = $_POST['keterangan'];
    }
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($_FILES['image']['tmp_name']);
        if (!in_array($fileType, $allowedTypes)) {
            $errors['image'] = 'Only JPG, PNG, and GIF files are allowed.';
        } else {
            $image = basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $image);
        }
    }

    if (empty($errors)) {
        $kpn->create($judul, $keterangan, $image);
        if (is_array($nama_array) && is_array($kode_array)) {
            for ($i = 0; $i < count($kode_array); $i++) {
                $nama = $nama_array[$i];
                $kode = $kode_array[$i];
                if (!empty($kode) && !empty($nama)) {
                    $kpn->createDataKode($kode, $nama);
                }
            }
        } else {
            echo "Error: nama and kode must be arrays.";
        }

        header('Location: index.php');
        exit;
    }
}
?>

<div class="image">
    <a href="index.php">
        <img class="img-bar" src="astronaut.png" alt="dashboard">
    </a>
</div>
<div class="komponen">
    <p>Komponen</p>
</div>
<div class="isi">
    <?php foreach ($rd_kpn as $kpn): ?>
        <div class="arayy">
            <a href="tampil_komponen.php?id=<?= $kpn['id'] ?>">
                <p><?= htmlspecialchars($kpn['judul']) ?></p>
            </a><span><a href="delete.php?id=<?= $kpn['id'] ?>" id="deleteBtn"><i class="fa-solid fa-trash"></i></a></span>
        </div>
    <?php endforeach; ?>
    <div class="delbtn">
        <a href="tambah_komponen.php"><i class="fa-regular fa-circle-xmark addbaru"></i></a>
    </div>
</div>

