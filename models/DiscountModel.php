<?php

class DiscountModel extends BaseModel
{
    public function getDiscountByCode($code)
    {
        $sql = "SELECT * FROM tb_discounts WHERE discount_code = ? AND status = 'active' AND start_date <= NOW() AND end_date >= NOW() AND current_usage < usage_limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function increaseUsage($discountId)
    {
        $sql = "UPDATE tb_discounts SET current_usage = current_usage + 1 WHERE discount_id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$discountId]);
    }
}
