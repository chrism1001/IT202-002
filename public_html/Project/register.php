<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>


<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required maxlength="30" />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <div>
        <label for="confirm">Confirm</label>
        <input type="password" id="confirm" name="confirm" required minlength="8" />
    </div>
    <input type="submit" value="Register" />
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success

        // regex is from https://digitalfortress.tech/js/top-15-commonly-used-regex/
        // common email ids.
        const email_reg = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
        // valid username
        const username_reg = /^[a-z0-9_-]{3,16}$/;

        var has_error = false;

        // checks whether the email input is valid
        var email_input = document.getElementById("email").value;
        console.log(email_input);
        if (email_input.length == 0) {
            flash("Email field cannot be empty.");
            has_error = false
        }
        if (email_input.includes("@")) {
            if (!email_reg.test(email_input)) {
                flash("Not a valid email address");
                has_error = false;
            }
        }

        // checks if username is correct length and contains valid characters
        var username_input = document.getElementById("username").value;
        if (username_input.length == 0) {
            flash("Username field cannot be empty");
            has_error = false;
        }
        if (username_input.length <= 3 || username_input.length >= 16) {
            flash("Username can only contain 3-16 characters.")
            has_error = false;
        }
        if (!username_reg.test(username_input)) {
            flash("Username can only contain characters 0-9, a-z, _, -");
            has_error = false;
        }


        return has_error;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php require(__DIR__ . "/../../partials/flash.php"); ?>