<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('Manager.php');
class BookmarkManager extends Manager
{

    public function __construct()
    {
        parent::__construct();
    }

 // return an array of picture IDs that was bookmarked-liked by the current user
 public function getBookmarkImages($limit=null) {
        $userId = (!empty($_SESSION['id']))? $_SESSION["id"]: -1;
        $stmt = $this->_connection->prepare("SELECT picture_id FROM bookmarks WHERE user_id = ? LIMIT 5");
        if($limit){
            $stmt = $this->_connection->prepare("SELECT id FROM pictures WHERE user_id = ? LIMIT ?");
            $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        }

        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $data;
    }



}
