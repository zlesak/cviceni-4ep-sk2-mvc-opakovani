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
                $nazev = trim($_POST["nazevUpravovanehoClanku"]);
                $perex = trim($_POST["perexUpravovanehoClanku"]);
                $obsah = trim($_POST["obsahUpravovanehoClanku"]);
                

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
                $clanek_id = $clanek->VytvorSe();
                header("location:". $zakladni_url ."index.php/prispevky/zobrazit/".$clanek_id);
            }
        }
        public function zobrazit(){
            
        }
    }