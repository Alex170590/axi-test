<?php
//header('Location: /404');
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/Route.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/app/App.php';
$url = new Route();
include_once $_SERVER['DOCUMENT_ROOT'] . '/template/' . $url->file;