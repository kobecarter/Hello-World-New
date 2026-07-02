<?php

class langue{
    private $id = 0;
    private $nom;
    private $code;
    private $defaut;
    private $flag;
    private $actif;
    private $date_add;
    private $last_edit;

    public function __construct($id, $db) {

        $SQLselect = "SELECT * FROM ".__prefixe_db__."langue WHERE id = $id";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->nom = $data['nom'];
            $this->code = $data['code'];
            $this->defaut = $data['defaut'];
            $this->flag = $data['flag'];
            $this->actif = $data['actif'];
            $this->date_add = $data['date_add'];
            $this->last_edit = $data['last_edit'];
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function isDefault(){
        return ($this->defaut == 1) ? true : false ;
    }

    public function getCode(){
        return $this->code;
    }

    public function getFlag(){
        return $this->flag;
    }

    public function isActif(){
        return ($this->actif == 1) ? true : false ;
    }

    public function getDateAdd(){
        return $this->date_add;
    }

    public static function isLangueDefault($langue){
        global $db;
        $SQLselect = "SELECT id FROM ".__prefixe_db__."langue WHERE code = '$langue'";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){
            $data = $db->fetch_assoc($result);
            $l = new langue($data['id'], $db);
            return $l->isDefault();
        }
        return false;
    }

    public static function getDefaultLanguage(){
        global $db;
        $SQLselect = "SELECT code FROM " . __prefixe_db__ . "langue WHERE defaut = 1";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data['code'];
        }
        return "";
    }

    public static function findAll(){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM ".__prefixe_db__."langue WHERE actif = 1";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }

    public static function findOthers($langue){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM ".__prefixe_db__."langue WHERE actif = 1 AND code != '".$langue."'";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }

    public static function getIdLangue($langue){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM ".__prefixe_db__."langue WHERE code = '$langue'";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){
            $data = $db->fetch_assoc($result);
            return $data['id'];
        }
        return 0;
    }
}