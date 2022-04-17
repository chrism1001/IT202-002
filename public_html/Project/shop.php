<?php
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";
$results = [];
$db = getDB();

$col = se($_GET, "col", "unit_price", false);
if (!in_array($col, ["unit_price", "stock", "name", "created"])) {
    $col = "unit_price";
}

$order = se($_GET, "order", "asc", false);
if (!in_array($order, ["asc", "desc"])) {
    $order = "asc";
}

$name = se($_GET, "name", "", false);

$query = $db->prepare("SELECT id, name, description, unit_price, stock FROM $TABLE_NAME WHERE 1=1 and stock > 0");
$params = [];
if (!empty($name)) {
    $query .= " and name like :name";
    $params[":name"] = "%$name%";
}

if (!empty($col) && !empty($order)) {
    $query .= " ORDER BY $col $order";
}

$stmt = $db->prepare($query);
try {
    $stmt->execute();
    $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($r) {
        $results = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error fetching items", "danger");
}
?>

<script>
    function purchase(item) {
        alert("It's almost like you purchased an item, but not really");
        //TODO create JS helper to update all show-balance elements
    }
</script>

<div class="container-fluid">
    <h1>Shop</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        <?php foreach ($results as $item) : ?>
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Name: <?php se($item, "name"); ?></h5>
                        <p class="card-text">Description: <?php se($item, "description"); ?></p>
                    </div>
                    <div class="card-footer">
                        Cost: <?php se($item, "unit_price"); ?>
                        <button onclick="purchase('<?php se($item, 'id'); ?>')" class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>