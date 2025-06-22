<?php
class DashboardController extends Controller {
    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?c=Auth&m=login');
            exit;
        }
        
        $model = $this->model('BeasiswaModel');
        $search = $_GET['search'] ?? '';
        $beasiswa = $model->getAll($search);
        
        $this->view('dashboard', ['beasiswa' => $beasiswa, 'search' => $search], 'search_case');
    }
    
    public function detail() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->view('error', ['message' => 'ID tidak valid'], 'search_case');
            return;
        }
    
        $model = $this->model('BeasiswaModel');
        $beasiswa = $model->getById($id);
        
        if (!$beasiswa) {
            $this->view('error', ['message' => 'Beasiswa tidak ditemukan'], 'search_case');
            return;
        }
    
        $this->view('detail', ['beasiswa' => $beasiswa], 'search_case');
    }
}