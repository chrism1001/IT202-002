<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);

$user_id = se($_GET, "id", get_user_id(), false);
error_log("user id $user_id");
$isMe = $user_id === get_user_id();

$edit = !!se($_GET, "edit", false, false);
if ($user_id < 1) {
    flash("Invalid user", "danger");
    redirect("shop.php");
}
?>


<?php
if (isset($_POST["save"]) && $isMe && $edit) {
    $db = getDB();
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $visibility = !!se($_POST, "visibility", false, false) ? 1 : 0;
    $hasError = false;
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!preg_match('/^[a-z0-9_-]{3,16}$/i', $username)) {
        flash("Username must only be alphanumeric and can only contain - or _", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":vis" => $visibility];

        $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, visibility = :vis where id = :id");
        try {
            $stmt->execute($params);
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }

    //select fresh data from table
    $stmt = $db->prepare("SELECT id, email, IFNULL(username, email) as `username` from Users where id = :id LIMIT 1");
    try {
        $stmt->execute([":id" => get_user_id()]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            //$_SESSION["user"] = $user;
            $_SESSION["user"]["email"] = $user["email"];
            $_SESSION["user"]["username"] = $user["username"];
        } else {
            flash("User doesn't exist", "danger");
        }
    } catch (Exception $e) {
        flash("An unexpected error occurred, please try again", "danger");
        //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset", "success");
                    } else {
                        flash("Current password is invalid", "warning");
                    }
                }
            } catch (Exception $e) {
                echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
            }
        } else {
            flash("New passwords don't match", "warning");
        }
    }
}
?>

<?php
$email = get_user_email();
$username = get_username();
$created = "";
$public = false;
//$user_id = get_user_id(); //this is retrieved above now
//TODO pull any other public info you want
$db = getDB();
$stmt = $db->prepare("SELECT username, created, visibility from Users where id = :id");
try {
    $stmt->execute([":id" => $user_id]);
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    error_log("user: " . var_export($r, true));
    $username = se($r, "username", "", false);
    $created = se($r, "created", "", false);
    $public = se($r, "visibility", 0, false) > 0;
    if (!$public && !$isMe) {
        flash("User's profile is private", "warning");
        redirect("shop.php");
        //die(header("Location: home.php"));
    }
} catch (Exception $e) {
    echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}
?>

<form method="POST" onsubmit="return validate(this);">
    <div class="container-fluid">
        <h1>Profile</h1>
        <?php if ($isMe) : ?>
            <?php if ($edit) : ?>
                <a class="btn btn-primary" href="?">View</a>
            <?php else : ?>
                <a class="btn btn-primary" href="?edit=true">Edit</a>
            <?php endif; ?>
        <?php endif; ?>
        <form method="POST" onsubmit="return validate(this);">
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
            </div>
                <!-- DO NOT PRELOAD PASSWORD -->
            <div>Password Reset</div>
            <div class="mb-3">
                <label class="form-label" for="cp">Current Password</label>
                <input class="form-control" type="password" name="currentPassword" id="cp" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="np">New Password</label>
                <input class="form-control" type="password" name="newPassword" id="np" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="conp">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="conp" />
            </div>
            <input type="submit" class="mt-3 btn btn-Dark" value="Update Profile" name="save" />
        </form>
    </div>
</form>

<script>
    function validate(form) {
        // regex is from https://digitalfortress.tech/js/top-15-commonly-used-regex/
        // common email ids.
        const email_reg = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
        // valid username
        const username_reg = /^[a-z0-9_-]{3,16}$/;

        let has_error = true;
        // email validation
        var email_input = form.email.value;
        if (!email_reg.test(email_input)) {
            flash("Not a valid email address");
            return false;
        }

        // username validation
        var username_input = form.username.value;
        if (!username_reg.test(username_input)) {
            flash("Not a valid username");
            return false;
        }

        let isValid = true;
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        //TODO add other client side validation....

        let curr_pw = form.currentPassword.value;
        if (String(curr_pw) == "") {
            return true;
        }
        if (String(curr_pw).length < 8) {
            flash("Current password is too short");
            isValid = false;
        } 

        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (String(pw).length == 0) {
            flash("New password field cannot be empty")
            isValid = false;
        } else if (String(pw).length < 8) {
            flash("New password is too short");
            isValid = false;
        }

        if (pw !== con) {
            flash("Password and Confirm password must match", "warning");
            form.newPassword.value = "";
            form.confirmPassword.value = "";
            isValid = false;
        }

        return isValid;
    }
</script>
<?php require_once(__DIR__ . "/../../partials/flash.php"); ?>