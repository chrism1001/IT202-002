<?php
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";

$user_id = get_user_id();

$result = [];
$columns = get_columns($TABLE_NAME);
$ignore = ["id", "visibility", "modified", "created", "user_id"];
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

if (isset($_POST["rating"]) && isset($_POST["comment"])) {
    $rating = se($_POST, "rating", -1, false);
    $comment = se($_POST, "comment", "", false);

    $has_error = false;
    if (empty($rating)) {
        flash("Rating cannot be empty");
        $has_error = true;
    }
    if ($rating < 0 || $rating > 5) {
        flash("Rating must be between 0 to 5");
        $has_error = true;
    }
    if (empty($comment)) {
        flash("Comment cannot be empty");
        $has_error = true;
    }
    $db = getDB();
    $stmt = $db->prepare("SELECT order_id FROM OrderItems WHERE 1=1 and user_id = :uid and product_id = :pid");
    try {
        $stmt->execute([":uid" => $user_id, ":pid" => $id]);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (sizeof($results) == 0) {
            $has_error = true;
            flash("You must purchase the item first before you can post a review.", "danger");
        }
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash("Error looking up record", "danger");
    }

    if (!$has_error) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Ratings (user_id, product_id, rating, comment) VALUES(:uid, :pid, :rating, :comment)");
        try {
            $stmt->execute([":uid" => $user_id, ":pid" => $id, ":rating" => $rating, ":comment" => $comment]);
        } catch (Exception $e) {
            error_log("Error inserting into orders table" . var_export($e, true));
        }

        $ratings = [];
        $stmt = $db->prepare("SELECT rating FROM Ratings WHERE product_id = :pid");
        try {
            $stmt->execute([":pid" => $id]);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($results) {
                $ratings += $results;
            }
        } catch (PDOException $e) {
            error_log(var_export($e, true));
            flash("Error looking up record", "danger");
        }

        $curr_rating = 0;
        foreach ($ratings as $key => $value) {
            $curr_rating += $value["rating"];
        }

        $curr_rating += $rating;
        $new_rating = $curr_rating / (sizeof($ratings) + 1);

        $stmt = $db->prepare("UPDATE Products SET avg_rating = :r WHERE id = :pid");
        try {
            $stmt->execute([":r" => $new_rating, ":pid" => $id]);
        } catch (Exception $e) {
            error_log("Error inserting into orders table" . var_export($e, true));
        }
    }
}

$reviews = [];
$base_query = "Select r.user_id, u.username, r.rating, r.comment FROM Ratings r JOIN Users u on u.id = r.user_id";
$total_query = "SELECT count(1) as total FROM Ratings r";
$query = " WHERE r.product_id = :pid";

$per_page = 10;
$params = [];
$params[":pid"] = $id;
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
        $reviews = $r;
    }
} catch (PDOException $e) {
    error_log(var_export($e, true));
    flash("Error looking up record", "danger");
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
            <th>Average Rating</th>
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
                        <a href="admin/edit_product.php?id=<?php se($value, "id"); ?>">Edit</a>
                    </td>
                <?php endif; ?>
            <tr>
        </tbody>
    </table>
    
    <?php if ($user_id > 0) : ?>
        <h3>Leave A Review</h3>
        <form onsubmit="return validate(this);" method="POST">
            <div class="mb-3">
                <label class="form-label" for="rating">Rating (1-5)</label>
                <input class="form-control" type="number" id="rating" name="rating" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="comment">Comment</label>
                <input class="form-control" type="text" id="comment" name="comment" />
            </div>

            <input type="submit" class="mt-3 btn btn-primary" value="Post Review" />
        </form>
    <?php endif; ?>

    <?php if (count($reviews) == 0) : ?>
        <p>No reviews to show</p>
    <?php else : ?>
        <table class="table card-table">
            <?php foreach ($reviews as $index => $record) : ?>
                <?php if ($index == 0) : ?>
                    <thead>
                        <?php foreach($record as $column => $value) : ?>
                            <?php if (!in_array($column, $ignore)) : ?>
                                <th><?php se($column); ?></th>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </thead>
                <?php endif; ?>
                <tr>
                    <?php foreach ($record as $column => $value) : ?>
                        <?php if ($column == "username") : ?>
                            <td>
                                <?php $user_id = se($record, "user_id", -1, false);
                                $username = se($record, "username", "", false);
                                include(__DIR__ . "/../../partials/profile_link.php") ?>
                            </td>
                        <?php elseif (!in_array($column, $ignore)) : ?>
                            <td><?php se($value); ?></td>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<script>
    function validate(form) {
        var has_error = true;

        var rating = document.getElementById("rating").value;
        if (rating == "") {
            flash("Rating cannot be empty");
            has_error = false;
        }
        if (rating < 0) {
            flash("Rating cannot be a negative value");
            has_error = false;
        } else if (rating > 5) {
            flash("Rating must be 0 to 5");
            has_error = false;
        }

        var comment = document.getElementById("comment").value;
        if (comment == "") {
            flash("Comment cannot be empty");
            has_error = false;
        }

        return has_error;
    }
</script>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../partials/flash.php");
require(__DIR__ . "/../../partials/pagination.php");
?>



