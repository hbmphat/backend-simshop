<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$data = [
    [
        "number" => "0988888888",
        "price" => "3500000"
    ],
    [
        "number" => "0916668888",
        "price" => "2800000"
    ]
];

echo json_encode($data);