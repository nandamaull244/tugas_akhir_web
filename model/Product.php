<?php
class Product {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    /* CREATE */
    public function create($data) {
        $sql = "INSERT INTO produk 
            (nama_produk, harga, is_available, stok_produk, deskripsi, id_kategori, id_brand, id_gambar)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_produk'],
            $data['harga'],
            $data['is_available'],
            $data['stok_produk'],
            $data['deskripsi'],
            $data['id_kategori'],
            $data['id_brand'],
            $data['id_gambar']
        ]);
    }

    /* READ (JOIN) */
    public function getAll() {
        $sql = "SELECT p.*, 
                       k.nama_kategori, 
                       b.nama_brand
                FROM produk p
                JOIN kategori k ON p.id_kategori = k.id
                JOIN brand b ON p.id_brand = b.id
                ORDER BY p.id DESC";

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM produk WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /* UPDATE */
    public function update($id, $data) {
        $sql = "UPDATE produk SET
                nama_produk=?,
                harga=?,
                is_available=?,
                stok_produk=?,
                deskripsi=?,
                id_kategori=?,
                id_brand=?,
                id_gambar=?
                WHERE id=?";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nama_produk'],
            $data['harga'],
            $data['is_available'],
            $data['stok_produk'],
            $data['deskripsi'],
            $data['id_kategori'],
            $data['id_brand'],
            $data['id_gambar'],
            $id
        ]);
    }

    /* DELETE */
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM produk WHERE id=?");
        return $stmt->execute([$id]);
    }
}
