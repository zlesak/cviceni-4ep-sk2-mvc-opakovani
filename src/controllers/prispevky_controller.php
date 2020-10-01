<?php

    global $zakladni_url;

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
            if(isset($parametry[0])){
                require_once "views/prispevky/upravit.php";
                if( $this->vyplnenaData("upravit")){
                    $nazev = trim($_POST["nazevUpravovanehoClanku"]);
                    $perex = trim($_POST["perexUpravovanehoClanku"]);
                    $obsah = trim($_POST["obsahUpravovanehoClanku"]);
                    $clanek = new Prispevek($nazev, $perex, $obsah);
                    $clanek->UpravSe($parametry[0]);
                }
            }else{
                require_once "views/stranky/chyba.php";

            }
        }
        public function odstranit(){
            require_once "views/prispevky/odstranit.php";
            
        }
        public function vytvorit(){
            require_once "views/prispevky/vytvorit.php";
            if($this->vyplnenaData("vytvorit")){
                $nazev = trim($_POST["nazevTvorenehoClanku"]);
                $perex = trim($_POST["perexTvorenehoClanku"]);
                $obsah = trim($_POST["obsahTvorenehoClanku"]);
                $clanek = new Prispevek($nazev, $perex, $obsah);
                $clanek->VytvorSe();
                
            }
        }
        public function zobrazit(){
            if(isset($parametry[0])){
                $prispevek_prazdny = new Prispevek("","","");
                $prispevek_prazdny->ZobrazSe($parametry[0]);
                require_once "views/prispevky/zobrazit.php";

            }

        }
        public function zobrazit(){
            
        }
    }