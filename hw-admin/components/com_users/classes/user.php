<?php
class user {
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $tel;
    private $adresse;
    private $id_profil;
    private $pass;
    private $actif;
    private $su;
    private $langue;
    private $connected = false;
    private $dev;

    public function __construct($login, $password, $db) {
        if (isset($login) && isset($password)){
            $login = addslashes($login);
            $password = hash('sha256', $password);
            $result = $db->query("SELECT * FROM ".__prefixe_db__."users WHERE login = '".$login."' AND password = '".$password."' AND actif = 1");
            if ($db->num_rows($result) == 1){

                $data = $db->fetch_assoc($result);
                $this->connected = true;
                $this->id = $data['id'];
                $this->username = $data['login'];
                $this->firstname = $data['prenom'];
                $this->lastname = $data['nom'];
                $this->email = $data['email'];
                $this->tel = $data['tel'];
                $this->adresse = $data['adresse'];
                $this->id_profil = $data['id_profil'];
                $this->actif = $data['actif'];
                $this->pass = $password;
                $this->su = $data['su'];
                $this->langue = $data['langue'];
                $this->dev = 0;

                $_SESSION['user'] = $this;
            }
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getPassword(){
        return $this->pass;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getName(){
        return ucfirst($this->firstname)." ".strtoupper($this->lastname);
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function getUserName(){
        return $this->username;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTel(){
        return $this->tel;
    }

    public function getLangue(){
        return $this->langue;
    }

    public function getLevel(){
        return $this->level;
    }

    public function isConnected(){
        return $this->connected;
    }

    public function disconnect(){
        $this->connected = false;
        $_SESSION['user'] = array();
        session_unset();
    }

    public function isActif(){
        return ($this->actif == 1) ? true : false;
    }

    public function isSuperUser(){
        return ($this->su == 1) ? true : false;
    }

    public function hasDroit($action, $module){
        global $db;
        $p = new profil($this->id_profil,$db);
        return $p->hasDroit($action, $module);
    }

    public static function isEmailValable($email){
        global $db;
        $result = $db->query("SELECT * FROM ".__prefixe_db__."users WHERE email = '".$email."' AND actif = 1 AND id_profil = 1");
        if ($db->num_rows($result) == 1){
            return true;
        }else{
            return false;
        }
    }

    public function isDev(){
        return ($this->dev == 1) ? true : false ;
    }

    public function setDev($dev) {
        $this->dev = $dev;
    }

}
?>