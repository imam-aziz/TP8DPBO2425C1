<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Tambah Matkul - Dark Mode</title>
    <style>
        body { background-color: #0f172a; color: #f8fafc; font-family: 'Segoe UI', sans-serif; }
        .navbar { background-color: #1e293b; border-bottom: 1px solid #334155; padding: 20px 0; margin-bottom: 40px; }
        .nav-menu { display: flex; justify-content: center; gap: 15px; margin-top: 15px; }
        .nav-btn { color: #94a3b8; font-weight: 600; padding: 10px 30px; border-radius: 30px; text-decoration: none; background-color: rgba(255,255,255,0.05); transition: 0.3s; }
        .nav-btn:hover, .nav-btn.active { background-color: #3b82f6; color: white; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4); }
        .brand-text { color: #3b82f6; font-weight: bold; font-size: 1.5rem; text-align: center; display: block; }

        .form-wrapper { max-width: 800px; margin: 0 auto; background-color: #1e293b; padding: 40px; border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.4); border: 1px solid #334155; }
        h2.page-title { text-align: center; font-weight: 700; margin-bottom: 30px; color: #3b82f6; }
        label { color: #94a3b8; font-weight: 600; margin-bottom: 8px; }
        .form-control, .form-select { background-color: #0f172a; border: 1px solid #334155; color: #fff; padding: 12px; border-radius: 10px; }
        .form-control:focus, .form-select:focus { background-color: #0f172a; border-color: #3b82f6; color: #fff; box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25); }
        
        /* --- LAYOUT TOMBOL FIX --- */
        .buttons-wrap { display: flex; gap: 15px; margin-top: 30px; }
        .btn-submit, .btn-cancel { flex: 1; padding: 12px; border-radius: 50px; font-weight: bold; text-align: center; text-decoration: none; transition: 0.3s; border: none; display: inline-block; }
        
        .btn-submit { background-color: #3b82f6; color: white; }
        .btn-submit:hover { background-color: #2563eb; transform: translateY(-2px); color: white; }
        .btn-cancel { background-color: transparent; border: 1px solid #94a3b8; color: #94a3b8; }
        .btn-cancel:hover { background-color: rgba(255,255,255,0.1); color: white; border-color: white; }
    </style>
</head>
<body>

    <body>

    <?php include 'views/navbar.php'; ?>

    <div class="container mb-5">
         

    <div class="container mb-5">
        <div class="form-wrapper">
            <h2 class="page-title">TAMBAH MATA KULIAH</h2>
            
            <form method="post" action="index.php?mod=course&act=create">
                <div class="mb-3">
                    <label>Nama Mata Kuliah</label>
                    <input type="text" name="course_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Jumlah SKS</label>
                    <input type="number" name="credits" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Dosen Pengajar</label>
                    <select name="lecturer_id" class="form-select" required>
                        <option value="">-- Pilih Dosen --</option>
                        <?php foreach ($lecturers as $lec): ?>
                            <option value="<?= $lec['id'] ?>"><?= $lec['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="buttons-wrap">
                    <button type="submit" name="submit" class="btn-submit">SIMPAN DATA</button>
                    <a href="index.php?mod=course" class="btn-cancel">BATAL</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>