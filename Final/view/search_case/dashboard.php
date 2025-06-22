<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php?c=Auth&m=login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beasiswa Finder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Add Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<style>
    :root {
        --primary-blue: #0d6efd;
        --dark-blue: #052c65;
        --light-bg: #f8f9fa;
        --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        --card-hover: 0 8px 15px rgba(0, 0, 0, 0.1);
    }
    
    body {
        background-color: var(--light-bg);
        font-family: 'Poppins', sans-serif;
    }
    
    .navbar-brand {
        font-weight: 600;
    }
    
    .card {
        border: none;
        border-radius: 10px;
        transition: all 0.3s ease;
        overflow: hidden;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: var(--card-hover);
    }
    
    .card-link {
        text-decoration: none;
        color: inherit;
    }
    
    .card-title {
        color: var(--dark-blue);
        font-weight: 600;
    }
    
    .search-box {
        border-radius: 50px;
        padding: 10px 20px;
        border: 1px solid #dee2e6;
        font-family: 'Poppins', sans-serif;
    }
    
    .search-btn {
        border-radius: 50px;
        padding: 10px 25px;
        background-color: var(--primary-blue);
        border: none;
        font-family: 'Poppins', sans-serif;
    }
    
    .header {
        background: linear-gradient(135deg, var(--primary-blue), var(--dark-blue));
        color: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
    }
    
    .logout-btn {
        background-color: transparent;
        border: 1px solid white;
        border-radius: 50px;
        padding: 5px 15px;
        transition: all 0.3s;
        color: white !important;
        font-family: 'Poppins', sans-serif;
    }
    
    .logout-btn:hover {
        background-color: white;
        color: var(--primary-blue) !important;
    }
    
    .empty-state {
        padding: 50px 0;
        background-color: white;
        border-radius: 10px;
    }
    
    h1, h2, h3, h4, h5, h6 {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
    }
    
    .badge {
        font-family: 'Poppins', sans-serif;
    }
</style>
<body>
    <div class="container py-4">
        <!-- Header -->
        <div class="header shadow-sm">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h4><i class="bi bi-person-circle me-2"></i>Hai, <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong></h4>
                    <p class="mb-0">Temukan beasiswa yang cocok untuk Anda</p>
                </div>
                <a href="index.php?c=Auth&m=logout" class="btn logout-btn text-white">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </a>
            </div>
        </div>

        <div class="bg-white p-4 rounded-3 shadow-sm mb-4">
            <h2 class="text-center mb-4 fw-bold"><i class="bi bi-award me-2"></i>Daftar Beasiswa</h2>
            
            <!-- Search Form -->
            <form class="mb-4" method="GET" action="">
                <div class="input-group">
                    <input type="text" class="form-control search-box" name="search" 
                           placeholder="Cari beasiswa berdasarkan judul atau deskripsi..." 
                           value="<?= htmlspecialchars($search ?? '') ?>">
                    <button class="btn search-btn text-white" type="submit">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                </div>
            </form>
            
            <!-- Beasiswa List -->
            <?php if (!empty($beasiswa)): ?>
                <div class="row g-4">
                    <?php foreach ($beasiswa as $b): ?>
                        <div class="col-lg-4 col-md-6">
                            <a href="index.php?c=Dashboard&m=detail&id=<?= $b['id'] ?>" class="card-link">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="bg-primary bg-opacity-10 p-2 rounded me-3">
                                                <i class="bi bi-bookmark-star-fill text-primary"></i>
                                            </div>
                                            <h5 class="card-title mb-0"><?= htmlspecialchars($b['judul']) ?></h5>
                                        </div>
                                        <p class="card-text text-muted"><?= htmlspecialchars(substr($b['deskripsi'], 0, 100)) ?>...</p>
                                        <div class="text-end">
                                            <span class="badge bg-primary bg-opacity-10 text-primary">Lihat Detail</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-state text-center py-5">
                    <i class="bi bi-search display-4 text-muted mb-3"></i>
                    <h4 class="text-muted">Beasiswa tidak ditemukan</h4>
                    <p class="text-muted">Coba gunakan kata kunci pencarian yang berbeda</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const searchInput = document.querySelector('input[name="search"]');
        searchInput.addEventListener('input', function () {
            const value = this.value.trim();
            const url = new URL(window.location.href);
            url.searchParams.set('search', value);
            window.history.replaceState({}, '', url);

            clearTimeout(window.searchTimeout);
            window.searchTimeout = setTimeout(() => {
                window.location.href = url;
            }, 500);
        });
    </script>
</body>
</html>