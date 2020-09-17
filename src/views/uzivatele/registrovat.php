<?php
    $jmeno = (isset($_POST["jmeno"])) ? $_POST["jmeno"] : "";
    $heslo = (isset($_POST["heslo"])) ? $_POST["heslo"] : "";
    $heslo_znovu = (isset($_POST["heslo_znovu"])) ? $_POST["heslo_znovu"] : "";
?>

<form action="#" method="post">
    <input type="text" name="jmeno" placeholder="Jméno..." value="<?php echo $jmeno; ?>"/><br />
    <input type="password" name="heslo" placeholder="Heslo..." value="<?php echo $heslo; ?>"/><br />
    <input type="password" name="heslo_znovu" placeholder="Heslo znovu..." value="<?php echo $heslo_znovu; ?>"/><br />
    <input type="submit" value="Registrovat" /><br />
</form>
