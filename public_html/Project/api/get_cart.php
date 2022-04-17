<?php
require_once(__DIR__ . "/../../../lib/functions.php");
error_log("get_cart received data: " . var_export($_REQUEST, true));
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$user_id = get_user_id();