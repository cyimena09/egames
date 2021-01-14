<?php
if (isset($_GET['id'])) {
    include("../models/delete.php");
    deleteTeamAndPlayers($_GET['id']);
    header('Location: ../views/admin_space.php');
}