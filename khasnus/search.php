<?php
header("Content-Type: application/json");
require "config.php";

if (!isset($_GET['q']) || trim($_GET['q']) === "") {
    echo json_encode([
        "status" => "error",
        "message" => "Masukkan kata kunci pencarian."
    ]);
    exit;
}

$q = mysqli_real_escape_string($conn, $_GET['q']);
$sql_prov = "
    SELECT id FROM provinces
    WHERE name LIKE '%$q%'
    OR alternate_name LIKE '%$q%'
    LIMIT 1
";
$result_prov = mysqli_query($conn, $sql_prov);
$prov = mysqli_fetch_assoc($result_prov);
$province_id = $prov ? $prov['id'] : null;

$sql_food = "
    SELECT foods.*, provinces.name AS province_name
    FROM foods
    JOIN provinces ON foods.province_id = provinces.id
    WHERE foods.name LIKE '%$q%'
    " . ($province_id ? " OR foods.province_id = $province_id" : "") . "
";
$result_food = mysqli_query($conn, $sql_food);
$foods = [];

while ($row = mysqli_fetch_assoc($result_food)) {
    $foods[] = [
        "id" => $row["id"],
        "province_id" => $row["province_id"],
        "province_name" => $row["province_name"],
        "name" => $row["name"],
        "description" => $row["description"],
        "ingredients" => $row["ingredients"],
        "recipe" => $row["recipe"],
        "image" => $row["image"]
    ];
}
if (empty($foods)) {
    echo json_encode([
        "status" => "not_found",
        "message" => "Tidak ditemukan makanan khas untuk kata kunci: $q"
    ]);
    exit;
}
echo json_encode([
    "status" => "success",
    "keyword" => $q,
    "total" => count($foods),
    "data" => $foods
]);
?>
