<?php
include_once 'models/DB.php';

class Course extends DB {
    // Ambil data matkul + Nama Dosen (RELASI JOIN)
    // Kita men-join tabel courses dan lecturers berdasarkan lecturer_id
    public function getAllWithLecturer() {
        $sql = "SELECT courses.*, lecturers.name as lecturer_name 
                FROM courses 
                JOIN lecturers ON courses.lecturer_id = lecturers.id";
        return $this->conn->query($sql);
    }

    // Ambil 1 data matkul by ID
    public function getById($id) {
        $result = $this->conn->query("SELECT * FROM courses WHERE id='$id'");
        return $result->fetch_assoc();
    }

    // Create Matkul Baru
    public function create($data) {
        $course_name = $data['course_name'];
        $credits = $data['credits'];
        $lecturer_id = $data['lecturer_id']; // Foreign Key
        
        return $this->conn->query("INSERT INTO courses (course_name, credits, lecturer_id) VALUES ('$course_name', '$credits', '$lecturer_id')");
    }

    // Update Matkul
    public function update($id, $data) {
        $course_name = $data['course_name'];
        $credits = $data['credits'];
        $lecturer_id = $data['lecturer_id'];
        
        return $this->conn->query("UPDATE courses SET course_name='$course_name', credits='$credits', lecturer_id='$lecturer_id' WHERE id='$id'");
    }

    // Delete Matkul
    public function delete($id) {
        return $this->conn->query("DELETE FROM courses WHERE id='$id'");
    }
}
?>