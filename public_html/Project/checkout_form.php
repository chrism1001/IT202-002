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

if (isset($_POST["submit"])) {
    $fullname = "";
    $fname = se($_POST, "fname", "", false);
    $lname = se($_POST, "lname", "", false);
    $fullname = $fname . $lname;
    error_log($fullname);

    $address = "";
    $addr = se($_POST, "address", "", false);
    $city = se($_POST, "city", "", false);
    $state = se($_POST, "inputState", "", false);
    $zipcode = se($_POST, "zipcode", "", false);
    $address = $addr . ", " . $city . ", " . $state . " " . $zipcode;
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