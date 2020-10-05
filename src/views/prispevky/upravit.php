<?php
global $parametry;
    $spojeni =  DB::pripojit();
    $id_clanku = $parametry[0];
    $sql = "SELECT * FROM prispevky_databaze WHERE id_clanku = '$id_clanku'";
    $data = mysqli_query($spojeni, $sql);
    $data = mysqli_fetch_assoc($data);
    $nazev = (isset($_POST["nazevUpravovanehoClanku"])) ? trim($_POST["nazevUpravovanehoClanku"]) : trim($data["nazev"]);
    $perex = (isset($_POST["perexUpravovanehoClanku"])) ? trim($_POST["perexUpravovanehoClanku"]) : trim($data["perex"]);
    $obsah = (isset($_POST["obsahUpravovanehoClanku"])) ? trim($_POST["obsahUpravovanehoClanku"]) : trim($data["obsah"]);
    
?>

<form action='' method='post'>
    <input type='text' name = 'nazevUpravovanehoClanku' value="<?php echo"$nazev"; ?>" minlength='5'><br>
    <input type='text' name = 'perexUpravovanehoClanku' value="<?php echo"$perex"; ?>" minlength='5'><br>
    <textarea name='obsahUpravovanehoClanku' cols='30' rows='10' minlength='5'>
    <?php echo "$obsah"; ?>
    </textarea>
    <input type='submit' value='Upravit'>
</form>