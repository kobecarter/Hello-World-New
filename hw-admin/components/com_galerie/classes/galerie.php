<?php

class galerie
{
    static $table =  __prefixe_db__ . "galerie";
    static $table2 =  __prefixe_db__ . "details_galerie";
    static $table3 =  __prefixe_db__ . "galerie_photo";

    private $id;
    private $cover;
    private $titre;
    private $active;
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

    public function getCover()
    {
        return $this->cover;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getTitre()
    {
        return $this->titre;
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

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setCover($cover)
    {
        $this->cover = $cover;
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

    public function setLangue($langue)
    {
        $this->langue = $langue;
    }

    public function add()
    {
        global $db;

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (cover, active, date_add, last_edit) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($this->cover, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) {
            $id_galerie = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_galerie, titre, langue) VALUES (%s, %s, %s)",
                GetSQLValueString($id_galerie, "int"),
                GetSQLValueString($this->titre, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  cover = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->cover, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );

        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_galerie = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );

            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = printf("INSERT INTO " . static::$table2 . " (id_galerie, titre, langue) VALUES (%s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->langue, "text")
                );
                
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s WHERE id_galerie = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
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

        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_galerie = %s",
            GetSQLValueString($this->id, "int")
        );
        
        
        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2))
        {
            $items = galerie_photo::findAllByGalerie($_SESSION['langue'], $this->id);
            $test = true;
            if(count($items) > 0)
            {
                foreach($items as $item)
                {
                    $photo = $item->getPhoto();
                    if($item->delete() == 1)
                    {
                        if(file_exists("../../../../images/galerie/" . $photo)){
                            @unlink("../../../../images/galerie/" . $photo);
                        }
                    }
                    else
                        $test = false; 
                    
                }

                if($test)
                    return 1;
                else
                    return 3;
            }
            else
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
        $url .= "RewriteRule ^" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&id=$2 [NC,L]
        RewriteRule ^([a-z]+)/" . __CLASS__ . "/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_" . __CLASS__ . "&task=showDetails&l=$1&id=$3 [NC,L]
        ";
        return $url;
    }

    public function getItems($elements, $lang){
        $items = [];
        foreach($elements as $element){
            $items = $element::findAllByGalerie($lang, $this->id);
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
        $galerie = new galerie();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_galerie AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $galerie = static::build($data);
        }
        return $galerie;
    }

    public static function findAll($langue, $active = false, $limit = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_galerie AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
				
		if($limit){
            $SQLselect .= " LIMIT $limit";
        }

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $galerie = static::build($data);
            array_push($items, $galerie);
        }
        return $items;
    }

    public static function findPhotosName($data)
    {
        global $db;
        $photos = [];
        if(isset($data['ids']) && !empty($data['ids']))
        {
            $SQLselect = sprintf("SELECT cover FROM " . static::$table . " WHERE id in%s",
                GetSQLValueString($data['ids'], "text")
            );

            $result = $db->queryS($SQLselect);

            foreach($result as $data)
            {
                $photos[] = $data["cover"];
            }
            return $photos;

        }

    }

    public static function build($data){
        $galerie = new galerie();

        $galerie->setId($data['ID']);
        $galerie->setTitre($data['titre']);
        $galerie->setCover($data['cover']);
        $galerie->setActive($data['active']);
        $galerie->setDateAdd($data['date_add']);
        $galerie->setLastEdit($data['last_edit']);
        $galerie->setLangue($data['langue']);
        
        return $galerie;
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
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_galerie in $ids";
            
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) 
            {
                $idsT = explode(",", $ids);
                if(count($idsT) > 1)
                    for($i = 0; $i < count($idsT) - 1; $i++)
                    {
                        if($i == 0)
                            $idsT[0] = explode("(", $idsT[0])[1];

                        if($i == count($idsT) - 1)
                            $idsT[$i] = explode(")", $idsT[$i])[0];

                        $items = galerie_photo::findAllByGalerie($_SESSION['langue'], $idsT[$i]);
                        $test = true;
                        if(count($items) > 0)
                        {
                            foreach($items as $item)
                            {
                                $photo = $item->getCover();
                                if($item->delete() == 1)
                                {
                                    if(file_exists("../../../../images/galerie/" . $photo)){
                                        @unlink("../../../../images/galerie/" . $photo);
                                    }
                                }
                                else
                                    $test = false; 
                            }

                            if($test)
                                return 1;
                            else
                                return 3;
                        }
                        else
                            return 1;
                    }
                else
                {
                    $idsT = explode("(", $ids);
                    $id = explode(")", $idsT[1])[0];
                    $items = galerie_photo::findAllByGalerie($_SESSION['langue'], $id);
                        $test = true;
                        if(count($items) > 0)
                        {
                            foreach($items as $item)
                            {
                                $photo = $item->getCover();
                                if($item->delete() == 1)
                                {
                                    if(file_exists("../../../../images/galerie/" . $photo)){
                                        @unlink("../../../../images/galerie/" . $photo);
                                    }
                                }
                                else
                                    $test = false; 
                            }

                            if($test)
                                return 1;
                            else
                                return 3;
                        }
                        else
                            return 1;
                }
            }
            else
                return 2;
        }
        else
            return 0;
    }

}