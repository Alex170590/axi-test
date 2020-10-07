<?php
@session_start();
if(empty($_SESSION['user'])){
    $_SESSION['user'] = 'applicant';
}
if(empty($_SESSION['sort'])){
    $_SESSION['sort'] = [];
}
if(empty($_SESSION['filter'])){
    $_SESSION['filter'] = [];
}
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Db.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Route.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/App.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Navigation.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/' . (new Route())->file;