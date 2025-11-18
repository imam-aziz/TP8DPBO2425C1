<?php
include_once 'models/DB.php';

class Lecturer extends DB {
    // Ambil semua data dosen (SELECT)
    public function getAll() {
        return $this->conn->query("SELECT * FROM lecturers");
    }

    // Ambil 1 data berdasarkan ID (Untuk form Edit)
    public function getById($id) {
        $result = $this->conn->query("SELECT * FROM lecturers WHERE id='$id'");
        return $result->fetch_assoc(); // Ubah jadi array asosiatif
    }

    // Simpan data baru (INSERT)
    public function create($data) {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        
        return $this->conn->query("INSERT INTO lecturers (name, nidn, phone, join_date) VALUES ('$name', '$nidn', '$phone', '$join_date')");
    }

    // Update data lama (UPDATE)
    public function update($id, $data) {
        $name = $data['name'];
        $nidn = $data['nidn'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];

        return $this->conn->query("UPDATE lecturers SET name='$name', nidn='$nidn', phone='$phone', join_date='$join_date' WHERE id='$id'");
    }

    // Hapus data (DELETE)
    public function delete($id) {
        return $this->conn->query("DELETE FROM lecturers WHERE id='$id'");
    }
}
?>