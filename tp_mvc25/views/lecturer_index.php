<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <title>Data Dosen - Dark Mode</title>

    <style>
        /* --- DARK MODE STYLE --- */
        body {
            background-color: #0f172a;
            color: #f8fafc;
            font-family: 'Segoe UI', sans-serif;
            text-align: center;
        }

        /* NAVBAR */
        .navbar {
            background-color: #1e293b;
            border-bottom: 1px solid #334155;
            padding: 20px 0;
            margin-bottom: 40px;
        }
        
        .nav-menu {
            display: flex; flex-direction: row; justify-content: center; gap: 15px; margin-top: 15px;
        }

        .nav-btn {
            color: #94a3b8; font-weight: 600; padding: 10px 30px; border-radius: 30px; text-decoration: none;
            background-color: rgba(255,255,255,0.05); transition: 0.3s;
        }
        .nav-btn:hover, .nav-btn.active {
            background-color: #3b82f6; color: white; transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .brand-text { color: #3b82f6; font-weight: bold; font-size: 1.5rem; letter-spacing: 1px; }

        .page-title { font-weight: 700; letter-spacing: 1px; margin-bottom: 5px; }
        
        hr.glow-hr {
            border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(59, 130, 246, 1), rgba(0,0,0,0));
            margin: 30px auto; width: 80%; opacity: 1;
        }

        .btn-add {
            background-color: #3b82f6; color: white; border-radius: 50px; padding: 12px 50px; font-size: 1.1rem;
            font-weight: 600; border: none; box-shadow: 0 0 20px rgba(59, 130, 246, 0.5); transition: 0.3s; text-decoration: none; display: inline-block;
        }
        .btn-add:hover { background-color: #2563eb; transform: scale(1.05); color: white; }

        /* --- PERBAIKAN PAKE MARGIN --- */
        .table-wrapper {
            /* Hapus width % */
            /* width: 95%; */ 
            
            /* Gunakan Margin Kiri Kanan (50px) */
            margin: 0 50px; 
            
            background-color: #1e293b;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.4);
        }
        
        /* Responsif: Kalau di HP marginnya kecilin biar gak penyet */
        @media (max-width: 768px) {
            .table-wrapper { margin: 0 10px; }
        }

        .table { color: #cbd5e1; margin-bottom: 0; font-size: 1.05rem; width: 100%; }
        
        .table thead th {
            background-color: #0f172a; color: #3b82f6; border-bottom: 2px solid #334155; padding: 15px; text-align: center;
        }
        .table tbody td {
            border-color: #334155; padding: 15px; vertical-align: middle; text-align: center;
        }
        .table-hover tbody tr:hover { background-color: rgba(59, 130, 246, 0.1); color: white; }

        .btn-action { width: 40px; height: 40px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; transition: 0.2s; border: 1px solid transparent; text-decoration: none; }
        .btn-edit { background: rgba(234, 179, 8, 0.1); color: #facc15; border-color: rgba(234, 179, 8, 0.3); }
        .btn-edit:hover { background: #facc15; color: black; }
        .btn-delete { background: rgba(239, 68, 68, 0.1); color: #f87171; border-color: rgba(239, 68, 68, 0.3); }
        .btn-delete:hover { background: #ef4444; color: white; }
    </style>
</head>
<body>

    <body>

    <?php include 'views/navbar.php'; ?>

    <div class="container mb-5">
         

    <div class="container-fluid mb-5">
        <h2 class="page-title">MANAJEMEN DOSEN</h2>
        <p class="text-muted">Kelola data pengajar profesional</p>

        <hr class="glow-hr">

        <a href="index.php?mod=lecturer&act=create" class="btn-add">
            <i class="bi bi-plus-lg"></i> TAMBAH DOSEN
        </a>

        <hr class="glow-hr">

        <div class="table-wrapper">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>NAMA LENGKAP</th>
                            <th>NIDN</th>
                            <th>TELEPON</th>
                            <th>TANGGAL JOIN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($lecturers)): ?>
                            <tr><td colspan="6" class="py-5 text-muted">Data kosong.</td></tr>
                        <?php else: ?>
                            <?php foreach ($lecturers as $row): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td class="fw-bold text-white"><?= $row['name'] ?></td>
                                <td><span class="badge bg-dark border border-secondary px-3 py-2"><?= $row['nidn'] ?></span></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= date('d M Y', strtotime($row['join_date'])) ?></td>
                                <td>
                                    <a href="index.php?mod=lecturer&act=edit&id=<?= $row['id'] ?>" class="btn-action btn-edit" title="Edit"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="index.php?mod=lecturer&act=delete&id=<?= $row['id'] ?>" class="btn-action btn-delete" onclick="return confirm('Hapus?')" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>