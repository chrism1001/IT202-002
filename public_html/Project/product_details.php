<?php
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";

$result = [];
$columns = get_columns($TABLE_NAME);
$ignore = ["id", "modified", "created"];
$db = getDB();

$id = se($_GET, "id", -1, false);
$stmt = $db->prepare("Select * FROM $TABLE_NAME where id = :id");
try {
    $stmt->execute([":id" => $id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r) {
        $result = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
} 

function map_column($col)
{
    global $columns;
    foreach ($columns as $c) {
        if ($c["Field"] === $col) {
            return input_map($c["Type"]);
        }
    }
    return "text";
}
?>
<div class="container-fluid">
    <h1>Product Details</h1>
    <form method="Post">
        <?php foreach ($result as $column => $value) : ?>
            <?php if (!in_array($column, $ignore)) : ?>
                <div class="mb-4">
                    <label class="form-label" for="<?php se($column); ?>"><?php se($column); ?></label>
                    <label class="form-label" id="<?php se($column); ?>" type="<?php echo map_column($column); ?>" value="<?php se($value); ?>" name="<?php se($column); ?>" />
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </form>
</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>



