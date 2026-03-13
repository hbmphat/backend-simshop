<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$users = [
    ["id"=>1,"name"=>"An"],
    ["id"=>2,"name"=>"Bình"],
    ["id"=>3,"name"=>"Chi"]
];

$route = $_GET['route'] ?? null;
$id = $_GET['id'] ?? null;

if ($route == "users" && !$id) {

    echo json_encode($users);

}
elseif ($route == "users" && $id) {

    foreach ($users as $user){
        if($user["id"] == $id){
            echo json_encode($user);
            exit;
        }
    }

    echo json_encode(["message"=>"User not found"]);

}
else{

    echo json_encode([
        "message"=>"API working",
        "routes"=>[
            "/?route=users",
            "/?route=users&id=1"
        ]
    ]);

}
