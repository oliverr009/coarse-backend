<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

echo json_encode([
    ["name"=>"HP EliteBook 840 G6","price"=>45000],
    ["name"=>"Lenovo ThinkPad T480","price"=>52000],
    ["name"=>"POS System Bundle","price"=>85000]
]);
