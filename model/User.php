<?php
class User{
    private $db;
    public function __construct($pdo){
        $this->db = $pdo;
    }

    public function findByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($nama, $email, $password, $role)
    {
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$nama, $email, $hash, $role]);

    }

}