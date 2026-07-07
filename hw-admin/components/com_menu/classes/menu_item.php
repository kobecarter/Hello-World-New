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
    private $panel_key;
    private $icon;
    private $gradient;
    private $badge;
    private $card_style;
    private $auto_list;
    private $auto_limit;
    private $show_packs;
    private $testimonial_id;
    private $cta_label;
    private $active;
    private $description;
    private $image;

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
            $this->panel_key = $data['panel_key'];
            $this->icon = $data['icon'];
            $this->gradient = $data['gradient'];
            $this->badge = $data['badge'];
            $this->card_style = $data['card_style'];
            $this->auto_list = $data['auto_list'];
            $this->auto_limit = $data['auto_limit'];
            $this->show_packs = $data['show_packs'];
            $this->testimonial_id = $data['testimonial_id'];
            $this->cta_label = $data['cta_label'];
            $this->active = $data['active'];
            $this->description = isset($data['description']) ? $data['description'] : '';
            $this->image = isset($data['image']) ? $data['image'] : null;
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

    public function getPanelKey(){
        return $this->panel_key;
    }

    public function getIcon(){
        return $this->icon ? $this->icon : 'chat';
    }

    public function getGradient(){
        return $this->gradient ? $this->gradient : 'grad-sol';
    }

    public function getBadge(){
        return $this->badge;
    }

    public function getCardStyle(){
        return $this->card_style ? $this->card_style : 'sublink';
    }

    public function getAutoList(){
        return $this->auto_list;
    }

    public function getAutoLimit(){
        return $this->auto_limit !== null && $this->auto_limit !== '' ? intval($this->auto_limit) : null;
    }

    public function getShowPacks(){
        return $this->show_packs == 1;
    }

    public function getTestimonialId(){
        return $this->testimonial_id;
    }

    public function getCtaLabel(){
        return $this->cta_label;
    }

    public function isActive(){
        return $this->active === null || intval($this->active) == 1;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImage(){
        return $this->image;
    }

    /**
     * Shared fallback: a manually-entered description wins; otherwise fall
     * back to the linked record's own sous_titre/extrait/texte_accueil,
     * truncated. Used by getMegaMenu() so every panel truncates the same way
     * instead of the ad-hoc mb_strimwidth calls previously duplicated per panel.
     */
    public static function shortenDescription($manualDescription, $fallbackRecord = null, $limit = 90){
        $text = trim($manualDescription);
        if ($text === '' && $fallbackRecord !== null) {
            $raw = '';
            if (method_exists($fallbackRecord, 'getSousTitre') && $fallbackRecord->getSousTitre()) {
                $raw = $fallbackRecord->getSousTitre();
            } elseif (method_exists($fallbackRecord, 'getExtrait') && $fallbackRecord->getExtrait()) {
                $raw = $fallbackRecord->getExtrait();
            } elseif (method_exists($fallbackRecord, 'getTexteAccueil') && $fallbackRecord->getTexteAccueil()) {
                $raw = $fallbackRecord->getTexteAccueil();
            }
            $text = trim(html_entity_decode(strip_tags($raw), ENT_QUOTES, 'UTF-8'));
        }
        return mb_strimwidth($text, 0, $limit, '…', 'UTF-8');
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
        $SQLselect = "SELECT * FROM ".__prefixe_db__."menu_items WHERE parent_id = ".$this->id." AND (active IS NULL OR active = 1)";
        return ($db->num_rows($db->query($SQLselect)) == 0) ? false : true;
    }

    public function getSousMenu(){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE parent_id = ".$this->id ." AND (active IS NULL OR active = 1) ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }
}

?>
