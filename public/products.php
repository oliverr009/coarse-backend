<?php

header('Content-Type: application/json');

echo json_encode([
    [
        "name" => "HP EliteBook 840 G6",
        "price" => 45000
    ],
    [
        "name" => "Lenovo ThinkPad T480",
        "price" => 52000
    ],
    [
        "name" => "POS System Bundle",
        "price" => 85000
    ]
]);
