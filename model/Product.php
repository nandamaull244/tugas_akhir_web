<?php
class Product {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function create($d) {
        $sql = "INSERT INTO produk
        (nama_produk, harga, is_available, stok_produk, deskripsi, id_kategori, id_brand, gambar)
        VALUES (?,?,?,?,?,?,?,?)";

        return $this->db->prepare($sql)->execute([
            $d['nama_produk'],
            $d['harga'],
            $d['is_available'],
            $d['stok_produk'],
            $d['deskripsi'],
            $d['id_kategori'],
            $d['id_brand'],
            $d['gambar']
        ]);
    }

    public function getAll() {
        return $this->db->query("
            SELECT p.*, k.nama_kategori, b.nama_brand
            FROM produk p
            JOIN kategori k ON p.id_kategori=k.id
            JOIN brand b ON p.id_brand=b.id
            ORDER BY p.id DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($id, $d) {
        $sql = "UPDATE produk SET
            nama_produk=?, harga=?, is_available=?, stok_produk=?,
            deskripsi=?, id_kategori=?, id_brand=?, gambar=?
            WHERE id=?";

        return $this->db->prepare($sql)->execute([
            $d['nama_produk'],
            $d['harga'],
            $d['is_available'],
            $d['stok_produk'],
            $d['deskripsi'],
            $d['id_kategori'],
            $d['id_brand'],
            $d['gambar'],
            $id
        ]);
    }

    public function delete($id) {
        return $this->db->prepare("DELETE FROM produk WHERE id=?")->execute([$id]);
    }
    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
