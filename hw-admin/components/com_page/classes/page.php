<?php

class page{

    private $id;
    private $titre_seo;
    private $description_seo;
    private $keyword_seo;
    private $texte;
    private $titre;
    private $h1;
    private $url;
    private $id_slider;
    private $photo;
    private $actif;
    private $type;
    private $externe;
    private $extrait;
    private $langue;

    public function __construct($id, $db, $lang = 'fr') {

        $SQLselect = "SELECT A.*, B.* FROM ".__prefixe_db__."page A
						  LEFT JOIN ".__prefixe_db__."details_page B ON A.id = B.id_page AND langue = '$lang'
						  WHERE A.id = $id";
        $result = $db->query($SQLselect);

        if ($db->num_rows($result) == 1){
            $data = $db->fetch_assoc($result);

            $this->id = $data['id'];
            $this->titre_seo = $data['seo_titre'];
            $this->description_seo = $data['seo_description'];
            $this->keyword_seo = isset($data['seo_keyword']) ? $data['seo_keyword'] : null;
            $this->texte = $data['texte'];
            $this->titre = $data['titre'];
            $this->h1 = $data['h1'];
            $this->url = $data['url'];
            $this->type = $data['type'];
            $this->id_slider = $data['id_slider'];
            $this->photo = $data['photo'];
            $this->externe = $data['externe'];
            $this->actif = $data['actif'];
            $this->extrait = $data['extrait'];
            $this->langue = $data['langue'];
        }
        else
            $this->id = 0;
    }

    public function __destruct(){

    }


    public function getId(){
        return $this->id;
    }

    public function getExtrait(){
        return $this->extrait;
    }

    public function getSeoTitre(){
        return $this->titre_seo;
    }

    public function getSeoDescription(){
        return $this->description_seo;
    }

    public function getSeoKeyword(){
        return $this->keyword_seo;
    }

    public function getTexte(){
        return $this->texte;
    }

    public function getTitre(){
        return $this->titre;
    }

    public function getH1(){
        return $this->h1;
    }

    public function getURL(){
        return $this->url;
    }

    public function getType(){

        return utf8_encode($this->type);
    }

    public function getExterne(){
        return utf8_encode($this->externe);
    }

    public function getIdSlider(){
        return $this->id_slider;
    }

    public function getPhoto(){
        return $this->photo;
    }

    public function isActif(){
        return $this->actif == 1 ? true : false ;
    }

    public function istranslated($id, $db, $l){
        $SQLselect = "SELECT A.*, B.* FROM ".__prefixe_db__."page A
						  LEFT JOIN ".__prefixe_db__."details_page B ON A.id = B.id_page AND langue = '$l'
						  WHERE A.id = $id AND langue = '$l'" ;
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){
            return  true ;
        }
    }

    public function getLink(){
        global $db, $siteURL;
        $pageName = $this->getTitre();
        if($pageName != ''){
            if(langue::isLangueDefault($this->langue)) {
                return $siteURL . url_rewriting($pageName) . '/';
            }else{
                return $siteURL . $this->langue. '/' . url_rewriting($pageName) . '/';
            }
        }else
            return 'index.php?option=com_page&id='.$this->id;
    }

    public function getSeo($l){
        global $db;
        $url = "";
        $lang = new langue($l, $db);
        if ($this->getTitre() != '') {
            if ($this->getType() == 'page') {
                if($lang->isDefault()) {
                    $url = "RewriteRule ^" . url_rewriting($this->getTitre()) . "/$ index.php?option=com_page&id=" . $this->getId() . "&l=" . $lang->getCode() . " [L]\r\n";
                }else{
                    $url = "RewriteRule ^". $lang->getCode() ."/". url_rewriting($this->getTitre()) . "/$ index.php?option=com_page&id=" . $this->getId() . "&l=" . $lang->getCode() . " [L]\r\n";
                }
            } else if ($this->getType() == 'lien') {
                if($lang->isDefault()) {
                    $url = "RewriteRule ^" . url_rewriting($this->getTitre()) . "/$ " . $this->getExterne() . "&id=" . $this->getId() . "&l=" . $lang->getCode() . " [L]\r\n";
                    $url .= "RewriteRule ^" . url_rewriting($this->getTitre()) . "/([0-9]+)/$ " . $this->getExterne() . "&id=" . $this->getId() . "&l=" . $lang->getCode() . " [L]\r\n";
                }else{
                    $url = "RewriteRule ^" . $lang->getCode() ."/". url_rewriting($this->getTitre()) . "/$ " . $this->getExterne() . "&id=" . $this->getId() . "&l=" . $lang->getCode() . " [L]\r\n";
                    $url .= "RewriteRule ^" . $lang->getCode() ."/". url_rewriting($this->getTitre()) . "/([0-9]+)/$ " . $this->getExterne() . "&id=" . $this->getId() . "&l=" . $lang->getCode() . " [L]\r\n";

                }
            }
        }
        return $url;
    }

    public static function findAll(){
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "page WHERE actif = 1";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }

}

?>
