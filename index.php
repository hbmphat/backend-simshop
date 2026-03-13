<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$users = [
    ["id"=>1,"name"=>"An"],
    ["id"=>2,"name"=>"Bình"],
    ["id"=>3,"name"=>"Chi"]
];

$request = $_SERVER['REQUEST_URI'];

$path = parse_url($request, PHP_URL_PATH);

if ($path == "/users") {

    echo json_encode($users);

}
elseif (preg_match("#^/users/(\d+)$#", $path, $matches)) {

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

    echo json_encode([
        "message"=>"API running",
        "routes"=>[
            "/users",
            "/users/{id}"
        ]
    ]);

}
