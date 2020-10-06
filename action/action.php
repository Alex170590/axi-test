<?php
@session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/App.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Upload.php';
$app = new App();
$db = new Db();
$upload = new Upload();
if(hash_equals($_POST['token'], crypt($_SERVER['HTTP_USER_AGENT'], $_POST['token']))){
    switch ($_POST['action_type']){
        case 'questionnaire':
            $files = $app->filesConvert($_FILES['param']);
            $params = $_POST['param'];
            $date = explode(".", $params['data_birth']);
            $params['data_birth'] = $date[2] . '-' . $date[1] . '-' . $date[0] . ' 00:00:00';
            if($files['avatar']['error'] == 0){
                $params['avatar'] = $upload->add($files['avatar'], [60, 60], true);
            }
            $params['photo'] = [];
            foreach ($files['photo'] as $key => $val){
                if($val['error'] == 0){
                    $params['photo'][] = $upload->add($val, [600, 700]);
                }
            }
            $db->insert('axi_questionnaires', $params);
            header('Location: /questionnaire-ok');
            break;
        case 'auth':
            $params = $_POST['param'];
            if($app->admin['password'] == $params['password']){
                $_SESSION['user'] = 'admin';
                    header('Location: /admin');
            } else {
                header('Location: /auth?error');
            }
            break;

        case 'sort':
            if($_POST['submit'] == 'close'){
                $_SESSION['sort'] = [];
            }
            if($_POST['submit'] == 'sort'){
                $_SESSION['sort'] = $_POST['params'];
            }
            header('Location: ' . $_POST['url']);
            break;

        case 'filter':
            if($_POST['submit'] == 'search'){
                $_SESSION['filter'] = $_POST['params'];
            }
            if($_POST['submit'] == 'close'){
                $_SESSION['filter'] = [];
            }
            header('Location: ' . $_POST['url']);
            break;
    }
}