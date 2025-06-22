<?php
$selected = $beasiswa ?? null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Detail Beasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
        .btn-back {
            margin-top: 20px;
            margin-right: 10px;
        }
        .btn-apply {
            margin-top: 20px;
            background-color: #052c65;
            border: none;
        }
        .btn-apply:hover {
            background-color: #0d6efd;
        }
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            color: #052c65;
            font-weight: 600;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        @media (max-width: 767px) {
            .card-img-top {
                height: 200px;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn-back, .btn-apply {
                width: 100%;
                margin-right: 0;
            }
        }
    </style>
</head>
<body>

<div class="container py-5">
    <?php if ($selected): ?>
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="card-title"><?= htmlspecialchars($selected['judul']) ?></h1>
                <p class="card-text"><?= htmlspecialchars($selected['deskripsi']) ?></p>
                
                <div class="action-buttons">
                    <a href="index.php?c=Dashboard&m=index" class="btn btn-primary btn-back">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                    </a>
                    <form action="index.php?c=Scholarship&m=submit" method="post" enctype="multipart/form-data">

    <input type="hidden" name="c" value="Scholarship">
    <input type="hidden" name="m" value="index">
    <input type="hidden" name="judul" value="<?= htmlspecialchars($selected['judul']) ?>">
    <button type="submit" class="btn btn-primary btn-apply">
        <i class="bi bi-send"></i> Submit Application
    </button>
</form>

                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            <h4>Beasiswa tidak ditemukan</h4>
            <a href="index.php?c=Dashboard&m=index" class="btn btn-secondary">Kembali ke Daftar Beasiswa</a>
        </div>
    <?php endif; ?>
</div>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
