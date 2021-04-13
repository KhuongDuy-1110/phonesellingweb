
<?php
trait ModelNews{
    // lay ve danh sach cac ban ghi
    public function modelRead($recordPerPage){
        // lay bien page truyen tu url
        $page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
        // lay tu ban ghi nao 
        $from = $page * $recordPerPage;
        $conn = Connection::getInstance();
        // thuc hien truy van
        $query = $conn->query("select * from news order by id desc limit $from, $recordPerPage");
        // tra ve nhieu ban ghi
        return $query->fetchAll();
    }
    // tinh tong so ban ghi
    public function modelTotalRecord(){
        $conn = Connection::getInstance();
        // thuc hien truy van
        $query = $conn->query("select id from news");
        // tra ve so ban ghi
        return $query->rowCount();
    }
    // lay mot ban ghi tuong ung voi id truyen vao
    public function modelGetRecord(){
        $id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
        $conn = Connection::getInstance();
        // thuc hien truy van
        $query = $conn->query("select * from news where id=$id");
        // tra ve mot ban ghi
        return $query->fetch();
    }
    public function modelGetCategory($category_id){
        $conn = Connection::getInstance();
        $query = $conn->query("select * from categories where id = $category_id");
        return $query->fetch();
    }
}
?>