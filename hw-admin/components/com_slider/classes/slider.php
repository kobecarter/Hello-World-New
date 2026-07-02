<?php
class slider {
    private $id;
    private $titre;
    private $actif;

    public function __construct($id, $db) {

        $SQLselect = "SELECT * FROM ".__prefixe_db__."slider WHERE id = ".intval($id);
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->titre = $data['titre'];
            $this->actif = $data['actif'];
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function isActif(){
        return $this->actif == 1 ? true : false;
    }

    public function getIdChildrenSlide(){
        global $db;
        $ids = array();
        $selectSQL = "SELECT id FROM ".__prefixe_db__."slides where id_slider = $this->id";
        $result = $db->queryS($selectSQL);
        foreach($result as $data){
            array_push($ids,$data['id']);
        }
        return $ids;
    }
}
?>