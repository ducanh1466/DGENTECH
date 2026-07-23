<?php

class OrderModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_orders';
    }

    public function getAllOrders()
    {
        $sql = "SELECT o.*, u.full_name as user_full_name 
                FROM {$this->table} o
                LEFT JOIN tb_users u ON o.user_id = u.user_id
                ORDER BY o.order_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getOrderById($id)
    {
        $sql = "SELECT o.*, u.full_name as user_full_name, u.email as user_email
                FROM {$this->table} o
                LEFT JOIN tb_users u ON o.user_id = u.user_id
                WHERE o.order_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
    
    public function getOrdersByUserId($user_id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE user_id = :user_id ORDER BY order_id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll();
    }

    public function insertOrder($user_id, $discount_id = null, $total_amount, $status = 'pending', $recipient_name, $recipient_phone, $shipping_address, $note = null)
    {
        $sql = "INSERT INTO {$this->table} (user_id, discount_id, total_amount, status, recipient_name, recipient_phone, shipping_address, note, order_date) 
                VALUES (:user_id, :discount_id, :total_amount, :status, :recipient_name, :recipient_phone, :shipping_address, :note, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'user_id' => $user_id,
            'discount_id' => $discount_id,
            'total_amount' => $total_amount,
            'status' => $status,
            'recipient_name' => $recipient_name,
            'recipient_phone' => $recipient_phone,
            'shipping_address' => $shipping_address,
            'note' => $note
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateOrderStatus($id, $status)
    {
        $sql = "UPDATE {$this->table} SET status = :status WHERE order_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'status' => $status,
            'id' => $id
        ]);
    }
}
