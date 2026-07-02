<?php

class item_facture
{
    static $table =  __prefixe_db__ . "item_facture";

    private $id;
    private $facture;
	private $service;
    private $qte;
	private $prix;
    private $total;
    private $unite;
	private $titre;
    private $description;
	private $ordre;


    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFacture()
    {
        return $this->facture;
    }

    public function getService()
    {
        return $this->service;
    }
	
	public function getQte()
    {
        return $this->qte;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function getTotal(){
        return $this->total;
    }
	
	public function getTitre(){
        return $this->titre;
    }
	
	public function getDescription(){
        return $this->description;
    }
	
	public function getUnite(){
        return $this->unite;
    }
	
	public function getOrdre(){
        return $this->ordre;
    }
	
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFacture($facture)
    {
        $this->facture = $facture;
    }

    public function setService($service)
    {
        $this->service = $service;
    }
	
	public function setQte($qte)
    {
        $this->qte = $qte;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
	
	public function setUnite($unite)
    {
        $this->unite = $unite;
    }
	
	public function setTitre($titre)
    {
        $this->titre = $titre;
    }
	
	public function setDescription($description)
    {
        $this->description = $description;
    }
	
	public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function add()
    {
        global $db;
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_facture, id_service, qte, prix, total, unite, titre, description, ordre) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->facture->getId(), "int"),
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->qte, "int"),
            GetSQLValueString($this->prix, "double"),
			GetSQLValueString($this->total, "double"),
			GetSQLValueString($this->unite, "text"),
			GetSQLValueString($this->titre, "text"),
			GetSQLValueString($this->description, "text"),
			GetSQLValueString($this->ordre, "int")
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  id_facture = %s, id_service = %s, qte = %s, prix = %s, total = %s, unite = %s, titre = %s, description = %s, ordre = %s  WHERE id = %s",
            GetSQLValueString($this->facture->getId(), "int"),
            GetSQLValueString($this->service->getId(), "int"),
            GetSQLValueString($this->qte, "int"),
            GetSQLValueString($this->prix, "double"),
			GetSQLValueString($this->total, "double"),
			GetSQLValueString($this->unite, "text"),
			GetSQLValueString($this->titre, "text"),
			GetSQLValueString($this->description, "text"),
			GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->id, "int")
        );
		//echo $SQLupdate;
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
        $item_facture = new item_facture();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $item_facture = static::build($data);
        }
        return $item_facture;
    }

    public static function findAllByFacture($id_facture)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id_facture = %s ORDER BY date_add DESC, id DESC",
            GetSQLValueString($id_client, "int")
        );
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $item = static::build($data);
            array_push($items, $item);
        }
        return $items;
    }

    public static function build($data){
        $item_facture = new item_facture();
        $item_facture->setId($data['id']);
        $item_facture->setFacture(facture::find($data['id_facture']));
        $item_facture->setService(service::find($data['id_service']));
		$item_facture->setQte($data['qte']);
        $item_facture->setPrix($data['prix']);
        $item_facture->setTotal($data['total']);
		$item_facture->setUnite($data['unite']);
		$item_facture->setTitre($data['titre']);
		$item_facture->setDescription($data['description']);
		$item_facture->setOrdre($data['ordre']);
        return $item_facture;
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