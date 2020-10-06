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

    public function insert($table, $params = [])
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

    public function select($table, $where = [])
    {
        $this->select['table'] = $table;
        $this->select['where'] = $where;
        return $this;
    }
    
    public function sort($key = '', $method = '')
    {
        $this->select['sort'] = [
            'key' => $key,
            'method' => $method
        ];
        return $this;
    }

    public function limit($num)
    {
        $this->select['limit'] = $num;
        return $this;
    }

    public function offset($num)
    {
        $this->select['offset'] = $num;
        return $this;
    }

    public function result($n = -1)
    {
        $result_mysqli = $this->sql();
        $result = array();
        if($result_mysqli->num_rows != 0){
            while($row = $result_mysqli->fetch_assoc()){
                $element = [];
                foreach ($row as $key => $val){
                    if(((is_string($val) && (is_object(json_decode($val)) || is_array(json_decode($val)))))){
                        $element[$key] = json_decode($val);
                    } else {
                        $element[$key] = $val;
                    }
                }
                $result[] = $element;
            }
        }
        return ($n == -1 || $n < 0) ? $result : $result[$n];
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
                $key = explode(".", $key);
                if(!empty($key[1]) && $key[1] == 'json'){
                    $whire_array[] = "`" .$key[0] . "` LIKE '%" . $val . "%'";
                } else {
                    $whire_array[] = "`" .$key[0] . "` = '" . $val . "'";
                }
            }
            $sql[$i++] = implode(" AND ", $whire_array);
        }
        if($this->select['sort']['key'] != '' && $this->select['sort']['method'] != ''){
            $sort = $this->select['sort'];
            $sql[$i++] = "ORDER BY";
            if($sort['key'] != ''){
                $sql[$i++] = "`".$sort['key']."`";
                if($sort['method'] != ''){
                    $sql[$i++] = $sort['method'];
                }
            }
        }
        if($this->select['limit'] != ''){
            $sql[$i++] = "LIMIT " . $this->select['limit'];
        }
        if($this->select['offset'] != ''){
            $sql[$i++] = "OFFSET " . $this->select['offset'];
        }
        return $this->mysqli->query(implode(" ", $sql));
    }
//
//    public function isJSON($string) {
//        return  ? true : false;
//    }
}