<?php
    class Prispevky{
        private function vyplnenaData($akce){
        if($akce == "upravit"){
            if(!isset($_POST["nazevUpravovanehoClanku"]))
                return false;
            if(!isset($_POST["perexUpravovanehoClanku"]))
                return false;
            if(!isset($_POST["obsahUpravovanehoClanku"]))
                return false;
        }if($akce == "vytvorit"){
            if(!isset($_POST["nazevTvorenehoClanku"]))
                return false;
            if(!isset($_POST["obsahTvorenehoClanku"]))
                return false;
            if(!isset($_POST["perexTvorenehoClanku"]))
                return false;
        }
        
        return true;

        }
        public function upravit(){
            require_once "views/prispevky/upravit.php";
            if( $this->vyplnenaData("upravit")){
                $nazev = trim($_POST["NazevUpravovanehoClanku"]);
                $perex = trim($_POST["PerexUpravovanehoClanku"]);
                $obsah = trim($_POST["ObsahUpravovanehoClanku"]);
                $clanek = new Prispevek($nazev, $perex, $obsah);

            }
        }
        public function odstranit(){
            require_once "views/prispevky/odstranit.php";
            
        }
        public function vytvorit(){
            require_once "views/prispevky/vytvorit.php";
            if($this->vyplnenaData("vytvorit")){

            }
        }
    }