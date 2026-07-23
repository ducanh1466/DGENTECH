<?php

class BrandModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_brands';
    }

    public function getAllBrands()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY brand_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getBrandById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE brand_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insertBrand($brand_name, $description = null, $status = 1)
    {
        $sql = "INSERT INTO {$this->table} (brand_name, description, status) VALUES (:brand_name, :description, :status)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'brand_name' => $brand_name,
            'description' => $description,
            'status' => $status
        ]);
    }

    public function updateBrand($id, $brand_name, $description = null, $status = 1)
    {
        $sql = "UPDATE {$this->table} SET brand_name = :brand_name, description = :description, status = :status WHERE brand_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'brand_name' => $brand_name,
            'description' => $description,
            'status' => $status
        ]);
    }

    public function deleteBrand($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE brand_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
