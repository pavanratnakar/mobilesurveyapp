<?php
class ProductFlavour{
    private $mysqli;
    private $utils;
    public function __construct() {
        $this->mysqli=new mysqli(Config::$db_server,Config::$db_username,Config::$db_password,Config::$db_database);
        $this->utils=new Utils();
    }
    public function getProductFlavours($productId){
        $productId=$this->mysqli->real_escape_string($productId);
        $query="SELECT a.product_flavour_id,a.flavour_name
                    FROM 
                    ".Config::$tables['product_flavour']." a
                    WHERE
                    product_id = '$productId'
                    ORDER BY a.flavour_name ASC";

        if ($result = $this->mysqli->query($query)) {
            $i=0;
            while ($row = $result->fetch_object()) {
                $response[$i]['id']=$row->product_flavour_id;
                $response[$i]['name']=$row->flavour_name;
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