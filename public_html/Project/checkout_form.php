<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$TABLE_NAME = "CART";

if (isset($_POST["purchase"])) {

}

$user_id = get_user_id();
$res = [];

if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("Select * FROM $TABLE_NAME where user_id = :uid");
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

se($res);

foreach ($res as $key => $value) {
    se($value["product_id"]);
}


?>

<div class="container-fluid">
    <h1>Order Page</h1>
    <form method="POST">
        <input class="form-control" type="number" name="payment" />
        <input class="form-control" type="number" name="payment" />
        
        <input class="btn btn-primary" type="submit" value="Complete Purchase" />
    </form>
</div>

<?php
    require_once(__DIR__ . "/../../partials/flash.php");
?>