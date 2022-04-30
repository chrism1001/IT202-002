<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$results = [];
$user_id = get_user_id();
if ($user_id > 0) {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, name, address, payment_method, total_price, created from Orders WHERE user_id = :uid");
    try {
        $stmt->execute([":uid" => $user_id]);
        $r = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($r) {
            $results = $r;
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error fetching records", "danger");
    }
}

?>

<div class="container-fluid">
    <h1>Purchase History</h1>
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
                        <th>more info</th>
                    </thead>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>