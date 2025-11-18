<?php
include_once 'models/Lecturer.php';

class LecturerController {
    private $model;

    public function __construct() {
        $this->model = new Lecturer(); // Inisialisasi Model
    }

    // Tampilkan halaman utama
    public function index() {
        $lecturers = $this->model->getAll(); // Ambil data dari Model
        include 'views/lecturer_index.php';  // Kirim ke View
    }

    // Proses Tambah Data
    public function add() {
        if (isset($_POST['submit'])) {
            // Jika tombol submit ditekan, simpan data
            $this->model->create($_POST);
            header("Location: index.php?mod=lecturer"); // Redirect balik
        } else {
            // Jika belum, tampilkan form
            include 'views/lecturer_create.php';
        }
    }

    // Proses Edit Data
    public function edit($id) {
        if (isset($_POST['submit'])) {
            $this->model->update($id, $_POST);
            header("Location: index.php?mod=lecturer");
        } else {
            // Ambil data lama untuk ditampilkan di form edit
            $data = $this->model->getById($id);
            include 'views/lecturer_edit.php';
        }
    }

    // Proses Hapus Data
    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=lecturer");
    }
}
?>