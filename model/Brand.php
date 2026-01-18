<?php

class Brand {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllBrands() {
        $stmt = $this->pdo->query("SELECT * FROM brand ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($nama_brand) {
        $stmt = $this->pdo->prepare("INSERT INTO brand (nama_brand) VALUES (?)");
        return $stmt->execute([$nama_brand]);
    }

    public function updateBrand($id, $nama_brand) {
        $stmt = $this->pdo->prepare("UPDATE brand SET nama_brand = ? WHERE id = ?");
        return $stmt->execute([$nama_brand, $id]);
    }

    public function deleteBrand($id) {
        $stmt = $this->pdo->prepare("DELETE FROM brand WHERE id = ?");
        return $stmt->execute([$id]);
    }
}