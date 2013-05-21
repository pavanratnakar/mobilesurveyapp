<?php
class Questionnaire{
    private $mysqli;
    private $utils;
    public function __construct() {
        $this->mysqli=new mysqli(Config::$db_server,Config::$db_username,Config::$db_password,Config::$db_database);
        $this->utils=new Utils();
    }
    public function addDetails($user_id,$product_id,$flavour_id,$meta,$ip,$useragent,$timestamp){
        $user_id=$this->mysqli->real_escape_string($user_id);
        $product_id=$this->mysqli->real_escape_string($product_id);
        $flavour_id=$this->mysqli->real_escape_string($flavour_id);
        $meta=$this->mysqli->real_escape_string($meta);
        $ip=$this->mysqli->real_escape_string($ip);
        $useragent=$this->mysqli->real_escape_string($useragent);
        $timestamp=$this->mysqli->real_escape_string($timestamp);
        $query = "INSERT INTO ".Config::$tables['questionnaire_table']."(user_id,product_id,flavour_id,meta,ip,useragent,timestamp) VALUES('$user_id','$product_id','$flavour_id','$meta','$ip','$useragent','$timestamp')";
        $result = $this->mysqli->query($query);
    }
    public function __destruct() {
        $this->mysqli->close();
    }
}
?>