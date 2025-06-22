<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: index.php?c=Auth&m=login');
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="view/admin_case/admin_dashboard_style.css">
</head>
<body>
<header>
    <h1>HELLO ADMIN!</h1>
    <h2>Prestigo Admin Dashboard</h2>
    <a href="index.php?c=Auth&m=logout" class="logout-link">Logout</a>
</form>
</header>

  <main>
    <div class="main-actions">
      <div class="action-box">
        <button>📂</button>
        <p>Kelola<br>Beasiswa</p>
      </div>
      <div class="action-box">
        <button onclick="location.href='index.php?c=Beasiswa&m=tambah'">➕</button>
        <p>Tambah<br>Beasiswa</p>
      </div>
      <div class="action-box">
        <button>📑</button>
        <p>Laporan<br>Pendaftaran</p>
      </div>
    </div>
    <div class="preview-beasiswa">
      <img src="assets/beasiswa.jpg" alt="Beasiswa Terbaru" width="300" height="200">
    </div>
  <section class="pengumuman">
    <h3>Pengumuman</h3>
    <p class="info">none...</p>
  </section>
  <?php if (!empty($beasiswa)): ?>
  <section class="pengumuman">
    <h3>Daftar Beasiswa:</h3>
    <ul>
      <?php foreach ($beasiswa as $b): ?>
        <li><strong><?= htmlspecialchars($b['judul']) ?></strong> - <?= htmlspecialchars($b['deadline']) ?></li>
      <?php endforeach; ?>
    </ul>
  </section>
<?php else: ?>
  <p>Tidak ada beasiswa yang tersedia.</p>
<?php endif; ?>
  </main>
  <nav>
    <button>Beranda</button>
    <button>Notifikasi</button>
    <button>Akun</button>
  </nav>
</body>
</html>
