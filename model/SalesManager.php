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
        $stmt = $this->_connection->prepare("SELECT id_picture FROM sales WHERE id_buyer = ? LIMIT 5");
        if($limit){
            $stmt = $this->_connection->prepare("SELECT id_picture FROM sales WHERE id_buyer = ? LIMIT ?");
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
            `id_buyer`,
            `id_seller`,
            `id_picture`,
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
        $stmt = $this->_connection->prepare("SELECT id_picture FROM sales WHERE id_buyer = ? AND id_picture = ?");
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
