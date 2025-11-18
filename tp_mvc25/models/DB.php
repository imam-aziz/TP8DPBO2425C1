<?php
// --- FILE: models/DB.php ---
// Class ini bertugas menangani koneksi ke database MySQL

class DB {
    private $host = "localhost";
    private $user = "root";     // Username default XAMPP
    private $pass = "";         // Password default XAMPP (kosong)
    private $db   = "tp_mvc25"; // Nama database
    public $conn;

    public function __construct() {
        // Membuat koneksi baru
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        
        // Cek jika ada error koneksi
        if ($this->conn->connect_error) {
            die("Koneksi Database Gagal: " . $this->conn->connect_error);
        }
    }
}
?>