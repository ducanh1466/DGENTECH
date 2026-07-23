<?php

class OrderDetailModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'tb_order_details';
    }

    public function insertOrderDetail($order_id, $product_id, $variant_id = null, $quantity, $unit_price)
    {
        $sql = "INSERT INTO {$this->table} (order_id, product_id, variant_id, quantity, unit_price) 
                VALUES (:order_id, :product_id, :variant_id, :quantity, :unit_price)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'order_id' => $order_id,
            'product_id' => $product_id,
            'variant_id' => $variant_id,
            'quantity' => $quantity,
            'unit_price' => $unit_price
        ]);
    }

    public function getDetailsByOrderId($order_id)
    {
        $sql = "SELECT od.*, p.product_name, p.image as product_image
                FROM {$this->table} od
                LEFT JOIN tb_products p ON od.product_id = p.product_id
                WHERE od.order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $order_id]);
        return $stmt->fetchAll();
    }
}
