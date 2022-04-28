<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

if (isset($_POST["purchase"])) {

}

$user_id = get_user_id();
$username = get_username();
$res = [];

if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("Select p.name, c.id as line_id, c.product_id, c.desired_quantity, p.unit_price, (p.unit_price*c.desired_quantity) as subtotal FROM CART c JOIN Products p on c.product_id = p.id WHERE c.user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $res += $results;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error looking up record", "danger");
    }
}

$total = 0;
foreach ($res as $key => $value) {
    $total += $value["subtotal"];
}

?>

<div class="container-fluid">
    <h1>Order Page</h1>
    <form onsubmit="return validate(this)" method="POST">

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="fname">First Name</label>
                <input class="form-control" type="text" />
            </div>
            <div class="form-group col-md-6">
                <label for="lname">Last Name</label>
                <input class="form-control" type="text" />
            </div>
        </div>

        <div class="mb-2">
                <label for="fname">Address</label>
                <input class="form-control" type="text" />
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-label" >City</label>
                <input class="form-control" />
            </div>
            <div class="form-group col-md-4">
                <label class="form-label" >State</label>
                <select id="inputState" class="form-control">
                    <option selected>Choose...</option>
                    <option>California</option>
                    <option>Florida</option>
                    <option>New Jersey</option>
                    <option>New York</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label class="form-label" >Zip Code</label>
                <input class="form-control" />
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label" >Payment Method</label>
            <select id="payment_method" class="form-control">
                        <option selected>Choose...</option>
                        <option>Cash</option>
                        <option>Visa</option>
                        <option>MasterCard</option>
                        <option>Amex</option>
            </select>
        </div>

        <div>
            <h5>Total: <?php se($total); ?></h5>
        </div>

        <div class="mb-4">
            <label class="form-label" >Enter a balance: </label>
            <input class="form-control" type="number" name="payment" />
        </div>
        
        <input class="btn btn-primary" type="submit" value="Complete Purchase" />
    </form>
</div>

<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>