<?php

class Db
{
    private $mysqli;

    private $config = array(
        "host" => "localhost",
        "username" => "root",
        "password" => "root",
        "dbname" => "axi-test"
    );

    public function __construct() {
        try{
            $this->mysqli = new mysqli($this->config['host'], $this->config['username'], $this->config['password'], $this->config['dbname']);
            if ($this->mysqli->connect_errno) {
                throw new Exception('Ошибка: Не удалась создать соединение с базой MySQL');
            }
        } catch (Exception $e){
            echo $e->getMessage();
            exit;
        }

    }

    public function insert($table, $params = array())
    {

        if(count($params) != 0){
            $insert_key = [];
            $insert_value = [];
            foreach ($params as $key => $val){
                $insert_key[] = $key;
                if(is_array($val)){
                    $insert_value[] = "'".json_encode($val, JSON_UNESCAPED_UNICODE)."'";
                } elseif(is_numeric($val)) {
                    $insert_value[] = $val;
                } else {
                    $insert_value[] = "'".$val."'";
                }
            }
            $insert_key = implode(", ", $insert_key);
            $insert_value = implode(", ", $insert_value);
            $insert_string = " (".$insert_key.") VALUES (".$insert_value.")";
            $this->mysqli->query("INSERT INTO `".$table."`" . $insert_string);
        }
    }

    public function select($table, $where = array())
    {
        $result_mysqli = $this->mysqli->query("SELECT * FROM `".$table."`");
        return $result_mysqli;
    }
}