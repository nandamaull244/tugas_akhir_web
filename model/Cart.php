<?php
class Cart {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // cek apakah produk sudah ada di cart user
    public function findByUserAndProduct($id_user, $id_produk) {
        $stmt = $this->db->prepare(
            "SELECT * FROM cart WHERE id_user = ? AND id_produk = ?"
        );
        $stmt->execute([$id_user, $id_produk]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // tambah cart baru
    public function create($data) {
        $stmt = $this->db->prepare(
            "INSERT INTO cart (id_user, id_produk, qty, harga)
             VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['id_user'],
            $data['id_produk'],
            $data['qty'],
            $data['harga']
        ]);
    }

    // update qty jika produk sudah ada
    public function updateQty($id, $qty) {
        $stmt = $this->db->prepare(
            "UPDATE cart SET qty = ? WHERE id = ?"
        );
        return $stmt->execute([$qty, $id]);
    }
    public function getCartByUserId($id_user) {
        $stmt = $this->db->prepare(
            "SELECT c.*, p.nama_produk, p.gambar
             FROM cart c
             JOIN produk p ON c.id_produk = p.id
             WHERE c.id_user = ?"
        );
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
