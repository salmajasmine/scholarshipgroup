<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Beasiswa</title>
    <link rel="stylesheet" href="view/admin_case/admin_dashboard_style.css">
</head>
<body>
    <button class="back-button" onclick="history.back()">Kembali</button>
    <form action="index.php?c=Beasiswa&m=simpan" method="post">
        <label>Judul:</label>
        <input type="text" name="judul"><br>
        <label>Deskripsi:</label>
        <textarea name="deskripsi"></textarea><br>
        <label>Deadline:</label>
        <input type="date" name="deadline"><br>
        <label>Link:</label>
        <input type="url" name="link"><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
