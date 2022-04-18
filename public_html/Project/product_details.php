<?php
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";

$result = [];
$columns = get_columns($TABLE_NAME);
$ignore = ["id", "visibility", "modified", "created"];
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

    <table class="table card-table">
        <thead>
            <th>Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Price</th>
            <?php if (has_Role("Admin")) : ?>
                    <th>Edit</th>
            <?php endif; ?>
        </thead>
        <tbody>
            <tr>
                <?php foreach($result as $key => $value) : ?>
                    <?php if (!in_array($key, $ignore)) : ?>
                        <td><?php se($value); ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if (has_Role("Admin")) : ?>
                    <td>
                        <a href="admin/edit_product.php?id=<?php se($item, "id"); ?>">Edit</a>
                    </td>
                <?php endif; ?>
            <tr>
        </tbody>
    </table>
</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
?>



