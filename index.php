<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$users = [
    ["id"=>1,"name"=>"An"],
    ["id"=>2,"name"=>"Bình"],
    ["id"=>3,"name"=>"Chi"]
];

$request = $_SERVER['REQUEST_URI'];

if ($request == "/users") {
    echo json_encode($users);
}
else if (preg_match("/\/users\/(\d+)/",$request,$matches)) {

    $id = $matches[1];

    foreach ($users as $user){
        if($user["id"] == $id){
            echo json_encode($user);
            exit;
        }
    }

    echo json_encode(["message"=>"User not found"]);
}
else{
    echo json_encode(["message"=>"API working"]);
}