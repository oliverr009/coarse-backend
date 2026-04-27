<?php

header('Content-Type: application/json');

echo json_encode([
    "status" => "Backend is working",
    "app" => "Coarse Technologies API"
]);
