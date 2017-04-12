<?php
include("../library/session.php");
Session::removeSession();
header("Location: login.php");
?>