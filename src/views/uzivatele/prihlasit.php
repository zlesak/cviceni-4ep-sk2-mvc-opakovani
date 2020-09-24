<?php
    $jmeno = (isset($_POST["jmeno"])) ? $_POST["jmeno"] : "";
    $heslo = (isset($_POST["heslo"])) ? $_POST["heslo"] : "";
?>

<form action="?" method="post">
    <input type="text" name="jmeno" placeholder="Jméno..." value="<?php echo $jmeno; ?>" /><br />
    <input type="password" name="heslo" placeholder="Heslo..." value="<?php echo $heslo; ?>" /><br />
    <input type="submit" value="Přihlásit" />
</form>
