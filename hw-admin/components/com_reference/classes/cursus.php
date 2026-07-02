<?php

class cursus
{
    static $table =  __prefixe_db__ . "cursus";
    static $table2 =  __prefixe_db__ . "details_cursus";

    private $id;
    private $reference;
    private $ordre;
    private $titre;
    private $description;
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

    public function getReference()
    {
        return $this->reference;
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

    public function setReference($reference)
    {
        $this->reference = $reference;
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

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_reference, ordre, date_add, last_edit) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($this->reference->getId(), "int"),
            GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) {
            $id_cursus = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_cursus, titre, description, langue) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($id_cursus, "int"),
                GetSQLValueString($this->titre, "text"),
                GetSQLValueString($this->description, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  id_reference = %s, ordre = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->reference->getId(), "int"),
            GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );

        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_cursus = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );

            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_cursus, titre, description, langue) VALUES (%s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, description = %s WHERE id_cursus = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->langue, "text")
                );
            }
			//echo $SQLupdate;
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

        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_cursus = %s",
            GetSQLValueString($this->id, "int")
        );

        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){
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
        $url .= "RewriteRule ^" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&id=$2 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&id=$3 [NC,L]
        ";
        return $url;
    }

    public static function find($id, $langue)
    {
        global $db;
        $cursus = new cursus();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_cursus AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );

        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $cursus = static::build($data);
        }
        return $cursus;
    }

    public static function findAll($langue)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_cursus AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $cursus = static::build($data);
            array_push($items, $cursus);
        }
        return $items;
    }

    public static function findAllByReference($lang, $id)
    {
        global $db;
        $items = array();

        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_cursus AND langue = %s WHERE id_reference = %s",
            GetSQLValueString($lang, "text"),
            GetSQLValueString($id, "int")
        );

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $cursus = static::build($data);
            array_push($items, $cursus);
        }
        
        return $items;
    }

    public static function build($data){
        $cursus = new cursus();

        $cursus->setId($data['ID']);
        $cursus->setReference(reference::find($data['id_reference'], $data['langue']));
        $cursus->setOrdre($data['ordre']);
        $cursus->setTitre($data['titre']);
        $cursus->setDescription($data['description']);
        $cursus->setDateAdd($data['date_add']);
        $cursus->setLastEdit($data['last_edit']);
        $cursus->setLangue($data['langue']);

        return $cursus;
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
    
    public static function deleteMultiple($data){
        
        global $db;	
        if(isset($data['ids']) && !empty($data['ids'])){
            extract($data);
            $SQLdelete = "DELETE FROM ". static::$table ." WHERE id in $ids";
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_cursus in $ids";
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
                return 1;
            }else
                return 2;
        }
        else
            return 0;
    }

}