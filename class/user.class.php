<?php
class User{
    private $mysqli;
    private $utils;
    public function __construct() {
        $this->mysqli=new mysqli(Config::$db_server,Config::$db_username,Config::$db_password,Config::$db_database);
        $this->utils=new Utils();
    }
    public function addDetails($userName,$userEmail,$userPhone,$meta,$ip,$useragent,$timestamp){
        $userName=$this->mysqli->real_escape_string($userName);
        $userEmail=$this->mysqli->real_escape_string($userEmail);
        $userPhone=$this->mysqli->real_escape_string($userPhone);
        $meta=$this->mysqli->real_escape_string($meta);
        $ip=$this->mysqli->real_escape_string($ip);
        $useragent=$this->mysqli->real_escape_string($useragent);
        $timestamp=$this->mysqli->real_escape_string($timestamp);
        $query = "INSERT INTO ".Config::$tables['user_table']."(userName,userEmail,userPhone,meta,ip,useragent,timestamp) VALUES('$userName','$userEmail','$userPhone','$meta','$ip','$useragent','$timestamp')";
        $result = $this->mysqli->query($query);
        return $this->mysqli->affected_rows;
    }
    public function getUserId($userEmail,$userPhone){
        $userEmail=$this->mysqli->real_escape_string($userEmail);
        $userPhone=$this->mysqli->real_escape_string($userPhone);
        $query = "SELECT user_id FROM ".Config::$tables['user_table']." WHERE useremail='".$userEmail."' AND userphone='".$userPhone."'";
        $result = $this->mysqli->query($query);
        $rowCount = $result->num_rows;
        if ($rowCount == 1) {
            while ($row = $result->fetch_object()) {
                $userid = $row->user_id;
            }
            return $userid;
        } else {
            return false;
        }
    }
    public function __destruct() {
        $this->mysqli->close();
    }
}
?>