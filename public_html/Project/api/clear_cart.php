<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("clear_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$response = ["status" => 400, "message" => "Unhandled error"];
http_response_code(400);
$user_id = (int)se($_REQUEST, "user_id", 0, false);
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("DELETE FROM CART where user_id = :uid");
    try {
        //added user_id to ensure the user can only delete their own items
        $stmt->execute([":uid" => $user_id]);
        $response["status"] = 200;
        $response["message"] = "Cart cleared";
        http_response_code(200);
    } catch (PDOException $e) {
        error_log("Error deleting line item: " . var_export($e, true));
        $response["message"] = "Error clearing cart";
    }
}
echo json_encode($response);