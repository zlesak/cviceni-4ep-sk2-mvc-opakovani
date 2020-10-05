<?php   
    

class Prispevek{
    
    private $nazev_clanku;
    private $perex_clanku;
    private $obsah_clanku;

    public function __construct($nazev, $perex, $obsah)
    {
        $this->nazev = $nazev;
        $this->perex = $perex;
        $this->obsah = $obsah;
    }
    public function VytvorSe(){
        $spojeni = DB::pripojit();
        $uzivatel = $_SESSION["prihlaseny_uzivatel"];
        $sql = "INSERT INTO prispevky_databaze (id_uzivatel, nazev, perex, obsah) VALUES ('$uzivatel','$this->nazev','$this->perex', '$this->obsah')";
        mysqli_query($spojeni, $sql);
        $id_clanku = mysqli_insert_id($spojeni);
        global $zakladni_url;
        header("location:".$zakladni_url."index.php/prispevky/zobrazit/" . "$id_clanku");

    }
    public function OdstranSe($id_clanku){
        $spojeni = DB::pripojit();
        $sql  ="DELETE FROM prispevky_databaze WHERE id_clanku = $id_clanku";
        mysqli_query($spojeni, $sql);
        global $zakladni_url;
        header("location:".$zakladni_url."index.php/stranky/prispevky");
    }
    public function UpravSe($id_clanku){
        $spojeni = DB::pripojit();
        $sql = "UPDATE prispevky_databaze SET nazev='$this->nazev', perex='$this->perex', obsah='$this->obsah' WHERE id_clanku='$id_clanku'";
        mysqli_query($spojeni, $sql);
        global $zakladni_url;
        header("location:".$zakladni_url."index.php/prispevky/zobrazit/" . "$id_clanku");

    }
    public function ZobrazSe($id){
        $spojeni = DB::pripojit();
        $sql = "SELECT * FROM prispevky_databaze WHERE id_clanku=$id";
        $data = mysqli_query($spojeni, $sql);
        $data = mysqli_fetch_assoc($data);
        $this->nazev = $data["nazev"];
        $this->perex = $data["perex"];
        $this->obsah = $data["obsah"];
        return array($this->nazev,$this->perex,$this->obsah);
    }
}