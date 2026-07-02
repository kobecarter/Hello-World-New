<?php

class menu_item{
    private $id;
    private $id_menu;
    private $parent_id;
    private $type;
    private $id_item;
    private $blank;
    private $ordre;
    private $titre;
    private $lien;

    public function __construct($id, $db, $lang = 'fr') {

        $SQLselect = "SELECT A.*, B.* FROM ".__prefixe_db__."menu_items A
					  LEFT JOIN ".__prefixe_db__."details_menu_item B ON A.id = B.id_menu_item AND langue = '$lang'
					  WHERE A.id = $id";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->id_menu = $data['id_menu'];
            $this->parent_id = $data['parent_id'];
            $this->type = $data['type'];
            $this->id_item = $data['id_item'];
            $this->blank = $data['blank'];
            $this->ordre = $data['ordre'];
            $this->titre = $data['titre'];
            $this->lien = $data['lien'];
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getIdMenu(){
        return $this->id_menu;
    }

    public function getItemParent(){
        return $this->parent_id;
    }

    public function getType(){
        return $this->type;
    }

    public function getIdItem(){
        return $this->id_item;
    }

    public function isBlank(){
        return $this->blank == 1 ? true : false;
    }

    public function getOrdre(){
        return $this->ordre;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getLien(){
        return $this->lien;
    }

    public function getLink(){
        global $db;
        $link = "#0";
        if($this->type == 'ext'){
            $link = $this->lien;
        }else{
            $classe = $this->type;
            if(method_exists($classe, "find")){
                $p = $classe::find($this->getIdItem(), $_SESSION["lang"]);
            } else {
                $p = new $classe($this->id_item,$db,$_SESSION['lang']);
            }

            $link = $p->getLink();
        }
        return $link;
    }

    public function hasSousMenu(){
        global $db;
        $SQLselect = "SELECT * FROM ".__prefixe_db__."menu_items WHERE parent_id = ".$this->id;
        return ($db->num_rows($db->query($SQLselect)) == 0) ? false : true;
    }

    public function getSousMenu(){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = ".$this->id ." ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }
}

?>
