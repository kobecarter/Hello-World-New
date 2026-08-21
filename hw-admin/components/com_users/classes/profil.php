<?php
class profil {
    private $id;
    private $profil;

    public function __construct($id, $db) {
        if (isset($id) && $id !== ''){
            $result = $db->query("SELECT * FROM ".__prefixe_db__."profils WHERE id = ".(int) $id);
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
        if (empty($this->id)){
            // Profil introuvable (id_profil orphelin ou session obsolète) : accès
            // refusé proprement plutôt qu'une requête SQL invalide ("id_profil = "
            // sans valeur), qui provoquait une page blanche (exception mysqli non
            // interceptée) juste après la connexion.
            return false;
        }
        $SQLselect = "SELECT * FROM ".__prefixe_db__."droits WHERE module = '$module' AND action = '$action' AND id_profil = ".(int) $this->id;
        $result = $db->query($SQLselect);
        return ($db->num_rows($result) == 0) ? false : true ;
    }
}
?>