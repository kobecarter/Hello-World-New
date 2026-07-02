<?php

class categorie_produit
{
    static $table =  __prefixe_db__ . "categorie_produit";
    static $table2 =  __prefixe_db__ . "details_categorie_produit";

    private $id;
	private $parant;
    private $active;
    private $ordre;
    private $photo;
    private $titre;
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
	
	public function getParent()
    {
        return $this->parant;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getTitre()
    {
        return $this->titre;
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
	
	public function setParent($parant)
    {
        $this->parant = $parant;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
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
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_parent, active, ordre, photo, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->parant ? $this->parant->getId() : null, "int"),
			GetSQLValueString($this->getActive(), "int"),				 
            GetSQLValueString($this->getOrdre(), "int"),
            GetSQLValueString($this->getPhoto(), "text"),
            GetSQLValueString($this->getDateAdd(), "date"),
            GetSQLValueString($this->getLastEdit(), "date")
        );
        if (!$db->query($SQLinsert)) {
            $id_categorie = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_categorie, titre, seo_titre, seo_description, langue) VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($id_categorie, "int"),
                GetSQLValueString($this->getTitre(), "text"),
                GetSQLValueString($this->getSeoTitre(), "text"),
                GetSQLValueString($this->getSeoDescription(), "text"),
                GetSQLValueString($this->getLangue(), "text")
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET id_parent = %s, active = %s, ordre = %s, photo = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->parant ? $this->parant->getId() : null, "int"),
			GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getOrdre(), "int"),
            GetSQLValueString($this->getPhoto(), "text"),
            GetSQLValueString($this->getLastEdit(), "date"),
            GetSQLValueString($this->getId(), "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_categorie = %s AND langue = %s",
                GetSQLValueString($this->getId(), "int"),
                GetSQLValueString($this->getLangue(), "text")
            );
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_categorie, titre, seo_titre, seo_description, langue) VALUES (%s, %s, %s, %s, %s)",
                    GetSQLValueString($this->getId(), "int"),
                    GetSQLValueString($this->getTitre(), "text"),
                    GetSQLValueString($this->getSeoTitre(), "text"),
                    GetSQLValueString($this->getSeoDescription(), "text"),
                    GetSQLValueString($this->getLangue(), "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, seo_titre = %s, seo_description = %s WHERE id_categorie = %s AND langue = %s",
                    GetSQLValueString($this->getTitre(), "text"),
                    GetSQLValueString($this->getSeoTitre(), "text"),
                    GetSQLValueString($this->getSeoDescription(), "text"),
                    GetSQLValueString($this->getId(), "int"),
                    GetSQLValueString($this->getLangue(), "text")
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
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_categorie = %s",
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
        if ($this->getTitre() != "") {
            if (langue::isLangueDefault($this->getLangue())) {
                return $siteURL . __CLASS__ . "/" . url_rewriting($this->getTitre()) . "/" . $this->getId() . "/";
            } else {
                return $siteURL . $this->getLangue() . "/" . __CLASS__ . "/" . url_rewriting($this->getTitre()) . "/" . $this->getId() . "/";
            }
        } else
            return "index.php?option=com_" . __CLASS__ . "&id=" . $this->getId();
    }

    public static function find($id, $langue)
    {
        global $db;
        $categorie = new categorie_produit();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_categorie AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $categorie = static::build($data);
        }
        return $categorie;
    }

    public static function findAll($langue, $active = false, $parent = false, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_categorie AND langue = %s",
            GetSQLValueString($langue, "text")
        );
		$SQLselect .= " WHERE 1 = 1";
        if($active){
            $SQLselect .= " AND active = 1";
        }
		if($parent){
            $SQLselect .= " AND id_parent = $parent";
        }
        if($ordre){
            $SQLselect .= " ORDER BY ordre ASC";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $categorie = static::build($data);
            array_push($items, $categorie);
        }
        return $items;
    }
	
	public static function findAllParent($langue, $active = false, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_categorie AND langue = %s",
            GetSQLValueString($langue, "text")
        );
		$SQLselect .= " WHERE ISNULL(id_parent)";
        if($active){
            $SQLselect .= " AND active = 1";
        }
        if($ordre){
            $SQLselect .= " ORDER BY ordre ASC";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $categorie = static::build($data);
            array_push($items, $categorie);
        }
        return $items;
    }
	
	

    public static function build($data){
        $categorie = new categorie_produit();
        $categorie->setId($data['ID']);
		$categorie->setParent(categorie_produit::find($data['id_parent'],$data['langue']));
        $categorie->setActive($data['active']);
        $categorie->setOrdre($data['ordre']);
        $categorie->setPhoto($data['photo']);
        $categorie->setTitre($data['titre']);
        $categorie->setSeoTitre($data['seo_titre']);
        $categorie->setSeoDescription($data['seo_description']);
        $categorie->setDateAdd($data['date_add']);
        $categorie->setLastEdit($data['last_edit']);
        $categorie->setLangue($data['langue']);
        return $categorie;
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

}