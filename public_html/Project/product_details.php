<?php
require(__DIR__ . "/../../partials/nav.php");

$TABLE_NAME = "Products";

$user_id = get_user_id();

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

    if (!$has_error) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Ratings (user_id, product_id, rating, comment) VALUES(:uid, :pid, :rating, :comment)");
        try {
            $stmt->execute([":uid" => $user_id, ":pid" => $id, ":rating" => $rating, ":comment" => $comment]);
        } catch (Exception $e) {
            error_log("Error inserting into orders table" . var_export($e, true));
        }
    }
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
?>



