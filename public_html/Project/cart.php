<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$TABLE_NAME = "CART";
$result = [];
$columns = get_columns($TABLE_NAME);
$ignore = ["id", "modified", "created"];
$db = getDB();



?>

<script>
    // get_cart();
</script>

<div class="container-fluid">
    <h1>Cart</h1>
    <table class="table card-table">
        <thead>
            <th>Item</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Subtotal</th>
            <th>Item</th>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>