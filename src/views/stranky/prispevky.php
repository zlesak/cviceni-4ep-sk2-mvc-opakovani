<?php
    global $zakladni_url;
    if(!isset($_SESSION["prihlaseny_uzivatel"]))
    {
        $uzivatel_id = $_SESSION["prihlaseny_uzivatel"];
        echo"<a href=$zakladni_url". "index.php/prispevky/vytvorit" .">Vytvořit příspěvek</a></ br><hr>";
    }
    $sql = "SELECT * FROM prispevky_databaze";
    $spojeni = DB::pripojit();
    $data = mysqli_query($spojeni, $sql);
    if(mysqli_num_rows($data) > 0)
    {
        foreach($data as $prispevek)
        {
            $nazev = $prispevek["nazev"];
            $perex = $prispevek["perex"];
            $prispevek_uzivatel_id = $prispevek["id_uzivatel"];
            $prispevek_id = $prispevek["id_clanku"];
            echo"<a href=''>" . $nazev . "</a><p>" . $perex . "</p>";
            if($uzivatel_id == $prispevek_uzivatel_id){
                echo"<a href='$zakladni_url" . "index.php/prispevky/upravit/". "$prispevek_id" . "'>Editovat příspěvek</a> | <a href='$zakladni_url" . "index.php/prispevky/odstranit/". "$prispevek_id" . "'>Odstranit příspěvek</a>";
            }
            echo"</ br><hr>";
        }
    }else
    {
        echo"<p>Nenachází se zde žádné příspěvky.</p>";
    }