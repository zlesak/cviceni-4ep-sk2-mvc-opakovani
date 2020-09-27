<?php   

class Prispevek{
    
    private $nazev_clanku;
    private $perex_clanku;
    private $obsah_clanku;

    public function __construct($nazev, $perex, $obsah)
    {
        $this->nazev_clanku = $nazev;
        $this->perex_clanku = $perex;
        $this->obsah_clanku = $obsah;

    }
    public function VytvorSe(){
        $spojeni = DB::pripojit();
        $id_uzi = $_SESSION["prihlaseny_uzivatel"];
        $sql = "INSERT INTO prispevky_databaze (id_uzivatel, nazev, perex, obsah) VALUES ('$id_uzi','$this->nazev_clanku','$this->perex_clanku','$this->obsah_clanku')";
        mysqli_query($spojeni, $sql);
        return mysqli_insert_id($spojeni);
    }
    public function OdstranSe($id_clanku){

    }

    public function UpravSe($id_clanku){

    }
}