<?php
require(__DIR__ . "/../../../partials/nav.php");
is_logged_in(true);

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "shop.php"));
}

$user_id = get_user_id();
$results = [];

if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, address, payment_method, total_price, created FROM Orders limit 10");
    try {
        $stmt->execute();
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results += $r; 
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
}

?>