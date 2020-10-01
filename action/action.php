<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/App.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Db.php';
if(hash_equals($_POST['token'], crypt($_SERVER['HTTP_USER_AGENT'], $_POST['token']))){
    $app = new App();
    $db = new Db();
    $files = $app->filesConvert($_FILES['param']);

    $db->insert('axi_questionnaires', $_POST['param']);
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
}