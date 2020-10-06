<?php

class Route
{
    public $sitemap = [
        '404' => [
            'file' => '404.php',
            'title' => '404'
        ],
        '/' => [
            'file' => 'home.php',
            'title' => 'Главная'
        ],
        '/questionnaire-ok' => [
            'file' => 'questionnaire-ok.php',
            'title' => 'Анкетирование успешно'
        ],
        '/auth' => [
            'file' => 'auth.php',
            'title' => 'Вход',
            'req' => 'Y',
            'user' => "applicant"
        ],
        '/admin' => [
            'file' => 'admin.php',
            'title' => 'Админ панель',
            'req' => 'Y',
            'user' => "admin"
        ],
        '/admin/([0-9]+)' => [
            'file' => 'admin.php',
            'title' => 'Админ панель',
            'req' => 'Y',
            'user' => "admin"
        ],
        '/admin/page([0-9]+)' => [
            'file' => 'admin-page.php',
            'req' => 'Y',
            'user' => "admin"
        ],
    ];

    public static $title = '';
    public $params = null;
    public $file = '';
    public $data = null;
    public $request_uri = '';

    public $url_info = array();



    function __construct()
    {
        $this->request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->url_info = parse_url($this->request_uri);
        $uri = urldecode($this->url_info['path']);
        $data = false;
        foreach ($this->sitemap as $term => $option) {
            $match = array();
            $i = preg_match('@^'.$term.'$@Uu', $uri, $match);
            if ($i > 0) {
                $data = array(
                    'file' => isset($option['file']) ? strtolower(trim($option['file'])) : '',
                    'title' => isset($option['title']) ? trim($option['title']) : '',
                    'params' => $match,
                    'req' => isset($option['req']) ? trim($option['req']) : 'N',
                    'user' => isset($option['user']) ? trim($option['user']) : '',
                );
                break;
            }
        }
        if($data['req'] == "N"){
            if($data !== false){
                $this->file = $data['file'];
                $this::$title = $data['title'];
                $this->params = $data['params'];
            } else {
                $option = $this->sitemap['404'];
                $this->file = strtolower(trim($option['file']));
                $this::$title = isset($option['title']) ? trim($option['title']) : '';
            }
        } else {
            if($_SESSION['user'] == $data['user']){
                $this->file = $data['file'];
                $this::$title = $data['title'];
                $this->params = $data['params'];
            } else {
                $option = $this->sitemap['404'];
                $this->file = strtolower(trim($option['file']));
                $this::$title = isset($option['title']) ? trim($option['title']) : '';
            }
        }

        return $this->file;
    }
}