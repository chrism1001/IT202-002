<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = se($_GET, "id", -1, false);
$user_id = get_user_id();

$customer_info = [];
$purchase_info = [];
$db = getDB();
$stmt = $db->prepare("SELECT * FROM Orders WHERE id = :id");
try {
    $stmt->execute([":id" => $id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $customer_info += $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

$stmt = $db->prepare("SELECT p.name, o.order_id, o.product_id, o.quantity, o.unit_price, (p.unit_price*o.quantity) as subtotal FROM OrderItems o JOIN Products p on o.product_id = p.id
WHERE 1=1 and o.user_id = :uid and o.order_id = :oid");
try {
    $stmt->execute([":uid" => $user_id, ":oid" => $id]);
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $purchase_info += $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
}

$total = 0;
$payment = 0;
foreach ($customer_info as $key => $value) {
    $total = $value["total_price"];
    $payment = $value["money_received"];
}

se($total);
se($payment);

?>