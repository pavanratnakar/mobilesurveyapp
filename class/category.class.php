<?php
class Category{
    private $mysqli;
    private $utils;
    public function __construct() {
        $this->mysqli=new mysqli(Config::$db_server,Config::$db_username,Config::$db_password,Config::$db_database);
        $this->utils=new Utils();
    }
    public function getCategories(){
        $query="SELECT a.category_name,a.category_id
                    FROM 
                    ".Config::$tables['category_table']." a
                    ORDER BY a.category_name ASC";

        if ($result = $this->mysqli->query($query)) {
            $i=0;
            while ($row = $result->fetch_object()) {
                $response[$i]['id']=$row->category_id;
                $response[$i]['name']=$row->category_name;
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