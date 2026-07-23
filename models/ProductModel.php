<?php

class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_products';
    }

    public function getAllProducts()
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name 
                FROM {$this->table} p
                LEFT JOIN tb_categories c ON p.category_id = c.category_id
                LEFT JOIN tb_brands b ON p.brand_id = b.brand_id
                ORDER BY p.product_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getLatestProducts($limit = 8)
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name, 
                       (SELECT price FROM tb_product_variants WHERE product_id = p.product_id LIMIT 1) as price
                FROM {$this->table} p
                LEFT JOIN tb_categories c ON p.category_id = c.category_id
                LEFT JOIN tb_brands b ON p.brand_id = b.brand_id
                WHERE p.status = 'active'
                ORDER BY p.product_id DESC 
                LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        // BindValue is needed for LIMIT in PDO
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getProductById($id)
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name 
                FROM {$this->table} p
                LEFT JOIN tb_categories c ON p.category_id = c.category_id
                LEFT JOIN tb_brands b ON p.brand_id = b.brand_id
                WHERE p.product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getVariantsByProductId($product_id)
    {
        $sql = "SELECT * FROM tb_product_variants WHERE product_id = :product_id ORDER BY price ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll();
    }

    public function getProductsByCategory($category_id, $limit = 4, $exclude_id = 0)
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name,
                       (SELECT price FROM tb_product_variants WHERE product_id = p.product_id LIMIT 1) as price
                FROM {$this->table} p
                LEFT JOIN tb_categories c ON p.category_id = c.category_id
                LEFT JOIN tb_brands b ON p.brand_id = b.brand_id
                WHERE p.category_id = :category_id AND p.product_id != :exclude_id AND p.status = 'active'
                ORDER BY p.product_id DESC 
                LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindValue(':exclude_id', $exclude_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertProduct($category_id, $product_name, $brand_id, $warranty_period = null, $description = null, $status = 'active')
    {
        $sql = "INSERT INTO {$this->table} (category_id, product_name, brand_id, warranty_period, description, status) 
                VALUES (:category_id, :product_name, :brand_id, :warranty_period, :description, :status)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'category_id' => $category_id,
            'product_name' => $product_name,
            'brand_id' => $brand_id,
            'warranty_period' => $warranty_period,
            'description' => $description,
            'status' => $status
        ]);
        return $this->pdo->lastInsertId(); // Return ID to insert variants/images later
    }

    public function updateProduct($id, $category_id, $product_name, $brand_id, $warranty_period = null, $description = null, $status = 'active')
    {
        $sql = "UPDATE {$this->table} 
                SET category_id = :category_id, product_name = :product_name, brand_id = :brand_id, 
                    warranty_period = :warranty_period, description = :description, status = :status 
                WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'category_id' => $category_id,
            'product_name' => $product_name,
            'brand_id' => $brand_id,
            'warranty_period' => $warranty_period,
            'description' => $description,
            'status' => $status
        ]);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
