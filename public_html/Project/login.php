<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<form onsubmit="return validate(this)" method="POST">
    <div>
        <label for="email">Email/Username</label>
        <input type="text" id="email" name="email" required />
    </div>
    <div>
        <label for="pw">Password</label>
        <input type="password" id="pw" name="password" required minlength="8" />
    </div>
    <input type="submit" value="Login" />
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
        
        var has_error = true;

        // checks if email/username input is valid
        // first will check whether the input contains an @ character then will validate the email using regex
        // if it doesnt contain an @, it will validate the username
        // if either email or username fail it will reset the fields
        var email_input = document.getElementById("email").value;
        if (email_input.length == 0) {
            flash("Email/Username field cannot be empty");
            has_error = false;
        }
        if (email_input.includes("@")) {
            if (!email_reg.test(email_input)) {
                flash("Not a valid email address");
                document.getElementById("email").value = "";
                document.getElementById("pw").value = "";
                has_error = false;
            }
        } else {
            if (!username_reg.test(email_input)) {
                flash("Not a valid username");
                document.getElementById("email").value = "";
                document.getElementById("pw").value = "";
                has_error = false;
            }
        }

        // validates password input is correct length
        var password_input = document.getElementById("pw").value;
        console.log(password_input);
        if (pw.length == 0) {
            flash("Password field cannot be empty");
            has_error = false;
        }
        if (String(pw).length < 8) {
            flash("Password is too short");
            has_error = false;
        }

        //TODO update clientside validation to check if it should
        //valid email or username
        return has_error;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty");
        $hasError = true;
    }
    if (str_contains($email, "@")) {
        //sanitize
        $email = sanitize_email($email);
        if (!is_valid_email($email)) {
            flash("Invalid email address");
            $hasError = true;
        }
    } else {
        if (!is_valid_username($email)) {
            flash("Invalid username");
            $hasError = true;
        }
    }
    if (empty($password)) {
        flash("password must not be empty");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password from Users 
        where email = :email or username = :email");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        //flash("Weclome $email");
                        $_SESSION["user"] = $user; //sets our session data from db
                        //lookup potential roles
                        $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                        $stmt->execute([":user_id" => $user["id"]]);
                        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        //save roles or empty array
                        if ($roles) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        flash("Welcome, " . get_username());
                        die(header("Location: home.php"));
                    } else {
                        flash("Invalid password");
                    }
                } else {
                    flash("Email not found");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<?php require(__DIR__ . "/../../partials/flash.php");