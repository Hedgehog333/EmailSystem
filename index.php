<?php
session_start();
print_r($_SESSION["CurrentUser"]);
ini_set('display_errors', 1);
require_once 'application/routers.php';