<?php
global $parametry;
    $spojeni =  DB::pripojit();
    $id_clanku = $parametry[0];
    $sql = "SELECT * FROM prispevky_databaze WHERE id_clanku = '$id_clanku'";
    $data = mysqli_query($spojeni, $sql);
    $data = mysqli_fetch_assoc($data);
    $nazev = $data["nazev"];
    $perex = $data["perex"];
    $obsah = $data["obsah"];
    $nazevUpraveny = (isset($_POST["nazevUpravovanehoClanku"])) ? $_POST["nazevUpravovanehoClanku"] : "";
    $obsahUpraveny = (isset($_POST["perexUpravovanehoClanku"])) ? $_POST["perexUpravovanehoClanku"] : "";
    $perexUpraveny = (isset($_POST["obsahUpravovanehoClanku"])) ? $_POST["obsahUpravovanehoClanku"] : "";
?>

<form action='?' method='post'>
    <input type='text' name = 'nazevUpravovanehoClanku' value="<?php echo"$nazev"; ?>" minlength='5'><br>
    <input type='text' name = 'perexUpravovanehoClanku' value="<?php echo"$perex"; ?>" minlength='5'><br>
    <textarea name='obsahUpravovanehoClanku' cols='30' rows='10' minlength='5'>
    <?php echo "$obsah"; ?>
    </textarea>
    <input type='submit' value='Upravit'>
</form>