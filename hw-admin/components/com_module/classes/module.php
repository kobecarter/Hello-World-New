<?php

class module
{
    private $id;
    private $id_module; // com_*
    private $enabled;
    private $installed;
    private $nom;
    private $classe;
    private $nom_table;
    private $translated;
    private $url;
    private $system;
    private $icon;
    private $position;

    public function __construct($id_module, $db) {

        $SQLselect = "SELECT * FROM ".__prefixe_db__."modules WHERE id_module = '". $id_module ."'";
        $result = $db->query($SQLselect);

        if ($db->num_rows($result) == 1){
            $data = $db->fetch_assoc($result);

            $this->id = $data['id'];
            $this->id_module = $data['id_module'];
            $this->enabled = $data['enabled'];
            $this->installed = $data['installed'];
            $this->nom = $data['nom'];
            $this->classe = $data['classe'];
            $this->nom_table = $data['nom_table'];
            $this->translated = $data['translated'];
            $this->url = $data['url'];
            $this->system = $data['system'];
            $this->icon = $data['icon'];
            $this->position = $data['positioned'];
        } else {
            $this->id = 0;
            $this->id_module = $id_module;
            $this->enabled = 0;
            $this->installed = 0;
            $this->url = 0;
            $this->system = 0;
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getIdModule(){
        return $this->id_module;
    }

    public function isEnabled(){
        return $this->enabled == 1 ? true : false ;
    }

    public function isInstalled(){
        return $this->installed == 1 ? true : false ;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getClasse(){
        return $this->classe;
    }

    public function getNomTable(){
        return $this->nom_table;
    }

    public function isTranslated(){
        return $this->translated == 1 ? true : false ;
    }

    public function isUrl(){
        return $this->url == 1 ? true : false ;
    }

    public function isSystem(){
        return $this->system == 1 ? true : false ;
    }

    public function getIcon(){
        return $this->icon;
    }

    public function getPosition(){
        return $this->position;
    }

    public static function exists($id_module){
        global $db;
        $SQLselect = "SELECT * FROM ".__prefixe_db__."modules WHERE id_module = '". $id_module ."' AND installed = 1 AND enabled = 1";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){
            return true;
        }else{
            return false;
        }
    }

    public static function findAll(){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id_module FROM " . __prefixe_db__ . "modules WHERE enabled = 1 AND installed = 1";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id_module']);
        }
        return $ids;
    }

    public static function findAllUrl(){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id_module FROM " . __prefixe_db__ . "modules WHERE enabled = 1 AND installed = 1 AND url = 1";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id_module']);
        }
        return $ids;
    }

    public static function findAllPosition($position){ // center, side, param
        global $db;
        $ids = array();
        $SQLselect = "SELECT id_module FROM " . __prefixe_db__ . "modules WHERE enabled = 1 AND installed = 1 AND positioned = '".$position."'";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id_module']);
        }
        return $ids;
    }

    public static function count(){
        global $db;
        $SQLcount = "SELECT count(id) as c FROM " . __prefixe_db__ . "modules";
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }
}

?>
