<?php
// Cek modul apa yang sedang aktif dari URL
$current_mod = isset($_GET['mod']) ? $_GET['mod'] : 'lecturer';
?>

<div class="navbar">
    <div class="container d-flex flex-column align-items-center">
        <div class="brand-text"><i class="bi bi-cpu-fill"></i> SIAKAD</div>
        <div class="nav-menu">
            <a href="index.php?mod=lecturer" 
               class="nav-btn <?= ($current_mod == 'lecturer') ? 'active' : '' ?>">
               Data Dosen
            </a>

            <a href="index.php?mod=course" 
               class="nav-btn <?= ($current_mod == 'course') ? 'active' : '' ?>">
               Mata Kuliah
            </a>
        </div>
    </div>
</div>