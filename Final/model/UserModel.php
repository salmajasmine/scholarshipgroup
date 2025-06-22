<?php


class UserModel extends Model {
    public function getByUsername($username) {
        $stmt = $this->db->prepare("SELECT * FROM account WHERE username = ?");
        $stmt->execute([$username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}