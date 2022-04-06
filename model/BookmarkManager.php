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
            $stmt = $this->_connection->prepare("SELECT picture_id FROM bookmarks WHERE user_id = ? LIMIT ?");
            $stmt->bindParam(2, $limit, PDO::PARAM_INT);
        }

        $stmt->bindParam(1, $userId, PDO::PARAM_INT);
        $stmt->execute(); 
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $data;
    }

    public function setBookmarkImage($picture_id){ //, $user_id) {
        $user_id = (!empty($_SESSION['id']))? $_SESSION["id"]: -1;
        $req = $this->_connection->prepare("INSERT INTO bookmarks (user_id, picture_id) VALUES( :user_id, :picture_id)");
        $req->execute(array(
            "user_id" => $user_id,
            "picture_id" => $picture_id
        ));
        $req->closeCursor();
        return true;
    }

    public function deleteBookmarkImage($picture_id){ //, $user_id) {
        $user_id = (!empty($_SESSION['id']))? $_SESSION["id"]: -1;
        $sql = $this->_connection->prepare("DELETE FROM bookmarks WHERE user_id = :user_id AND picture_id = :picture_id");
        $sql->execute(array(
            'user_id' => $user_id,
            'picture_id' => $picture_id
        ));
        $sql->closeCursor();
        return true;
    }

}
