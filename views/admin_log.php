<?php
include("../templates/admin_log_header.php");
?>
<div class="box-filter"></div>
<div class="box_form">
    <h1>Login Administrateur</h1>
    <form id="formulaire-inside" action="../controllers/admin_log.php" method="POST">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="CONNECTION">
    </form>
    <div style="color: red"><?php if(isset($_GET['error'])){echo $_GET['error'];} ?></div>

</div>
<?php
include("../templates/footer.php");
?>