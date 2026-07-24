<?php

class ReviewModel extends BaseModel
{
    // Check if a user has purchased a product and the order is completed
    public function canUserReview($userId, $productId)
    {
        $sql = "SELECT COUNT(*) as count 
                FROM tb_orders o 
                JOIN tb_order_items od ON o.order_id = od.order_id 
                LEFT JOIN tb_product_variants pv ON od.variant_id = pv.variant_id
                WHERE o.user_id = ? AND (od.variant_id = ? OR pv.product_id = ?) AND o.status = 'completed'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId, $productId, $productId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result && $result['count'] > 0;
    }

    // Add a new review
    public function addReview($productId, $userId, $rating, $comment)
    {
        // First find an eligible order_id
        $sqlOrder = "SELECT o.order_id 
                FROM tb_orders o 
                JOIN tb_order_items od ON o.order_id = od.order_id 
                LEFT JOIN tb_product_variants pv ON od.variant_id = pv.variant_id
                WHERE o.user_id = ? AND (od.variant_id = ? OR pv.product_id = ?) AND o.status = 'completed'
                LIMIT 1";
        $stmtOrder = $this->pdo->prepare($sqlOrder);
        $stmtOrder->execute([$userId, $productId, $productId]);
        $order = $stmtOrder->fetch(PDO::FETCH_ASSOC);

        if (!$order) {
            return false;
        }
        $orderId = $order['order_id'];

        $sql = "INSERT INTO tb_reviews (order_id, product_id, rating, content, review_date) 
                VALUES (?, ?, ?, ?, CURDATE())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$orderId, $productId, $rating, $comment]);
    }

    // Get all reviews for a product
    public function getReviewsByProductId($productId)
    {
        $sql = "SELECT r.*, r.review_date as created_at, r.content as comment, u.full_name, NULL as avatar 
                FROM tb_reviews r 
                JOIN tb_orders o ON r.order_id = o.order_id 
                JOIN tb_users u ON o.user_id = u.user_id 
                WHERE r.product_id = ? 
                ORDER BY r.review_date DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$productId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
