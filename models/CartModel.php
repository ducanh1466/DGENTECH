<?php

class CartModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_carts';
    }

    public function getCartByUserId($user_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE user_id = :user_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetch();
    }

    public function createCart($user_id)
    {
        $sql = "INSERT INTO {$this->table} (user_id, created_at, updated_at) VALUES (:user_id, NOW(), NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $this->pdo->lastInsertId();
    }
    
    public function updateCartTimestamp($cart_id)
    {
        $sql = "UPDATE {$this->table} SET updated_at = NOW() WHERE cart_id = :cart_id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['cart_id' => $cart_id]);
    }
}
