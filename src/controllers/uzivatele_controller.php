<?php

class Uzivatele
{
    private function mam_dostatek_dat()
    {
        // kontrola existence udaju ve formulari
        if(!isset($_POST["jmeno"]))
            return false;
        if(!isset($_POST["heslo"]))
            return false;
        if(!isset($_POST["heslo_znovu"]))
            return false;
        
        return true;
    }

    private function data_jsou_v_poradku($jmeno, $heslo, $heslo_znovu)
    {
        // pozadavky na jmeno a heslo
        if(strlen($jmeno) < 1)
            return false;
        if(strlen($heslo) < 1)
            return false;
        if($heslo != $heslo_znovu)
            return false;
        
        return true;
    }

    public function registrovat()
    {
        // bud se zpracuje registracni formular, nebo se zobrazi
        if($this->mam_dostatek_dat())
        {
            $jmeno = trim($_POST["jmeno"]);
            $heslo = trim($_POST["heslo"]);
            $heslo_znovu = trim($_POST["heslo_znovu"]);

            if($this->data_jsou_v_poradku($jmeno, $heslo, $heslo_znovu))
            {
                // dochazi k registraci uzivatele
                $uzivatel = new Uzivatel($jmeno, password_hash($heslo, PASSWORD_DEFAULT));

                if($uzivatel->registruj_se())
                {
                    // uzivatel je uspesne registrovan
                    // presmeruju ho na prihlaseni
                    return spustit("uzivatele", "prihlasit");
                }
                else
                {
                    // registrace selhala na urovni modelu
                    return spustit("stranky", "chyba");
                }
            }
            else
            {
                // data ve formulari nejsou v poradku
                require_once "views/uzivatele/registrovat.php";
            }
        }
        else
        {
            // data ve formulari nejsou kompletni
            require_once "views/uzivatele/registrovat.php";
        }
    }
}
