<?php
require(__DIR__ . "/../../../partials/nav.php");
is_logged_in(true);

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "shop.php"));
}

$user_id = get_user_id();
$results = [];

if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, address, payment_method, total_price, created FROM Orders limit 10");
    try {
        $stmt->execute();
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
                        <a href="/public_html/Project/order_information.php?id=<?php se($record, "id"); ?>">More Info</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>