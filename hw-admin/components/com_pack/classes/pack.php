<?php

class pack
{
    static $table =  __prefixe_db__ . "pack";
    static $table2 =  __prefixe_db__ . "details_pack";

    private $id;
    private $service;
    private $prix;
    private $photo;
    private $active;
    private $populaire;
    private $ordre;
    private $titre;
    private $description;
    private $details;
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

    public function getPrix()
    {
        return $this->prix;
    }
    
    public function getPhoto()
    {
        return $this->photo;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }
    
    public function isPopulaire()
    {
        return $this->populaire ? 1 : 0;
    }

    public function getPopulaire()
    {
        return $this->populaire;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getDetails()
    {
        return $this->details;
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

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }
    
    public function setPopulaire($populaire)
    {
        $this->populaire = $populaire;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setDetails($details)
    {
        $this->details = $details;
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

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_service, prix, photo, active, populaire, ordre, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->prix, "double"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->populaire, "int"),
            GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) {
            $id_pack = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_pack, titre, description, details, langue) VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($id_pack, "int"),
                GetSQLValueString($this->titre, "text"),
                GetSQLValueString($this->description, "text"),
                GetSQLValueString($this->details, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  id_service = %s, prix = %s, photo = %s, active = %s, populaire = %s, ordre = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->prix, "text"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->populaire, "int"),
            GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_pack = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );

            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_pack, titre, description, details, langue) VALUES (%s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->details, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, description = %s, details = %s WHERE id_pack = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->details, "text"),
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
            GetSQLValueString($this->id, "int")
        );

        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_pack = %s",
            GetSQLValueString($this->id, "int")
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
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->id, "int")
        );

        if(!$db->query($SQLupdate)){
            return 1;
        } else {
            return 0;
        }
    }

    public function getLink(){
        global $siteURL;
        if ($this->titre != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . __CLASS__ . "/" . url_rewriting($this->titre) . "/" . $this->id . "/";
            } else {
                return $siteURL . $this->langue . "/" . __CLASS__ . "/" . url_rewriting($this->titre) . "/" . $this->id . "/";
            }
        } else
            return "index.php?option=com_" . __CLASS__ . "&id=" . $this->id;
    }

    public static function getSeo(){
        $url = "";
        $url .= "RewriteRule ^" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&id=$2&l=fr [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&id=$3 [NC,L]
        ";
        return $url;
    }

    public function getItems($elements, $lang){
        $items = [];
        foreach($elements as $element){
            $items = $element::findAllByPack($lang, $this->id);
            if(count($items)){
                array_push($items, $element);
                break;
            }
        }
        return $items;
    }

    public static function find($id, $langue)
    {
        global $db;
        $pack = new pack();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_pack AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $pack = static::build($data);
        }
        return $pack;
    }

    public static function findAll($langue, $active = false, $ordre = false, $service = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_pack AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
		
		if($service){
            $SQLselect .= " AND id_service = $service";
        }
		
        if($ordre){
            $SQLselect .= " ORDER BY ordre ASC";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $pack = static::build($data);
            array_push($items, $pack);
        }
        return $items;
    }

    public static function build($data){
        $pack = new pack();

        $pack->setId($data['ID']);
        $pack->setService(service::find($data['id_service'], $data["langue"]));
        $pack->setPrix($data['prix']);
        $pack->setPhoto($data['photo']);
        $pack->setActive($data['active']);
        $pack->setPopulaire($data['populaire']);
        $pack->setOrdre($data['ordre']);
        $pack->setTitre($data['titre']);
        $pack->setDescription($data['description']);
        $pack->setDetails($data['details']);
        $pack->setDateAdd($data['date_add']);
        $pack->setLastEdit($data['last_edit']);
        $pack->setLangue($data['langue']);

        return $pack;
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
            {
                return 1;
            }else
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
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_pack in $ids";
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
                return 1;
            }else
                return 2;
        }
        else
            return 0;
    }

}