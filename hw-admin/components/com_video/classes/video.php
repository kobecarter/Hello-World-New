<?php

class video
{
    static $table =  __prefixe_db__ . "video";
    static $table2 =  __prefixe_db__ . "details_video";

    private $id;
    private $categorie;
    private $active;
    private $ordre;
    private $video;
	private $photo;
    private $titre;
    private $extrait;
	private $localisation;
	private $date_shooting;
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

    public function getCategorie()
    {
        return $this->categorie;
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

    public function getVideo()
    {
        return $this->video;
    }
	
	public function getPhoto()
    {
        return $this->photo;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getExtrait()
    {
        return $this->extrait;
    }
	
	public function getLocalisation()
    {
        return $this->localisation;
    }
	
    public function getDateShooting()
    {
        return $this->date_shooting;
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

    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
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
	
	public function setVideo($video)
    {
        $this->video = $video;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }
	
	public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    }
	
    public function setDateShooting($date_shooting)
    {
        $this->date_shooting = $date_shooting;
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
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_categorie, active, ordre, video, photo, date_shooting, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->getCategorie() ? $this->getCategorie()->getId() : 0, "int"),
            GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getOrdre(), "int"),
			GetSQLValueString($this->getVideo(), "text"),				 
            GetSQLValueString($this->getPhoto(), "text"),
			GetSQLValueString($this->getDateShooting(), "date"),				 
            GetSQLValueString($this->getDateAdd(), "date"),
            GetSQLValueString($this->getLastEdit(), "date")
        );
        if (!$db->query($SQLinsert)) {
            $id_video = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_video, titre, extrait, localisation, langue) VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($id_video, "int"),
                GetSQLValueString($this->getTitre(), "text"),
                GetSQLValueString($this->getExtrait(), "text"),
				GetSQLValueString($this->getLocalisation(), "text"),				  
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  id_categorie = %s, active = %s, ordre = %s, video = %s, photo = %s, date_shooting = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->getCategorie() ? $this->getCategorie()->getId() : 0, "int"),
            GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getOrdre(), "int"),
            GetSQLValueString($this->getVideo(), "text"),
			GetSQLValueString($this->getPhoto(), "text"),
			GetSQLValueString($this->getDateShooting(), "date"),				 
            GetSQLValueString($this->getLastEdit(), "date"),
            GetSQLValueString($this->getId(), "int")
        );

        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_video = %s AND langue = %s",
                GetSQLValueString($this->getId(), "int"),
                GetSQLValueString($this->getLangue(), "text")
            );
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_video, titre, extrait, localisation, langue) VALUES (%s, %s, %s, %s, %s)",
                    GetSQLValueString($this->getId(), "int"),
                    GetSQLValueString($this->getTitre(), "text"),
                    GetSQLValueString($this->getExtrait(), "text"),
					GetSQLValueString($this->getLocalisation(), "text"),				 
                    GetSQLValueString($this->getLangue(), "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, extrait = %s, localisation = %s WHERE id_video = %s AND langue = %s",
                    GetSQLValueString($this->getTitre(), "text"),
                    GetSQLValueString($this->getExtrait(), "text"),
					GetSQLValueString($this->getLocalisation(), "text"),				 
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
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_video = %s",
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

    public static function find($id, $langue)
    {
        global $db;
        $video = new video();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_video AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $video = static::build($data);
        }
        return $video;
    }

    public static function findAll($langue, $active = false, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_video AND langue = %s",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " WHERE active = 1";
        }
        if($ordre){
            $SQLselect .= " ORDER BY ordre ASC";
        }else{
            $SQLselect .= " ORDER BY date_add DESC";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $video = static::build($data);
            array_push($items, $video);
        }
        return $items;
    }

    public static function findAllRand($langue, $active = false, $limit = false, $order = false, $exceptCategory = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_video AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
		if($exceptCategory){
            $SQLselect .= " AND id_categorie <> $exceptCategory";
        }
		if($order){
            $SQLselect .= " ORDER BY RAND()";
        }
		
		if($limit){
            $SQLselect .= " LIMIT $limit";
        }

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $video = static::build($data);
            array_push($items, $video);
        }
        return $items;
    }


    public static function findAllByCategorie($langue, $id_categorie, $active = false, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_video AND langue = %s WHERE id_categorie = ".$id_categorie,
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
        if($ordre){
            $SQLselect .= " ORDER BY ordre DESC";
        }else{
            $SQLselect .= " ORDER BY date_shooting DESC";
        }

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $video = static::build($data);
            array_push($items, $video);
        }
        return $items;
    }
	
    public static function build($data, $langue = 'en'){
        $video = new video();
        $video->setId($data['ID']);
        $video->setCategorie(categorie::find($data["id_categorie"], $langue));
        $video->setActive($data['active']);
        $video->setOrdre($data['ordre']);
        $video->setVideo($data['video']);
		$video->setPhoto($data['photo']);
        $video->setTitre($data['titre']);
        $video->setExtrait($data['extrait']);
		$video->setLocalisation($data['localisation']);
        $video->setDateShooting($data['date_shooting']);
		$video->setDateAdd($data['date_add']);
        $video->setLastEdit($data['last_edit']);
        $video->setLangue($data['langue']);
        return $video;
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