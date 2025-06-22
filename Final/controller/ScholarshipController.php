<?php
class ScholarshipController extends Controller {
    public function index() {
        $form_data = $this->getEmptyFormData();
        
        $this->view('application', [
            'form_data' => $form_data,
            'success_message' => '',
            'error_message' => ''
        ], 'application_case');
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ?c=Scholarship&m=index');
            exit;
        }

        $form_data = $this->getFormDataFromPost();
        list($error_message, $document_path) = $this->validateApplication($form_data);
        
        if (empty($error_message)) {
            $form_data['document_path'] = $document_path;
            $result = $this->saveApplication($form_data);
            
            if ($result['success']) {
                $this->view('notification', [
                    'success_message' => $result['message'],
                    'error_message' => ''
                ], 'application_case');
                return;
            }
            
            $error_message = $result['message'];
        }
        
        $this->view('application', [
            'form_data' => $form_data,
            'success_message' => '',
            'error_message' => $error_message
        ], 'application_case');
    }

    private function getEmptyFormData() {
        return [
            'full_name' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'dob' => '',
            'gender' => '',
            'education_level' => '',
            'institution' => '',
            'gpa' => '',
            'essay' => '',
            'reference_name' => '',
            'reference_contact' => ''
        ];
    }

    private function getFormDataFromPost() {
        return [
            'full_name' => $_POST['full_name'] ?? '',
            'email' => $_POST['email'] ?? '',
            'phone' => $_POST['phone'] ?? '',
            'address' => $_POST['address'] ?? '',
            'dob' => $_POST['dob'] ?? '',
            'gender' => $_POST['gender'] ?? '',
            'education_level' => $_POST['education_level'] ?? '',
            'institution' => $_POST['institution'] ?? '',
            'gpa' => $_POST['gpa'] ?? 0,
            'essay' => $_POST['essay'] ?? '',
            'reference_name' => $_POST['reference_name'] ?? '',
            'reference_contact' => $_POST['reference_contact'] ?? ''
        ];
    }

    private function validateApplication($form_data) {
        $error_message = '';
        $document_path = '';

        // Validate required fields
        $required_fields = ['full_name', 'email', 'education_level', 'gpa', 'essay'];
        foreach ($required_fields as $field) {
            if (empty($form_data[$field])) {
                $error_message = "Please fill all required fields";
                return [$error_message, $document_path];
            }
        }

        // Validate GPA
        if ($form_data['gpa'] < 0 || $form_data['gpa'] > 4.0) {
            $error_message = "GPA must be between 0 and 4.0";
            return [$error_message, $document_path];
        }

        // Validate document upload
        if (isset($_FILES['document'])) {
            $upload_result = $this->handleDocumentUpload();
            if ($upload_result['error']) {
                return [$upload_result['message'], $document_path];
            }
            $document_path = $upload_result['path'];
        }

        return [$error_message, $document_path];
    }

    private function handleDocumentUpload() {
        $uploadDir = 'uploads/';
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $fileName = basename($_FILES['document']['name']);
        $targetPath = $uploadDir . $fileName;
        
        $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        if ($_FILES['document']['size'] > 2097152) {
            return ['error' => true, 'message' => "File size must be less than 2MB"];
        }
        
        if (!in_array($fileType, ['pdf', 'doc', 'docx'])) {
            return ['error' => true, 'message' => "Only PDF, DOC, and DOCX files are allowed"];
        }
        
        if (!move_uploaded_file($_FILES['document']['tmp_name'], $targetPath)) {
            return ['error' => true, 'message' => "There was an error uploading your file"];
        }
        
        return ['error' => false, 'path' => $targetPath];
    }

    private function saveApplication($form_data) {
        $model = $this->model('ScholarshipModel');
        
        try {
            if ($model->createApplication($form_data)) {
                return ['success' => true, 'message' => "Application submitted successfully!"];
            } else {
                return ['success' => false, 'message' => "There was an error submitting your application"];
            }
        } catch (Exception $e) {
            return ['success' => false, 'message' => "Database error: " . $e->getMessage()];
        }
    }
}