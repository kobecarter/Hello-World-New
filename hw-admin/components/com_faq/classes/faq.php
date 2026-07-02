<?php

class faq
{
    static $table =  __prefixe_db__ . "faq";
    static $table2 =  __prefixe_db__ . "details_faq";

    private $id;
    private $service;
    private $titre;
    private $texte;
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

    public function getTitre()
    {
        return $this->titre;
    }
    
    public function getTexte()
    {
        return $this->texte;
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

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }


    public function setTexte($texte)
    {
        $this->texte = $texte;
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

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_service, active, date_add, last_edit) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) 
        {
            $id_faq = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_faq, titre, texte, langue) VALUES (%s, %s, %s, %s)",
                GetSQLValueString($id_faq, "int"),
                GetSQLValueString($this->titre, "text"),
                GetSQLValueString($this->texte, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET id_service = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->last_edit, "date"), 
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_faq = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );
            
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_faq, titre, texte, langue) VALUES (%s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, texte = %s WHERE id_faq = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->texte, "text"),
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
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_faq = %s",
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

    public static function find($id, $langue)
    {
        global $db;
        $faq = new faq();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_faq AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $faq = static::build($data);
        }
        return $faq;
    }

    public static function findAll($langue, $active = false, $service = false, $limit = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_faq AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
        if($service){
            $SQLselect .= " AND id_service = $service";
        }
				
		$SQLselect .= " ORDER BY id_faq ASC";
		
		if($limit){
            $SQLselect .= " LIMIT $limit";
        }
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $faq = static::build($data);
            array_push($items, $faq);
        }
        return $items;
    }
        public static function findSimilar($service, $active, $langue, $limit = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_faq AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if ($active) {
            $SQLselect .= " AND active = 1";
        }
        if ($service) {
            $SQLselect .= " AND id_service = $service";
        }

        $SQLselect .= " ORDER BY date_add DESC";

        if ($limit) {
            $SQLselect .= " LIMIT $limit";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $faq = static::build($data);
            array_push($items, $faq);
        }
        return $items;
    }
	
    public static function build($data){
        global $db;
        $faq = new faq();
        
        $faq->setId($data['ID']);
        $faq->setService(service::find($data['id_service'],$data['langue']));
        $faq->setActive($data['active']);
        $faq->setTitre($data['titre']);
        $faq->setTexte($data['texte']);
        $faq->setDateAdd($data['date_add']);
        $faq->setLastEdit($data['last_edit']);
        $faq->setLangue($data['langue']);
        return $faq;
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
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_faq in $ids";
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
                //seo();
                return 1;
            }else
                return 2;
        }
        else
            return 0;
    }

    public static function getSeo(){
        //
    }

    public static function getLink(){
        //
    }

}