<?php
require(__DIR__ . "/../../../partials/nav.php");
is_logged_in(true);

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    redirect("shop.php");
}

$user_id = get_user_id();
$results = [];

if ($user_id > 0) {
    $db = getDB();

    $col = se($_GET, "col", "name", false);
    if (!in_array($col, ["name", "total_price", "payment_method", "created"])) {
        $col = "name";
    }

    $order = se($_GET, "order", "asc", false);
    if (!in_array($order, ["asc", "desc"])) {
        $order = "asc";
    }

    $date = se($_GET, "created", "", false);
    $category = se($_GET, "category", "", false);

    $base_query = "SELECT id, user_id, address, payment_method, total_price, created from Orders";
    $total_query = "SELECT count(1) as total FROM Orders";
    $query = "";

    $per_page = 5;
    $params = [];
    if (!empty($date)) {
        $query .= " and created like :date";
        $params[":date"] = "%$date%";
    }
    if (!empty($category)) {
        $query .= " and category like :category";
        $params[":category"] = "%$category%";
    }
    
    if (!empty($col) && !empty($order)) {
        $query .= " ORDER BY $col $order";
    }

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
        $stmt->execute($params);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results += $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
}

?>

<div class="container-fluid">
    <h1>List Order History</h1>
    <?php if (count($results) == 0) : ?>
        <p>No Results to show</p>
    <?php else : ?>
        <table class="table card-table">
            <?php foreach ($results as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach ($record as $column => $value) : ?>
                            <th><?php se($column); ?></th>
                        <?php endforeach; ?>
                        <th>More Actions</th>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <td><?php se($value); ?></td>
                    <?php endforeach; ?>

                    <td>
                        <a href="/Project/order_information.php?id=<?php se($record, "id"); ?>">More Info</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
require(__DIR__ . "/../../../partials/pagination.php");
?>