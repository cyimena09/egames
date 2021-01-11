<?php
include("../templates/admin_log_header.php");
?>
<!-- selection de la personne  -->
<div class="box-filter"></div>
<div class="box_form">
    <h1>Login Administrateur</h1>
    <form id="formulaire-inside" action="" method="POST">
        <input type="text" placeholder="id">
        <input type="password" placeholder="Password">
        <input type="submit" value="CONNECTION">
    </form>
</div>
<?php
include("../templates/footer.php");
?>