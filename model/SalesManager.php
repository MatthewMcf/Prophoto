<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('Manager.php');
class SalesManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }

    // return an array of picture IDs that was purchased by the current user
    public function getPurchasedImages($limit=null) {
        $userId = (!empty($_SESSION['id']))? $_SESSION["id"]: -1;
        $stmt = $this->_connection->prepare("SELECT picture_id FROM sales WHERE buyer_id = ? LIMIT 5");
        if($limit){
            $stmt = $this->_connection->prepare("SELECT picture_id FROM sales WHERE buyer_id = ? LIMIT ?");
            $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        }

        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $data;
    }

    public function insertSale($buyer, $seller, $picture) {
        $stmt = $this->_connection->prepare("INSERT INTO `sales`(
            `buyer_id`,
            `seller_id`,
            `picture_id`,
            `price`,
            `date`
        )
        VALUES(
            ?,
            ?,
            ?,
            ?,
            NOW()
        )");
        $stmt->bindParam(1, $buyer, PDO::PARAM_INT);
        $stmt->bindParam(2, $seller, PDO::PARAM_INT);
        $stmt->bindParam(3, $picture["id"], PDO::PARAM_INT);
        $stmt->bindParam(4, $picture["price"], PDO::PARAM_INT);
        $stmt->execute(); 
        $stmt->closeCursor();
    }

    public function checkIfPurchased($buyer, $picture) {
        $stmt = $this->_connection->prepare("SELECT picture_id FROM sales WHERE buyer_id = ? AND picture_id = ?");
        $stmt->bindParam(1, $buyer, PDO::PARAM_INT);
        $stmt->bindParam(2, $picture["id"], PDO::PARAM_INT);
        $stmt->execute(); 
        $stmt->closeCursor();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            return true;
        } else {
            return false;
        }

    }


}
