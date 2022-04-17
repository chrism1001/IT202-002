<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("add_to_Cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$product_id = (int)se($_POST, "product_id", 0, false);
$desired_quantity = (int)se($_POST, "desired_quantity", 0, false);
$respone = ["status" => 400, "message" => "Invalid data"];
http_response_code(400);
if (isset($product_id) && $product_id !== 0 && $desired_quantity > 0) {
    if (is_logged_in()) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO CART (product_id, desired_quantity, user_id) VALUES(:pid, :q, :uid) ON DUPLICATE KEY UPDATE desired_quantity = desired_quantity + :q");
        $stmt->bindValue(":pid", $product_id, PDO::PARAM_INT);
        $stmt->bindValue(":q", $desired_quantity, PDO::PARAM_INT);
        $stmt->bindValue(":uid", get_user_id(), PDO::PARAM_INT);
        try {
            $stmt->execute();
            $response["status"] = 200;
            $response["message"] = "Item added to cart";
            http_response_code(200);
        } catch (PDOException $e) {
            error_log("Add to cart error: " . var_export($e, true));
            $response["message"] = "Error adding item to cart";
        }
    } else {
        http_response_code(403);
        $response["status"] = 403;
        $response["message"] = "Must be logged in to add to cart";
    }
}
echo json_encode($respone);