<?php
include("../../models/insert.php");
$gameName = $_POST['gameName'];
createGame($gameName);
header("Location: ../../views/admin_space.php");
