<?php
    $nazev = (isset($_POST["nazevTvorenehoClanku"])) ? $_POST["nazevTvorenehoClanku"] : "";
    $obsah = (isset($_POST["obsahTvorenehoClanku"])) ? $_POST["obsahTvorenehoClanku"] : "";
    $perex = (isset($_POST["perexTvorenehoClanku"])) ? $_POST["perexTvorenehoClanku"] : "";
?>

<form action='?' method='post'>
    <input type='text' name ='nazevTvorenehoClanku' placeholder='Název článku' minlength='5'><br>
    <input type='text' name ='perexTvorenehoClanku' placeholder='Prex článku' minlength='5'><br>
    <textarea name='obsahTvorenehoClanku' cols='30' rows='10' minlength='5'>
    </textarea>
    <input type='submit' value='Vytvořit'>
</form>