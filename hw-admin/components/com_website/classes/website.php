<?php

class website
{
    static $table =  __prefixe_db__ . "website";

    private $id;
    private $titre;
    private $url;
	private $capture;
	private $active;
	private $date_creation;
    private $date_add;

    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getURL()
    {
        return $this->url;
    }
	
	public function getCapture()
    {
        return $this->capture;
    }
	
	public function getActive()
    {
        return $this->active;
    }
	
	public function isActive()
    {
        return $this->active == 1 ? true : false;
    }
	
	public function getDateCreation()
    {
        return $this->date_creation;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }
	

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function setURL($url)
    {
        $this->url = $url;
    }
	
	public function setCapture($capture)
    {
        $this->capture = $capture;
    }
	
	public function setActive($active)
    {
        $this->active = $active;
    }
	
	public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function add()
    {
        global $db;
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (titre, url, capture, active, date_creation, date_add) VALUES (%s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->titre, "text"),
            GetSQLValueString($this->url, "text"),
			GetSQLValueString($this->capture, "text"),
			GetSQLValueString($this->active, "text"),				 
			GetSQLValueString($this->date_creation, "date"),
            GetSQLValueString($this->date_add, "date")
        );
        if (!$db->query($SQLinsert)) {
           return 1;
        } else {
            return 0;
        }
    }

    public function edit()
    {
        global $db;
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET titre = %s, url = %s, capture = %s, active = %s, date_creation = %s, date_add = %s WHERE id = %s",
            GetSQLValueString($this->titre, "text"),
            GetSQLValueString($this->url, "text"),
			GetSQLValueString($this->capture, "text"),
			GetSQLValueString($this->active, "text"),				 
			GetSQLValueString($this->date_creation, "date"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            return 1;
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
        if(!$db->query($SQLdelete)){
            return 1;
        } else {
            return 0;
        }
    }

    public static function find($id)
    {
        global $db;
        $website = new website();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $website = static::build($data);
        }
        return $website;
    }

    public static function findAll($active = false)
    {
        global $db;
        $items = array();
        $SQLselect = "SELECT * FROM " . static::$table;
        if($active){
            $SQLselect .= " WHERE active = 1";
        }
		
		$SQLselect .= " ORDER BY date_add DESC, id DESC";
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $website = static::build($data);
            array_push($items, $website);
        }
        return $items;
    }

    public static function build($data){
        $website = new website();
        $website->setId($data['id']);
        $website->setTitre($data['titre']);
		$website->setURL($data['url']);
		$website->setCapture($data['capture']);
		$website->setActive($data['active']);
        $website->setDateCreation($data['date_creation']);
		$website->setDateAdd($data['date_add']);
        return $website;
    }

    public static function getLastId(){
        global $db;
        return $db->last_id();
    }

    public static function count($year = false){
        global $db;
        $SQLcount = "SELECT count(id) as c FROM " . static::$table;
		
		if($year){
			$SQLcount .= " WHERE YEAR(date_add) = $year";
		}
		
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }	
}