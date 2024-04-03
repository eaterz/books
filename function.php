<?php

function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die();
}

function view($path, $data){
    extract($data);
    require "views/$path.view.php";
}
