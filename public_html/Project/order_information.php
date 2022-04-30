<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$id = se($_GET, "id", -1, false);
$user_id = get_user_id();

$customer_info = [];
$purchase_info = [];
$ignore = ["total_price", "money_received"];
$db = getDB();
$stmt = $db->prepare("SELECT name, address, payment_method, total_price, money_received FROM Orders WHERE id = :id");
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

$stmt = $db->prepare("SELECT p.name, o.quantity, o.unit_price, (p.unit_price*o.quantity) as subtotal FROM OrderItems o JOIN Products p on o.product_id = p.id
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

?>

<div class="container-fluid">
    <h1>Order #<?php se($id) ?></h1>
    <table class="table card-table">
        <?php foreach ($customer_info as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php if (!in_array($column, $ignore)) : ?>
                            <th><?php se($column); ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <?php if (!in_array($column, $ignore)) : ?>
                        <td><?php se($value); ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

    <table class="table card-table">
        <?php foreach ($purchase_info as $index => $record) : ?>
            <?php if ($index == 0) : ?>
                <thead>
                    <?php foreach ($record as $column => $value) : ?>
                        <th><?php se($column); ?></th>
                    <?php endforeach; ?>
                </thead>
            <?php endif; ?>
            <tr>
                <?php foreach ($record as $column => $value) : ?>
                    <td><?php se($value); ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="100%">Total: <?php se($total); ?></td>
        </tr>
        <tr>
            <td colspan="100%">Payment: <?php se($payment); ?></td>
        </tr>
    </table>
</div>