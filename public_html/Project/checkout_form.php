<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$user_id = get_user_id();
$username = get_username();
$total = 0;
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

foreach ($res as $key => $value) {
    $total += $value["subtotal"];
}

if (isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["inputState"]) &&
    isset($_POST["zipcode"]) && isset($_POST["payment"])) {
    $fullname = "";
    $fname = se($_POST, "fname", "", false);
    $lname = se($_POST, "lname", "", false);
    $fullname = $fname . " " . $lname;

    $address = "";
    $addr = se($_POST, "address", "", false);
    $city = se($_POST, "city", "", false);
    $state = se($_POST, "inputState", "", false);
    $zipcode = se($_POST, "zipcode", -1, false);
    $address = $addr . ", " . $city . ", " . $state . " " . strval($zipcode);

    $payment_method = se($_POST, "payment_method", "", false);
    $payment = se($_POST, "payment", -1, false);

    $db = getDB();
    $stmt = $db->prepare("Select p.name, c.id as line_id, c.product_id, p.stock, c.desired_quantity, p.unit_price, (p.unit_price*c.desired_quantity) as subtotal FROM CART c JOIN Products p on c.product_id = p.id WHERE c.user_id = :uid");
    $res = [];
    try {
        $stmt->execute([":uid" => $user_id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $res += $results;
        }

        // make sure user can affor cart
        $has_error = true;
        if ($payment < $total) {
            flash("You cannot afford to purchase your cart", "danger");
            $has_error = false;
        } 

        // quantity check
        foreach ($res as $key => $value) {
            if ((int)$value["stock"] < (int)$value["desired_quantity"]) {
                $warning = "The item " . strval($value["name"]) . " only has " . strval($value["stock"]) . " units in stock. Please Update Cart.";
                flash($warning);
                $has_error = false;
            }
        }

        // transaction process
        if ($has_error) {
            $db->beginTransaction();

            // create order entry
            $stmt = $db->prepare("INSERT INTO Orders (user_id, total_price, address, payment_method, money_received, name) VALUES(:uid, :tprice, :address, :pmethod, :payment, :name)");
            try {
                $stmt->execute([":uid" => get_user_id(), ":tprice" => $total, ":address" => $address, ":pmethod" => $payment_method, ":payment" => (int)$payment, ":name" => $fullname]);
            } catch (Exception $e) {
                error_log("Error inserting into orders table" . var_export($e, true));
            }

            // get order_id
            $stmt = $db->prepare("SELECT max(id) as id FROM Orders");
            $next_order_id = 0;
            try {
                $stmt->execute();
                $r = $stmt->fetch(PDO::FETCH_ASSOC);
                $next_order_id = (int)se($r, "id", 0, false);
                $next_order_id++;
            } catch (PDOException $e) {
                error_log("Error fetching order_id: " . var_export($e));
                $db->rollback();
            }

            // map cart to orderItems for order history
            if ($next_order_id > 0) {
                $stmt = $db->prepare("INSERT INTO OrderItems (user_id, order_id, product_id, quantity, unit_price)
                SELECT user_id, :oid, p.id, c.desired_quantity, p.unit_price FROM CART c JOIN Products p ON c.product_id = p.id 
                WHERE user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id, ":oid" => $next_order_id]);
                } catch (PDOException $e) {
                    error_log("Error mapping cart data to order history: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0; 
                }
            }

            // updating stock
            if ($next_order_id > 0) {
                $stmt = $db->prepare("UPDATE Products set stock = stock - (select IFNULL(desired_quantity, 0) FROM CART WHERE product_id = Products.id and user_id = :uid)
                WHERE id in (SELECT product_id FROM CART where user_id = :uid)");
                try {
                    $stmt->execute([":uid" => $user_id]);
                } catch (PDOException $e) {
                    error_log("Update stock error: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0;
                }
            }

            // clear users cart
            if ($next_order_id > 0) {
                $stmt = $db->prepare("DELETE FROM CART WHERE user_id = :uid");
                try {
                    $stmt->execute([":uid" => $user_id]);
                    $db->commit();
                    flash("Purchase Complete");
                } catch (PDOException $e) {
                    error_log("Error deleting cart: " . var_export($e, true));
                    $db->rollback();
                    $next_order_id = 0;
                }
            }
        }

    } catch (PDOException $e) {
        error_log("Error fetching cart" . var_export($e, true));
    }
}

?>

<div class="container-fluid">
    <h1>Order Page</h1>
    <form onsubmit="return validate(this);" method="POST">

        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="fname">First Name</label>
                <input class="form-control" type="text" id="fname" name="fname" />
            </div>
            <div class="form-group col-md-6">
                <label for="lname">Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname" />
            </div>
        </div>

        <div class="mb-2">
                <label for="fname">Address</label>
                <input class="form-control" type="text" id="address" name="address" />
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label class="form-label" >City</label>
                <input class="form-control" type="text" id="city" name="city" />
            </div>
            <div class="form-group col-md-4">
                <label class="form-label" >State</label>
                <select id="inputState" class="form-control" name="inputState" >
                    <option selected>Choose...</option>
                    <option>California</option>
                    <option>Florida</option>
                    <option>New Jersey</option>
                    <option>New York</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label class="form-label" >Zip Code</label>
                <input class="form-control" type="number" id="zipcode" name="zipcode" />
            </div>
        </div>

        <div class="mb-2">
            <label class="form-label" >Payment Method</label>
            <select id="paymentMethod" class="form-control" name="paymentMethod" >
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
            <label class="form-label" >Enter payment: </label>
            <input class="form-control" type="number" id="payment" name="payment" />
        </div>
        

        <input type="submit" class="mt-3 btn btn-primary" value="Complete Purchase" />
    </form>
</div>

<script>
    function validate(form) {

        const alphanum = /^[a-zA-Z0-9 ]*$/;
        const digit = /^\d+$/;

        var has_error = true;

        var fname = document.getElementById("fname").value;
        if (fname === "") {
            flash("First name cannot be empty");
            has_error = false;
        }

        var lname = document.getElementById("lname").value;
        if (lname === "") {
            flash("Last name cannot be empty");
            has_error = false;
        }

        var address = document.getElementById("address").value;
        if (address === "") {
            flash("Address cannot be empty");
            has_error = false;
        }

        var city = document.getElementById("city").value;
        if (city === "") {
            flash("City cannot be empty");
            has_error = false;
        }

        var state = document.getElementById("inputState").value;
        if (state === "Choose...") {
            flash("Please select a state.");
            has_error = false;
        }

        var zipcode = document.getElementById("zipcode").value;
        if (zipcode === "") {
            flash("Zipcode cannot be empty");
            has_error = false;
        } else {
            if (!digit.test(zipcode)) {
                flash("Zipcode must be a number");
                has_error = false;
            }
        }

        var payment_method = document.getElementById("paymentMethod").value;
        if (payment_method === "Choose...") {
            flash("Please select a payment method.");
            has_error = false;
        }

        var payment = document.getElementById("payment").value;
        if (payment === "") {
            flash("Please enter payment.");
            has_error = false;
        }
        return has_error;
    }
</script>

<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>