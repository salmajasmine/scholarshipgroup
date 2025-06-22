const express = require('express');
const mysql = require('mysql2/promise');
const bodyParser = require('body-parser');
const app = express();
const port = 3000;
const bcrypt = require('bcrypt');
app.use(bodyParser.json());

const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'prestigo'
};


// POST - Login
app.post('/api/login', async (req, res) => {
  const { username, password } = req.body;

  try {
    const db = await mysql.createConnection(dbConfig);
    const sql = `SELECT * FROM account WHERE username = ?`;
    const [rows] = await db.execute(sql, [username]);

    if (rows.length === 0) {
      return res.status(401).json({ success: false, message: 'Username tidak ditemukan' });
    }

    const user = rows[0];

    // Bandingkan password plain text (tanpa bcrypt)
    if (password !== user.password) {  // Langsung bandingkan string
      return res.status(401).json({ success: false, message: 'Password salah' });
    }

    // Login sukses
    const { password: _, ...userWithoutPassword } = user;
    res.status(200).json({
      success: true,
      message: 'Login berhasil',
      user: userWithoutPassword
    });

  } catch (err) {
    res.status(500).json({ success: false, error: err.message });
  }
});
// POST - Tambah beasiswa
app.get('/api/beasiswa', async (req, res) => {
  const search = req.query.search || ''; // ambil keyword dari query param

  try {
    const db = await mysql.createConnection(dbConfig);
    
    let sql = 'SELECT * FROM beasiswa';
    let params = [];

    if (search.trim() !== '') {
      sql += ' WHERE judul LIKE ? OR deskripsi LIKE ?';
      const keyword = `%${search}%`;
      params = [keyword, keyword];
    }

    const [rows] = await db.execute(sql, params);
    res.status(200).json(rows);
  } catch (err) {
    res.status(500).json({ success: false, error: err.message });
  }
});

// ✅ GET - Ambil semua data beasiswa
app.get('/api/beasiswa', async (req, res) => {
  try {
    const db = await mysql.createConnection(dbConfig);
    const [rows] = await db.execute('SELECT * FROM beasiswa');
    res.status(200).json(rows);
  } catch (err) {
    res.status(500).json({ success: false, error: err.message });
  }
});

app.listen(port, () => {
  console.log(`REST API listening at http://localhost:${port}`);
});
