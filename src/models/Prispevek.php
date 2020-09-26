<?php   

    class Prispevek{
        private $nazev;
        private $perex;
        private $obsah;

        public function __construct($nazev, $perex, $obsah)
        {
            $this->nazev = $nazev;
            $this->perex = $perex;
            $this->$obsah = $obsah;
        }
        public function VytvorSe(){
            $spojeni = DB::pripojit();
            $sql = "INSERT INTO prispevky_databaze (id_uzivatel, nazev, perex, obsah) VALUES ('$this->$nazev',) "
        }
        public function OdstranSe($id_clanku){

        }
        public function UpravSe($id_clanku){

        }
    }