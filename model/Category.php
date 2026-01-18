<?php
class Category{
    private $db;
    public function __construct($pdo){
        $this->db = $pdo;
    }

    public function create($nama)
    {
        $stmt = $this->db->prepare("INSERT INTO kategori (nama_kategori) VALUES (?)");
        return $stmt->execute([$nama]);
    }

    public function getAllCategories()
    {
        $stmt = $this->db->query("SELECT * FROM kategori ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteCategory($id)
    {
        $stmt = $this->db->prepare("DELETE FROM kategori WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateCategory($id, $nama)
    {
        $stmt = $this->db->prepare("UPDATE kategori SET nama_kategori = ? WHERE id = ?");
        return $stmt->execute([$nama, $id]);
    }
}