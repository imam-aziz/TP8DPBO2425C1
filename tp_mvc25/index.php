<?php
// --- FILE: index.php ---
// Ini adalah gerbang utama (Router) aplikasi MVC.

// 1. Load semua controller yang dibutuhkan
include_once 'controllers/LecturerController.php';
include_once 'controllers/CourseController.php';

// 2. Ambil parameter dari URL (Default: mod=lecturer, act=index)
// Contoh URL: index.php?mod=course&act=create
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'lecturer'; // Modul apa? (dosen/matkul)
$act = isset($_GET['act']) ? $_GET['act'] : 'index';    // Aksi apa? (lihat/tambah/edit/hapus)
$id  = isset($_GET['id']) ? $_GET['id'] : null;         // ID data (untuk edit/hapus)

// 3. Logika Percabangan (Routing)
if ($mod == 'lecturer') {
    // --- MODUL DOSEN ---
    $controller = new LecturerController();
    switch ($act) {
        case 'create':  $controller->add(); break;      // Ke halaman tambah
        case 'edit':    $controller->edit($id); break;  // Ke halaman edit
        case 'delete':  $controller->delete($id); break;// Proses hapus
        default:        $controller->index(); break;    // Halaman utama (list)
    }
} elseif ($mod == 'course') {
    // --- MODUL MATA KULIAH ---
    $controller = new CourseController();
    switch ($act) {
        case 'create':  $controller->add(); break;
        case 'edit':    $controller->edit($id); break;
        case 'delete':  $controller->delete($id); break;
        default:        $controller->index(); break;
    }
} else {
    // Jika modul tidak dikenali
    echo "404 - Modul tidak ditemukan";
}
?>