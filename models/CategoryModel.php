<?php

class CategoryModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_categories';
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY category_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function insertCategory($category_name, $description = null)
    {
        $sql = "INSERT INTO {$this->table} (category_name, description) VALUES (:category_name, :description)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'category_name' => $category_name,
            'description' => $description
        ]);
    }

    public function updateCategory($id, $category_name, $description = null)
    {
        $sql = "UPDATE {$this->table} SET category_name = :category_name, description = :description WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'category_name' => $category_name,
            'description' => $description
        ]);
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
