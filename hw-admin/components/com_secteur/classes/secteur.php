<?php

class secteur
{
    static $table =  __prefixe_db__ . "secteur";
    static $table2 =  __prefixe_db__ . "details_secteur";

    private $id;
    private $service;
    private $photo;
    private $photo_banniere;
    private $active;
    private $titre;
    private $h1;
    private $stug;
    private $slug;
    private $sous_titre;
    private $extrait;
    private $texte;
    private $seo_titre;
    private $seo_description;
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

    public function getService()
    {
        return $this->service;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getPhotoBanniere()
    {
        return $this->photo_banniere;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getH1()
    {
        return $this->h1;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getSousTitre()
    {
        return $this->sous_titre;
    }

    public function getTexte()
    {
        return $this->texte;
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

    public function setService($service)
    {
        $this->service = $service;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setPhotoBanniere($photo_banniere)
    {
        $this->photo_banniere = $photo_banniere;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setH1($h1)
    {
        $this->h1 = $h1;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    public function setSousTitre($sous_titre)
    {
        $this->sous_titre = $sous_titre;
    }

    public function setTexte($texte)
    {
        $this->texte = $texte;
    }

    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }

    public function setSeoTitre($seo_titre)
    {
        $this->seo_titre = $seo_titre;
    }

    public function setSeoDescription($seo_description)
    {
        $this->seo_description = $seo_description;
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

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_service, photo, photo_banniere, active, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->photo_banniere, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) 
        {
            $id_secteur = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_secteur, titre, h1, slug, sous_titre, extrait, texte, seo_titre, seo_description, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id_secteur, "int"),
                GetSQLValueString($this->titre, "text"),
                GetSQLValueString($this->h1, "text"),
                GetSQLValueString($this->slug, "text"),
                GetSQLValueString($this->sous_titre, "text"),
                GetSQLValueString($this->extrait, "text"),
                GetSQLValueString($this->texte, "text"),
                GetSQLValueString($this->seo_titre, "text"),
                GetSQLValueString($this->seo_description, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET id_service = %s, photo = %s, photo_banniere = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->photo_banniere, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->last_edit, "date"), 
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_secteur = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );
            
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_secteur, titre, h1, slug, sous_titre, extrait, texte, seo_titre, seo_description, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->h1, "text"),
                    GetSQLValueString($this->slug, "text"),
                    GetSQLValueString($this->sous_titre, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->seo_titre, "text"),
                    GetSQLValueString($this->seo_description, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, h1 = %s, slug = %s, sous_titre = %s, extrait = %s, texte = %s, seo_titre = %s, seo_description = %s WHERE id_secteur = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->h1, "text"),
                    GetSQLValueString($this->slug, "text"),
                    GetSQLValueString($this->sous_titre, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->seo_titre, "text"),
                    GetSQLValueString($this->seo_description, "text"),
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

		$SQLdelete = sprintf("DELETE FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($this->getId(), "int")
        );
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_secteur = %s",
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
    

    public static function getSeo(){
        $url = "";
        $url .= "RewriteRule ^" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&id=$2 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&id=$3 [NC,L]
        RewriteRule ^" . __CLASS__ . "/([^/]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&slug=$1 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([^/]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&slug=$2 [NC,L]
        ";
        return $url;
    }

    public static function find($id, $langue)
    {
        global $db;
        $secteur = new secteur();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_secteur AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $secteur = static::build($data);
        }
        return $secteur;
    }
    
    public static function findBySlug($slug, $langue)
    {
        global $db;
        $secteur = new secteur();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_secteur AND langue = %s WHERE B.slug = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($slug, "text")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $secteur = static::build($data);
        }
        return $secteur;
    }
    
    // New generate slug function
    
    public static function generateSlug($slug, $langue , $id = false)
{
    global $db;
    $index = 1;
    $done = false;

    // Transformer le titre en slug
    $newSlug = url_rewriting($slug);

    // Limiter le slug à 75 caractères
    $maxLength = 75;
    if (strlen($newSlug) > $maxLength) {
        $newSlug = substr($newSlug, 0, $maxLength);
    }

    do {
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A 
             LEFT JOIN " . static::$table2 . " B ON A.id = B.id_secteur AND langue = %s 
             WHERE slug = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($newSlug, "text")
        );

        if($id){
            $SQLselect .= " AND A.id != $id";
        }

        $result = $db->query($SQLselect);

        if ($db->num_rows($result) >= 1) {
            // Ajouter suffixe et vérifier la longueur
            $tempSlug = url_rewriting($slug.'-'.$index);
            if (strlen($tempSlug) > $maxLength) {
                // Troncature pour ne pas dépasser 75 caractères
                $tempSlug = substr($tempSlug, 0, $maxLength);
            }
            $newSlug = $tempSlug;
            $index++;
        } else {
            $done = true;
        }
    } while(!$done);

    return $newSlug;
}


public static function findAll($langue, $active = false, $services = false, $currentPage = false, $limit = false)
{
    global $db;
    $items = array();

    $SQLselect = sprintf(
        "SELECT A.id as ID, A.*, B.*
         FROM " . static::$table . " A
         LEFT JOIN " . static::$table2 . " B ON A.id = B.id_secteur AND B.langue = %s
         WHERE 1=1",
        GetSQLValueString($langue, "text")
    );

    if ($active) {
        $SQLselect .= " AND A.active = 1";
    }
   if ($services !== false) {
        if (is_array($services)) {
            // Si plusieurs catégories
            $services = array_map('intval', $services);
            $SQLselect .= " AND A.id_service IN (" . implode(',', $services) . ")";
        } else {
            // Si une seule catégorie
            $SQLselect .= " AND A.id_service = " . intval($services);
        }
    }

    $SQLselect .= " ORDER BY A.id ASC";

    if ($currentPage && $limit) {
        $page = ($currentPage - 1) * $limit;
        $SQLselect .= " LIMIT $page, $limit";
    } elseif ($limit) {
        $SQLselect .= " LIMIT $limit";
    }

    $result = $db->queryS($SQLselect);
    foreach ($result as $data) {
        $secteur = static::build($data);
        array_push($items, $secteur);
    }
    return $items;
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
        $secteur = new secteur();
        
        $secteur->setId($data['ID']);
        $secteur->setService(service::find($data['id_service'],$data['langue']));
        $secteur->setPhoto($data['photo']);
        $secteur->setPhotoBanniere($data['photo_banniere']);
        $secteur->setActive($data['active']);
        $secteur->setTitre($data['titre']);
        $secteur->setH1($data['h1']);
        $secteur->setSlug($data['slug']);
        $secteur->setSousTitre($data['sous_titre']);
        $secteur->setExtrait($data['extrait']);
        $secteur->setTexte($data['texte']);
        $secteur->setSeoTitre($data['seo_titre']);
        $secteur->setSeoDescription($data['seo_description']);
        $secteur->setDateAdd($data['date_add']);
        $secteur->setLastEdit($data['last_edit']);
        $secteur->setLangue($data['langue']);
        return $secteur;
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
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_secteur in $ids";
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