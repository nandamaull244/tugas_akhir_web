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
        // ambil cart user
    public function getByUser($id_user) {
        $stmt = $this->db->prepare("
            SELECT 
                cart.id,
                cart.qty,
                cart.harga,
                cart.subtotal,
                produk.nama_produk,
                produk.gambar
            FROM cart
            JOIN produk ON cart.id_produk = produk.id
            WHERE cart.id_user = ?
        ");
        $stmt->execute([$id_user]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // update qty
    public function updateQty($id, $qty) {
        $stmt = $this->db->prepare(
            "UPDATE cart SET qty = ? WHERE id = ?"
        );
        return $stmt->execute([$qty, $id]);
    }

    // hapus item
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // total belanja
    public function getTotal($id_user) {
        $stmt = $this->db->prepare(
            "SELECT SUM(subtotal) as total FROM cart WHERE id_user = ?"
        );
        $stmt->execute([$id_user]);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    }

}
