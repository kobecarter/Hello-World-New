<?php

class job
{
    static $table =  __prefixe_db__ . "job";
    static $table2 =  __prefixe_db__ . "details_job";

    private $id;
    private $photo;
    private $ordre;
    private $active;
    private $date_add;
    private $last_edit;
    private $titre;
    private $description;
    private $langue;

    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function getLastEdit()
    {
        return $this->last_edit;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLangue()
    {
        return $this->langue;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function setLastEdit($last_edit)
    {
        $this->last_edit = $last_edit;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLangue($langue)
    {
        $this->langue = $langue;
    }

    public function add()
    {
        global $db;
        
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (photo, ordre, active, date_add, last_edit) VALUES (%s, %s, %s, %s, %s)",
            GetSQLValueString($this->getPhoto(), "text"),
            GetSQLValueString($this->getOrdre(), "int"),
            GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getDateAdd(), "date"),
            GetSQLValueString($this->getLastEdit(), "date")
        );
        if (!$db->query($SQLinsert)) {
            $id_job = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_job, titre, description, langue) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($id_job, "int"),
                GetSQLValueString($this->getTitre(), "text"),
                GetSQLValueString($this->getDescription(), "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  photo = %s, ordre = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->getPhoto(), "text"),
            GetSQLValueString($this->getOrdre(), "int"),
            GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getLastEdit(), "date"),
            GetSQLValueString($this->getId(), "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_job = %s AND langue = %s",
                GetSQLValueString($this->getId(), "int"),
                GetSQLValueString($this->getLangue(), "text")
            );

            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_job, titre, description, langue) VALUES (%s, %s, %s, %s)",
                    GetSQLValueString($this->getId(), "int"),
                    GetSQLValueString($this->getTitre(), "text"),
                    GetSQLValueString($this->getDescription(), "text"),
                    GetSQLValueString($this->getLangue(), "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, description = %s WHERE id_job = %s AND langue = %s",
                    GetSQLValueString($this->getTitre(), "text"),
                    GetSQLValueString($this->getDescription(), "text"),
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
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_job = %s",
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
        $job = new job();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_job AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $job = static::build($data);
        }
        return $job;
    }

    public static function findAll($langue, $active = false, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_job AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );

        if($active){
            $SQLselect .= " AND active = 1";
        }

        if($ordre){
            $SQLselect .= " ORDER BY ordre ASC";
        }

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $job = static::build($data);
            array_push($items, $job);
        }
        return $items;
    }

    public static function findPhotosName($data)
    {
        global $db;
        $photos = [];
        if(isset($data['ids']) && !empty($data['ids']))
        {
            $SQLselect = sprintf("SELECT photo FROM " . static::$table . " WHERE id in%s",
                GetSQLValueString($data['ids'], "text")
            );

            $result = $db->queryS($SQLselect);

            foreach($result as $photo)
            {
                $photos[] = $photo;
            }
            return $photos;

        }

    }

    public static function build($data){
        $job = new job();

        $job->setId($data['ID']);
        $job->setPhoto($data['photo']);
        $job->setOrdre($data['ordre']);
        $job->setActive($data['active']);
        $job->setDateAdd($data['date_add']);
        $job->setLastEdit($data['last_edit']);
        $job->setTitre($data['titre']);
        $job->setDescription($data['description']);
        $job->setLangue($data['langue']);

        return $job;
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
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_job in $ids";
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
                seo();
                return 1;
            }else
                return 2;
        }
        else
            return 0;
    }

}