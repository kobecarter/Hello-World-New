<?php
class profil {
    private $id;
    private $profil;

    public function __construct($id, $db) {
        if (isset($id)){
            $result = $db->query("SELECT * FROM ".__prefixe_db__."profils WHERE id = ".$id);
            if ($db->num_rows($result) == 1){

                $data = $db->fetch_assoc($result);
                $this->id = $data['id'];
                $this->profil = $data['profil'];
            }
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getProfil(){
        return $this->profil;
    }

    public function hasDroit($action, $module){
        global $db;
        $SQLselect = "SELECT * FROM ".__prefixe_db__."droits WHERE module = '$module' AND action = '$action' AND id_profil = ".$this->id;
        $result = $db->query($SQLselect);
        return ($db->num_rows($result) == 0) ? false : true ;
    }
}
?>