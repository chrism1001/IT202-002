<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$customer_info = [];
$purchase_info = [];
$total = 0;
$user_id = get_user_id();
if ($user_id > 0) {
    $db = getDB();

    $order_id = 0;
    $stmt = $db->prepare("SELECT max(id) as id FROM Orders");
    try {
        $stmt->execute();
        $r = $stmt->fetch(PDO::FETCH_ASSOC);
        $order_id = (int)se($r, "id", 0, false);
    } catch (PDOException $e) {
        error_log(var_export($e, true));
    }

    $stmt = $db->prepare("SELECT * FROM Orders WHERE 1=1 and id = :oid and user_id=:uid");
    try {
        $stmt->execute([":uid" => $user_id, ":oid" => $order_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $customer_info += $results;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error looking up record", "danger");
    }

    if ($order_id > 0) {
        $stmt = $db->prepare("SELECT p.name, o.order_id, o.product_id, o.quantity, o.unit_price, (p.unit_price*o.quantity) as subtotal FROM OrderItems o JOIN Products p on o.product_id = p.id 
        WHERE 1=1 and o.user_id = :uid and o.order_id = :oid");
        try {
            $stmt->execute([":uid" => $user_id, ":oid" => $order_id]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                $purchase_info += $results;
            }
        } catch (PDOException $e) {
            error_log(var_export($e, true));
        }
    }
}

foreach ($customer_info as $key => $value) {
    se($value["quantity"]);
}

?>

<div class="container-fluid">
    <h1>Thank You For Your Order!</h1>
    <table class="table card-table">

    </table>
</div>