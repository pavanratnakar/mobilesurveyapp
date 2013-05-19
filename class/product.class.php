<?php
class Product{
    private $mysqli;
    private $utils;
    public function __construct() {
        $this->mysqli=new mysqli(Config::$db_server,Config::$db_username,Config::$db_password,Config::$db_database);
        $this->utils=new Utils();
    }
    public function getProducts($categoryId,$categoryMetaId){
        $categoryId=$this->mysqli->real_escape_string($categoryId);
        $categoryMetaId=$this->mysqli->real_escape_string($categoryMetaId);
        $query="SELECT a.product_id,a.product_name
                    FROM 
                    ".Config::$tables['product_table']." a
                    WHERE
                    category_id = '$categoryId'
                    AND
                    category_meta_id = '$categoryMetaId'
                    ORDER BY a.product_name ASC";

        if ($result = $this->mysqli->query($query)) {
            $i=0;
            while ($row = $result->fetch_object()) {
                $response[$i]['id']=$row->product_id;
                $response[$i]['name']=$row->product_name;
                $i++;
            }
        }
        return $response;
    }
    public function __destruct() {
        $this->mysqli->close();
    }
}
?>