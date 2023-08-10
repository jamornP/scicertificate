<?php
namespace App\Model;
use App\Database\DbCertificate;

class Background extends DbCertificate{
    public function addBg($data) {
        $sql = "
            INSERT INTO tb_background(
                b_name,
                b_path,
                status
            ) VALUES (
                :b_name,
                :b_path,
                :status
            )
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }
    public function getBg($action){
        $sql = "
            SELECT * FROM tb_background
        ";
        $stmt = $this->pdo->query($sql);
        $data = $stmt->fetchAll();
        if($action == "count"){
            return count($data);
        }else{
            return $data;
        }

    }
}
?>