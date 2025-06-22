<?php
require_once __DIR__ . '/../core/Model.php';

class ScholarshipModel extends Model {
    public function createApplication($data) {
        $sql = "INSERT INTO applications (
                    full_name, email, phone, address, dob, gender,
                    education_level, institution, gpa, essay,
                    reference_name, reference_contact, document_path
                ) VALUES (
                    :full_name, :email, :phone, :address, :dob, :gender,
                    :education_level, :institution, :gpa, :essay,
                    :reference_name, :reference_contact, :document_path
                )";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':full_name' => $data['full_name'],
            ':email' => $data['email'],
            ':phone' => $data['phone'],
            ':address' => $data['address'],
            ':dob' => $data['dob'],
            ':gender' => $data['gender'],
            ':education_level' => $data['education_level'],
            ':institution' => $data['institution'],
            ':gpa' => $data['gpa'],
            ':essay' => $data['essay'],
            ':reference_name' => $data['reference_name'],
            ':reference_contact' => $data['reference_contact'],
            ':document_path' => $data['document_path'],
        ]);
    }

    public function getApplicationByEmail($email) {
        $sql = "SELECT * FROM applications WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
