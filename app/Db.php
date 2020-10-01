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

    private $select = [];

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
        $this->select['table'] = $table;
        $this->select['where'] = $where;
        return $this;
//        echo '<pre>';
//        print_r($result_mysqli);
//        echo '</pre>';
//        return $result_mysqli;
    }
    
    public function sort($key = '', $method = '')
    {
        $this->select['sort'] = [
            'key' => $key,
            'method' => $method
        ];
        return $this;
    }

    public function result()
    {
        $result_mysqli = $this->sql();
        $result = array();
        while ($row = $result_mysqli->fetch_assoc()){
            $result[] = $row;
        }
        echo '<pre>';
        print_r($result);
        echo '</pre>';
        return $result;
    }

    public function num_rows()
    {
        return $this->sql()->num_rows;
    }

    public function sql()
    {
        $sql = [];
        $i = 0;
        $sql[$i++] = "SELECT * FROM `".$this->select['table']."`";
        if(count($this->select['where']) != 0){
            $sql[$i++] = "WHERE";
            $whire_array = [];
            foreach ($this->select['where'] as $key => $val){
                $whire_array[] = "`" .$key . "`=" . $val;
            }
            $sql[$i++] = implode(" AND ", $whire_array);
        }
        if(count($this->select['sort']) != 0){
            $sort = $this->select['sort'];
            $sql[$i++] = "ORDER BY";
            if($sort['key'] != ''){
                $sql[$i++] = "`".$sort['key']."`";
                if($sort['method'] != ''){
                    $sql[$i++] = $sort['method'];
                }
            }
        }
        return $this->mysqli->query(implode(" ", $sql));
    }
}