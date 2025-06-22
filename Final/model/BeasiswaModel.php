<?php
require_once __DIR__ . '/../core/Model.php';

class BeasiswaModel extends Model {
    public function getAll($search = '') {
        $sql = "SELECT * FROM beasiswa";
        
        if (!empty($search)) {
            $sql .= " WHERE judul LIKE :search OR deskripsi LIKE :search";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':search' => "%$search%"]);
        } else {
            $stmt = $this->db->query($sql);
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id) {
      $stmt = $this->db->prepare("SELECT * FROM beasiswa WHERE id = :id");
      $stmt->execute([':id' => $id]);
      return $stmt->fetch(PDO::FETCH_ASSOC);
  }
  
    public function simpan($data) {
        $stmt = $this->db->prepare("INSERT INTO beasiswa (judul, deskripsi, deadline, link) VALUES (?, ?, ?, ?)");
        $stmt->execute([
          $data['judul'],
          $data['deskripsi'],
          $data['deadline'],
          $data['link']
        ]);
    }
}
?>
