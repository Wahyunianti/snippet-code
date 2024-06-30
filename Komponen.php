<?php
require 'db.php';

class Komponen
{
    private $pdo;
    private $sharedUuid;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getConnection();
        $this->sharedUuid = $this->generateUuidV4();
    }

    private function generateUuidV4()
    {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    public function create($judul, $keterangan, $image)
    {
        $sql = "INSERT INTO komponen (id, judul, keterangan, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$this->sharedUuid, $judul, $keterangan, $image]);
    }

    public function createDataKode($kode, $nama)
    {
        $sql = "INSERT INTO data_kode (kode, nama, komponen_id) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$kode, $nama, $this->sharedUuid]);
    }

    public function read()
    {
        $sql = "SELECT * FROM komponen ORDER BY created_at DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBaris() {
        $sql = "SELECT COUNT(*) as total_rows FROM komponen";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $result ? $result['total_rows'] : 0;
    }
    public function delete($id)
    {
        $sql = "SELECT image FROM komponen WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        $photo = $stmt->fetchColumn();

        $sql = "DELETE FROM komponen WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        $sql2 = "DELETE FROM data_kode WHERE komponen_id = ?";
        $stmt2 = $this->pdo->prepare($sql2);
        $stmt2->execute([$id]);

        if ($photo && file_exists($photo)) {
            unlink($photo);
        }
    }

    public function getKomponenById($id)
    {
        $sql = "SELECT * FROM komponen WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDataById($id)
    {
        $sql = "SELECT * FROM data_kode WHERE komponen_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
