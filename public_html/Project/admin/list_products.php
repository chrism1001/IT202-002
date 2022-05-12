<?php
require(__DIR__ . "/../../../partials/nav.php");
$TABLE_NAME = "Products";

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("shop.php");
}

$results = [];
if (isset($_POST["itemName"])) {
    $db = getDB();
 
    if (is_numeric(se($_POST, "itemName", "", false))) {
        $num = (int)se($_POST, "itemName", -1, false);
        $base_query = "SELECT id, name, description, category, stock, unit_price, visibility from Products";
        $total_query = "SELECT count(1) as total FROM Products";
        $query = " WHERE 1=1 and stock >= :s";
        $params = [];
        $params[":s"] = $num;

        $per_page = 5;
        paginate($total_query . $query, $params, $per_page);

        $query .= " LIMIT :offset, :count";
        $params[":offset"] = $offset;
        $params[":count"] = $per_page;

        $stmt = $db->prepare($base_query . $query);
        foreach ($params as $key => $value) {
            $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($key, $value, $type);
        }
        $params = null;
        try {
            $stmt->execute($params); //dynamically populated params to bind
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($r) {
                $results = $r;
            }
        } catch (PDOException $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    } else {
        $name = se($_POST, "itemName", "", false);
        $base_query = "SELECT id, name, description, category, stock, unit_price, visibility from Products";
        $total_query = "SELECT count(1) as total from Products";
        $query = " WHERE 1=1 name like :name";

        $params = [];
        $params[":name"] = "%$name%";

        $per_page = 5;
        paginate($total_query . $query, $params, $per_page);

        $query .= " LIMIT :offset, :count";
        $params[":offset"] = $offset;
        $params[":count"] = $per_page;

        $stmt = $db->prepare($base_query . $query);
        foreach ($params as $key => $value) {
            $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($key, $value, $type);
        }
        $params = null;
        try {
            $stmt->execute($params); //dynamically populated params to bind
            $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($r) {
                $results = $r;
            }
        } catch (PDOException $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>

<div class="container-fluid">
    <h1>List Products</h1>
    <form method="POST" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="input-group mb-3">
            <input class="form-control" type="search" name="itemName" placeholder="Item Filter" />
            <input class="btn btn-primary" type="submit" value="Search" />
        </div>
    </form>
    <?php if (count($results) == 0) : ?>
        <p>No results to show</p>
    <?php else : ?>
        <table class="table">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value, null, "N/A"); ?></td>
                    <?php endforeach; ?>


                    <td>
                        <a href="edit_product.php?id=<?php se($record, "id"); ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<?php
require(__DIR__ . "/../../../partials/flash.php");
require(__DIR__ . "/../../../partials/pagination.php");
?>