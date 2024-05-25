<?php
require_once 'Komponen.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $komponen = new Komponen();
    $komponen->delete($id);

    header('Location: index.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
?>