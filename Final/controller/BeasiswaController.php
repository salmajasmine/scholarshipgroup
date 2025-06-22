<?php
class BeasiswaController extends Controller {
  public function admin_dashboard() {
    $model = $this->model('BeasiswaModel');
    $data = $model->getAll();
    $this->view('admin_dashboard', ['beasiswa' => $data], 'admin_case');
  }

  public function tambah() {
    $this->view('tambah', [], 'admin_case');
  }

  public function simpan() {
    $model = $this->model('BeasiswaModel');
    $model->simpan([
      'judul' => $_POST['judul'],
      'deskripsi' => $_POST['deskripsi'],
      'deadline' => $_POST['deadline'],
      'link' => $_POST['link']
    ]);
    header("Location: index.php?c=Beasiswa&m=admin_dashboard");
  }
}