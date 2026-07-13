<?php

class service
{
    static $table =  __prefixe_db__ . "service";
    static $table2 =  __prefixe_db__ . "details_service";

    private $id;
	private $parent;
    private $slider;
    private $photo;
    private $photo_banniere;
    private $photo_hero;
    private $ordre;
	private $active;
    private $home;
    private $titre;
    private $slug;
    private $sous_titre;
	private $h1;
    private $texte_accueil;
    private $extrait;
    private $texte;
    private $seo_titre;
    private $seo_description;
    private $seo_keyword;
    private $date_add;
    private $last_edit;
    private $langue;

    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getParent()
    {
        return $this->parent;
    }
    public function getSlider()
    {
        return $this->slider;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function isHome()
    {
        return $this->home ? 1 : 0;
    }

    public function getHome()
    {
        return $this->home;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getPhotoBanniere()
    {
        return $this->photo_banniere;
    }

    public function getPhotoHero()
    {
        return $this->photo_hero;
    }
	
	public function getOrdre()
    {
        return $this->ordre;
    }

    public function getTitre()
    {
        return $this->titre;
    }
    
    public function getSlug()
    {
        return $this->slug;
    }

    public function getSousTitre()
    {
        return $this->sous_titre;
    }
	
	public function getH1()
    {
        return $this->h1;
    }

    public function getTexte()
    {
        return $this->texte;
    }

    public function getTexteAccueil()
    {
        return $this->texte_accueil;
    }

    public function getExtrait()
    {
        return $this->extrait;
    }

    public function getSeoTitre()
    {
        return $this->seo_titre;
    }

    public function getSeoDescription()
    {
        return $this->seo_description;
    }

    public function getSeoKeyword()
    {
        return $this->seo_keyword;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function getLastEdit()
    {
        return $this->last_edit;
    }

    public function getLangue()
    {
        return $this->langue;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function setSlider($slider)
    {
        $this->slider = $slider;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setHome($home)
    {
        $this->home = $home;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setPhotoBanniere($photo_banniere)
    {
        $this->photo_banniere = $photo_banniere;
    }

    public function setPhotoHero($photo_hero)
    {
        $this->photo_hero = $photo_hero;
    }
	
	public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
    
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setSousTitre($sous_titre)
    {
        $this->sous_titre = $sous_titre;
    }
	
	public function setH1($h1)
    {
        $this->h1 = $h1;
    }

    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }

    public function setTexteAccueil($texte_accueil)
    {
        $this->texte_accueil = $texte_accueil;
    }

    public function setSeoTitre($seo_titre)
    {
        $this->seo_titre = $seo_titre;
    }

    public function setSeoDescription($seo_description)
    {
        $this->seo_description = $seo_description;
    }

    public function setSeoKeyword($seo_keyword)
    {
        $this->seo_keyword = $seo_keyword;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function setLastEdit($last_edit)
    {
        $this->last_edit = $last_edit;
    }

    public function setLangue($langue)
    {
        $this->langue = $langue;
    }

    public function add()
    {
        global $db;

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_parent, id_slider, photo, photo_banniere, photo_hero, ordre, active, home, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString($this->parent->getId(), "int"),
            GetSQLValueString($this->slider->getId(), "int"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->photo_banniere, "text"),
            GetSQLValueString($this->photo_hero, "text"),
            GetSQLValueString($this->ordre, "int"),
			GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->home, "int"),				 
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) 
        {
            $id_service = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_service, titre, slug, sous_titre, h1, texte_accueil, extrait, texte, seo_titre, seo_description, seo_keyword, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id_service, "int"),
                GetSQLValueString($this->titre, "text"),
                 GetSQLValueString($this->slug, "text"),
                GetSQLValueString($this->sous_titre, "text"),
				GetSQLValueString($this->h1, "text"),
                GetSQLValueString($this->texte_accueil, "text"),
                GetSQLValueString($this->extrait, "text"),
                GetSQLValueString($this->texte, "text"),
                GetSQLValueString($this->seo_titre, "text"),
                GetSQLValueString($this->seo_description, "text"),
                GetSQLValueString($this->seo_keyword, "text"),
                GetSQLValueString($this->langue, "text")
            );
            if (!$db->query($SQLinsert2)) {
                return 1;
            }
            return 2;
        } else {
            return 0;
        }
    }

    public function edit()
    {
        global $db;
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET id_parent = %s, id_slider = %s, photo = %s, photo_banniere = %s, photo_hero = %s, ordre = %s, active = %s, home = %s, last_edit = %s WHERE id = %s",
			GetSQLValueString($this->parent->getId(), "int"),
            GetSQLValueString($this->slider->getId(), "int"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->photo_banniere, "text"),
            GetSQLValueString($this->photo_hero, "text"),
            GetSQLValueString($this->ordre, "int"),
			GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->home, "int"),				 
            GetSQLValueString($this->last_edit, "date"), 
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_service = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );
            
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_service, titre, slug, sous_titre, h1, texte_accueil, extrait, texte, seo_titre, seo_description, seo_keyword, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->slug, "text"),
                    GetSQLValueString($this->sous_titre, "text"),
					GetSQLValueString($this->h1, "text"),
                    GetSQLValueString($this->texte_accueil, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->seo_titre, "text"),
                    GetSQLValueString($this->seo_description, "text"),
                    GetSQLValueString($this->seo_keyword, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, slug = %s, sous_titre = %s, h1 = %s, texte_accueil = %s, extrait = %s, texte = %s, seo_titre = %s, seo_description = %s, seo_keyword = %s WHERE id_service = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->slug, "text"),
                    GetSQLValueString($this->sous_titre, "text"),
					GetSQLValueString($this->h1, "text"),
                    GetSQLValueString($this->texte_accueil, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->seo_titre, "text"),
                    GetSQLValueString($this->seo_description, "text"),
                    GetSQLValueString($this->seo_keyword, "text"),
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->langue, "text")
                );
            }
            if (!$db->query($SQLupdate)) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 0;
        }
    }

    public function delete()
    {
        global $db;
        if($this->hasChildren()){
            $children = $this->getChildren($_SESSION["langue"]);
            foreach($children as $child){
                $parent = new service();
                $child->setParent($parent);
                $child->editParent();
            }
        }
        $SQLdelete = sprintf("DELETE FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($this->getId(), "int")
        );
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_service = %s",
            GetSQLValueString($this->getId(), "int")
        );
        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){
            return 1;
        } else {
            return 0;
        }
    }

    public function enable()
    {
        global $db;
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET active = %s WHERE id = %s",
            GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getId(), "int")
        );
        if(!$db->query($SQLupdate)){
            return 1;
        } else {
            return 0;
        }
    }

    public function editParent()
    {
        global $db;
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET id_parent = %s WHERE id = %s",
            GetSQLValueString($this->getParent()->getId(), "int"),
            GetSQLValueString($this->getId(), "int")
        );
        if(!$db->query($SQLupdate)){
            return 1;
        } else {
            return 0;
        }
    }

    public function hasChildren($active = false){
        global $db;
        $SQLcount = sprintf("SELECT count(id) as c FROM " . static::$table . " WHERE id_parent = %s",
            GetSQLValueString($this->getId(), "int")
        );
        if($active){
            $SQLcount .= " AND active = 1";
        }
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"] > 0 ? true : false;
        }
        return false;
    }

    public function getChildren($langue, $active = false, $ordre = false){
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_service AND langue = %s WHERE 1 = 1 AND id_parent = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($this->id, "int")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
		
		if($ordre){
			$SQLselect .= " ORDER BY ordre ASC";
		}
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $service = static::build($data);
            array_push($items, $service);
        }
        return $items;
    }

    /*public function getLink(){
        global $siteURL;
        if ($this->titre != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . __CLASS__ . "/" . url_rewriting($this->titre) . "/" . $this->id . "/";
            } else {
                return $siteURL . $this->getLangue() . "/" . __CLASS__ . "/" . url_rewriting($this->getTitre()) . "/" . $this->id . "/";
            }
        } else
            return "index.php?option=com_" . __CLASS__ . "&id=" . $this->id;
    }*/
    
    public function getLink(){
        global $siteURL;
        if ($this->slug != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . __CLASS__ . "/" . $this->slug . "/";
            } else {
                return $siteURL . $this->getLangue() . "/" . __CLASS__ . "/" . $this->getSlug() . "/";
            }
        } else
            return "index.php?option=com_" . __CLASS__ . "&slug=" . $this->slug;
    }
	
	public function getThankYouPageLink(){
        global $siteURL;
        if ($this->slug != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . __CLASS__ . "/" . $this->slug . "/confirm/" . $this->id . "/";
            } else {
                return $siteURL . $this->getLangue() . "/" . __CLASS__ . "/" . $this->slug . "/confirm/" . $this->id . "/";
            }
        } else
            return "index.php?option=com_" . __CLASS__ . "&task=thankYou&id=" . $this->id;
    }

    public static function getSeo(){
        $url = "";
        $url .= "RewriteRule ^" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&id=$2 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&id=$3 [NC,L]
        RewriteRule ^" . __CLASS__ . "/([^/]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&slug=$1 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([^/]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&slug=$2 [NC,L]
		RewriteRule ^" . __CLASS__ . "/([a-zA-Z0-9_-]+)/confirm/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=thankYou&id=$2 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([a-zA-Z0-9_-]+)/confirm/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=thankYou&l=$1&id=$3 [NC,L]
        ";
        return $url;
    }

    public function getItems($elements, $lang){
        $items = [];
        foreach($elements as $element){
            $items = $element::findAllByService($lang, $this->id);
            if(count($items)){
                array_push($items, $element);
                break;
            }
        }
        return $items;
    }

    public static function find($id, $langue = 'fr')
    {
        global $db;
        $service = new service();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_service AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $service = static::build($data);
        }
        return $service;
    }

    public static function findAll($langue, $active = false, $parent = false, $home = false, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_service AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
        if($home){
            $SQLselect .= " AND home = 1";
        }
        if($parent){
            $SQLselect .= " AND (id_parent = 0 || id_parent = NULL)";
        }
		if($ordre){
			$SQLselect .= " ORDER BY ordre ASC";
		}
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $service = static::build($data);
            array_push($items, $service);
        }
        return $items;
    }
    
    public static function findBySlug($slug, $langue)
    {
        global $db;
        $service = new service();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_service AND langue = %s WHERE B.slug = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($slug, "text")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $service = static::build($data);
        }
        return $service;
    }
    
    public static function generateSlug($slug, $langue , $id = false)
    {
        global $db;
        $index = 1;
        $done = false;
        $newSlug = url_rewriting($slug);
        do{
            $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_service AND langue = %s WHERE slug = %s",
                GetSQLValueString($langue, "text"),
                GetSQLValueString($newSlug, "text")
            );
            if($id){
                $SQLselect .= " AND A.id != $id";
            }
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) >= 1) {
                $newSlug = url_rewriting($slug.'-'.$index);
                $index++;
            }else{
                $done = true;
            }
        }while($done == false);
        return $newSlug;
    }

    public static function findPhotosName($data)
    {
        global $db;
        $photos = [];
        if(isset($data['ids']) && !empty($data['ids']))
        {
            $SQLselect = sprintf("SELECT photo, photo_banniere FROM " . static::$table . " WHERE id in%s",
                GetSQLValueString($data['ids'], "text")
            );

            $result = $db->queryS($SQLselect);

            foreach($result as $data)
            {
                $photos[] = $data["photo"];
                $photos[] = $data["photo_banniere"];
            }
            return $photos;

        }

    }

    public static function build($data){
        global $db;
        $service = new service();
        
        $service->setId($data['ID']);
        $service->setParent(service::find($data['id_parent'], $data["langue"]));
        $sl = new slider($data['id_slider'], $db);
        $service->setSlider($sl);
        $service->setPhoto($data['photo']);
        $service->setPhotoBanniere($data['photo_banniere']);
        $service->setPhotoHero($data['photo_hero']);
		$service->setOrdre($data['ordre']);
        $service->setActive($data['active']);
        $service->setHome($data['home']);
        $service->setTitre($data['titre']);
        $service->setSlug($data['slug']);
        $service->setSousTitre($data['sous_titre']);
		$service->setH1($data['h1']);
        $service->setTexteAccueil($data['texte_accueil']);
        $service->setExtrait($data['extrait']);
        $service->setTexte($data['texte']);
        $service->setSeoTitre($data['seo_titre']);
        $service->setSeoDescription($data['seo_description']);
        $service->setSeoKeyword($data['seo_keyword']);
        $service->setDateAdd($data['date_add']);
        $service->setLastEdit($data['last_edit']);
        $service->setLangue($data['langue']);
        return $service;
    }

    public static function getLastId(){
        global $db;
        return $db->last_id();
    }

    public static function count(){
        global $db;
        $SQLcount = "SELECT count(id) as c FROM " . static::$table;
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }

    public static function enableMultiple($data)
    {
        global $db;
        if(isset($data['ids']) && !empty($data['ids']) && isset($data['active']) && $data['active'] != '')
        {
            extract($data);

            $SQLupdate = sprintf("UPDATE " . static::$table . " SET active = $active WHERE id in$ids");
            
            if(!$db->query($SQLupdate))
                return 1;
            else
                return 2;
        }
        else
            return 0;
    }
    
    public static function deleteMultiple($data){
        
        global $db;	
        if(isset($data['ids']) && !empty($data['ids'])){
            extract($data);
            $SQLdelete = "DELETE FROM ". static::$table ." WHERE id in $ids";
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_service in $ids";
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
                //seo();
                return 1;
            }else
                return 2;
        }
        else
            return 0;
    }

}