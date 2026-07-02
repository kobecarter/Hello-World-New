<?php

class reclamation
{
    static $table =  __prefixe_db__ . "reclamation";

    private $id;
    private $client;
    private $departement;
	private $message;
    private $date_add;

    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getDepartement()
    {
        return $this->departement;
    }
	
	public function getMessage()
    {
        return $this->message;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }
	

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }
	
	public function setMessage($message)
    {
        $this->message = $message;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function add()
    {
        global $db;
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_client, departement, message, date_add) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($this->client->getId(), "int"),
            GetSQLValueString($this->departement, "text"),
			GetSQLValueString($this->message, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET id_client = %s, departement = %s, message = %s WHERE id = %s",
            GetSQLValueString($this->client->getId(), "int"),
            GetSQLValueString($this->departement, "text"),
			GetSQLValueString($this->message, "text"),
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
        $reclamation = new reclamation();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $reclamation = static::build($data);
        }
        return $reclamation;
    }

    public static function findAll($client = false)
    {
        global $db;
        $items = array();
        $SQLselect = "SELECT * FROM " . static::$table;
        if($client){
            $SQLselect .= " WHERE id_client = $client";
        }
		
		$SQLselect .= " ORDER BY date_add DESC, id DESC";
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $reclamation = static::build($data);
            array_push($items, $reclamation);
        }
        return $items;
    }

    public static function build($data){
        $reclamation = new reclamation();
        $reclamation->setId($data['id']);
        $reclamation->setClient(client::find($data['id_client']));
        $reclamation->setDepartement($data['departement']);
		$reclamation->setMessage($data['message']);
        $reclamation->setDateAdd($data['date_add']);
        return $reclamation;
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