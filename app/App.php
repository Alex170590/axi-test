<?php

class App
{
    public $admin = [
        'login' => 'admin',
        'password' => 'admin'
    ];

    public $color = [
        ['name' => 'Черный', 'hex' => '#000000'],
        ['name' => 'Серебряный', 'hex' => '#C0C0C0'],
        ['name' => 'Серый', 'hex' => '#808080'],
        ['name' => 'Белый', 'hex' => '#FFFFFF'],
        ['name' => 'Бордовый', 'hex' => '#800000'],
        ['name' => 'Красный', 'hex' => '#FF0000'],
        ['name' => 'Пурпурный', 'hex' => '#800080'],
        ['name' => 'Зеленый', 'hex' => '#008000'],
        ['name' => 'Желтый', 'hex' => '#FFFF00'],
        ['name' => 'Синий', 'hex' => '#0000FF'],
    ];

    public $skills = ['усидчивость', 'опрятность', 'самообучаемость', 'трудолюбие'];

    public $token = '';

    public function __construct()
    {
        $this->token = crypt($_SERVER['HTTP_USER_AGENT']);
    }

    public function noPage()
    {
        $db = new Db();
        if($db->select('axi_questionnaires', ['id' => (new Route())->params[1]])->num_rows() == 0){
            header('Location: /404', true, '301');
        }
    }

    public function filesConvert($files_result){
        $result = [];
        foreach ($files_result['name'] as $key_a => $val_a){
            foreach ($files_result as $key_b => $val_b){
                if(!is_array($val_b[$key_a])){
                    $result[$key_a][$key_b] = $val_b[$key_a];
                } else {
                    foreach ($files_result['name'][$key_a] as $key_c => $val_c){
                        $result[$key_a][$key_c][$key_b] = $val_b[$key_a][$key_c];
                    }
                }
            }
        }
        return $result;
    }

    public function filterDbDate($date)
    {
        $date = explode(" ", $date);
        $date = explode("-", $date[0]);
        return $date[2] . '.' . $date[1] . '.' . $date[0];
    }
}