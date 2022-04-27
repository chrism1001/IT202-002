<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

error_log("get_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$user_id = get_user_id();

$response = ["status" => 400, "message" => "Unhandled error"];
$res = [];
http_response_code(400);
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("Select p.name, c.id as line_id, c.product_id, c.desired_quantity, p.unit_price, (p.unit_price*c.desired_quantity) as subtotal FROM CART c JOIN Products p on c.product_id = p.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        if ($results) {
            $response["status"] = 200;
            //flash("Retrieved cart.");
            $response["message"] = "Retrieved cart";
            $response["data"] = $results;
            $res += $results;
        } else {
            $response["status"] = 200;
            //flash("No items in cart");
            $response["message"] = "No items in cart";
            $response["data"] = [];
        }
    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }
} else {
    $response["status"] = 403;
    $response["message"] = "You must be logged in to fetch your cart";
    http_response_code(403);
}
//echo json_encode($response);
//flash($response["message"]);

$total = 0;
foreach ($res as $key => $value) {
    $total += $value["subtotal"];
}

?>

<script>
    //get_cart();
</script>

<div class="container-fluid">
    <h1>Cart</h1>
    <table class="table card-table">
        <thead>
            <th>Item</th>
            <th>Quantity</th>
            <th>Cost</th>
            <th>Subtotal</th>
            <th>Delete Item</th>
            <th>Update Item</th>
            <th></th>
        </thead>
        <tbody>
            <?php if (count($res) == 0) : ?>
                <tr>
                    <td>
                        <p>Cart is empty</p>
                    </td>
                </tr>
            <?php else : ?>
                <?php foreach ($res as $key => $value) : ?>
                    <tr>
                        <td><?php se($value["name"]); ?></td>
                        <td>
                            <form method="POST">
                                <input class="form-control" value="<?php se($value["desired_quantity"]); ?>">
                            </form>
                        </td>
                        <td><?php se($value["unit_price"]); ?></td>
                        <td><?php se($value["subtotal"]); ?></td>
                        <td>
                            <button class="btn btn-danger" onclick="deleteLineItem('<?php se($value['line_id']); ?>', '<?php se($key); ?>')">x</button>
                        </td>
                        <td>
                            <button class="btn btn-primary" onclick="add_to_cart('<?php se($value['product_id']) ?>', )">Update</button>
                        </td>
                        <td>
                            <a href="product_details.php?id=<?php se($value['product_id']); ?>">Product Details</a>
                        </td>
                        <?php if (has_Role("Admin")) : ?>
                            <td>
                                <a href="admin/edit_product.php?id=<?php se($value['product_id']); ?>">Edit</a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            <tr>
                <td colspan="100%">
                    <button class="btn btn-danger" onclick="clearCart('<?php se($user_id); ?>')">Delete Cart</button>
                </td>
            </tr>
            <tr>
                <td colspan="100%">Total: <?php se($total); ?></td>
            </tr>
            <tr>
                <td colspan="100%"><button class="btn btn-primary" onclick="location.href = 'checkout_form.php'">Purchase</button></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>