<?php

class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_products';
        try {
            $this->pdo->exec('ALTER TABLE tb_products ADD COLUMN image VARCHAR(255) NULL');
        } catch (PDOException $e) { }
        try {
            $this->pdo->exec('ALTER TABLE tb_products ADD COLUMN price INT NULL DEFAULT 0');
        } catch (PDOException $e) { }
        try {
            $this->pdo->exec('ALTER TABLE tb_products ADD COLUMN ram VARCHAR(255) NULL');
        } catch (PDOException $e) { }
        try {
            $this->pdo->exec('ALTER TABLE tb_products ADD COLUMN screen VARCHAR(255) NULL');
        } catch (PDOException $e) { }
        try {
            $this->pdo->exec('ALTER TABLE tb_products ADD COLUMN refresh_rate VARCHAR(255) NULL');
        } catch (PDOException $e) { }
        try {
            $this->pdo->exec("CREATE TABLE IF NOT EXISTS tb_product_variants (
                variant_id INT AUTO_INCREMENT PRIMARY KEY,
                product_id INT NOT NULL,
                variant_name VARCHAR(255) NOT NULL,
                price INT NOT NULL DEFAULT 0,
                stock INT NOT NULL DEFAULT 0,
                FOREIGN KEY (product_id) REFERENCES tb_products(product_id) ON DELETE CASCADE
            )");
        } catch (PDOException $e) { }
        try {
            $this->pdo->exec('ALTER TABLE tb_product_variants ADD COLUMN stock INT NOT NULL DEFAULT 0');
        } catch (PDOException $e) { }
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
        $sql = "SELECT p.*, c.category_name, b.brand_name 

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
        $sql = "SELECT * FROM tb_product_variants WHERE product_id = :product_id ORDER BY variant_id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['product_id' => $product_id]);
        return $stmt->fetchAll();
    }

    public function getProductsByCategory($category_id, $limit = 4, $exclude_id = 0)
    {
        $sql = "SELECT p.*, c.category_name, b.brand_name

                FROM {$this->table} p
                LEFT JOIN tb_categories c ON p.category_id = c.category_id
                LEFT JOIN tb_brands b ON p.brand_id = b.brand_id
                WHERE p.category_id = :category_id AND p.product_id != :exclude_id AND p.status = 'active'
                ORDER BY p.product_id DESC 
                LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindValue(':exclude_id', $exclude_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function insertProduct($category_id, $product_name, $brand_id, $warranty_period = null, $description = null, $status = 'active', $image = null, $price = 0, $ram = null, $screen = null, $refresh_rate = null)
    {
        $sql = "INSERT INTO {$this->table} (category_id, product_name, brand_id, warranty_period, description, status, image, price, ram, screen, refresh_rate) 
                VALUES (:category_id, :product_name, :brand_id, :warranty_period, :description, :status, :image, :price, :ram, :screen, :refresh_rate)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'category_id' => $category_id,
            'product_name' => $product_name,
            'brand_id' => $brand_id,
            'warranty_period' => $warranty_period,
            'description' => $description,
            'status' => $status,
            'image' => $image,
            'price' => $price,
            'ram' => $ram,
            'screen' => $screen,
            'refresh_rate' => $refresh_rate
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateProduct($id, $category_id, $product_name, $brand_id, $warranty_period = null, $description = null, $status = 'active', $image = null, $price = 0, $ram = null, $screen = null, $refresh_rate = null)
    {
        $sql = "UPDATE {$this->table} 
                SET category_id = :category_id, product_name = :product_name, brand_id = :brand_id, 
                    warranty_period = :warranty_period, description = :description, status = :status, price = :price,
                    ram = :ram, screen = :screen, refresh_rate = :refresh_rate";
        $params = [
            'id' => $id,
            'category_id' => $category_id,
            'product_name' => $product_name,
            'brand_id' => $brand_id,
            'warranty_period' => $warranty_period,
            'description' => $description,
            'status' => $status,
            'price' => $price,
            'ram' => $ram,
            'screen' => $screen,
            'refresh_rate' => $refresh_rate
        ];

        if ($image !== null) {
            $sql .= ", image = :image";
            $params['image'] = $image;
        }

        $sql .= " WHERE product_id = :id";
        
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($params);
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE product_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    public function insertVariant($product_id, $variant_name, $price, $stock = 0)
    {
        $sql = "INSERT INTO tb_product_variants (product_id, variant_name, price, stock) VALUES (:product_id, :variant_name, :price, :stock)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'product_id' => $product_id,
            'variant_name' => $variant_name,
            'price' => $price,
            'stock' => $stock
        ]);
    }

    public function deleteVariantsByProductId($product_id)
    {
        $sql = "DELETE FROM tb_product_variants WHERE product_id = :product_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['product_id' => $product_id]);
    }
}
