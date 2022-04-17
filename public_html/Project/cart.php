<?php
require(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);



?>
<script>
    function add_to_cart(product_id, quantity = 1) {
        postData({
            product_id: product_id,
            desired_quantity: quantity
        }, "Project/api/add_to_cart.php").then(data => {
            if (data.status === 200) {
                flash(data.message, "success");
                if (get_cart) {
                    get_cart();
                }
            } else {
                flash(data.message, "danger");
            }
        }).catch(e => {
            flash("There was a problem adding the item to cart", "danger");
        });
    }
    get_cart();
</script>


<div class="container-fluid">
    <h1>Cart</h1>
    <table class="table">

    </table>
</div>