<?php

class facture
{
    static $table =  __prefixe_db__ . "facture";
    static $table2 =  __prefixe_db__ . "item_facture";
	static $table3 =  __prefixe_db__ . "payment";

    private $id;
    private $numero;
    private $client;
    private $date_facture;
    private $total;
    private $statu;
	private $devise;
	private $discount;
	private $discount_val;
    private $date_add;
	private $last_edit;

    public function __construct()
    {
        $this->id = 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function getClient()
    {
        return $this->client;
    }

    public function getDateFacture()
    {
        return $this->date_facture;
    }

    public function getTotal()
    {
        return $this->total;
    }
	
	public function getStatu()
    {
        return $this->statu;
    }
	
	public function getDevise()
    {
        return $this->devise;
    }
	
	public function getDiscount()
    {
        return $this->discount;
    }
	
	public function getDiscountVal()
    {
        return $this->discount_val;
    }

    public function getDateAdd()
    {
        return $this->date_add;
    }

    public function getLastEdit()
    {
        return $this->last_edit;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    public function setClient($client)
    {
        $this->client = $client;
    }

    public function setDateFacture($date_facture)
    {
        $this->date_facture = $date_facture;
    }

    public function setTotal($total)
    {
        $this->total = $total;
    }
	
	public function setStatu($statu)
    {
        $this->statu = $statu;
    }
	
	public function setDevise($devise)
    {
        $this->devise = $devise;
    }
	
	public function setDiscount($discount)
    {
        $this->discount = $discount;
    }
	
	public function setDiscountVal($discount_val)
    {
        $this->discount_val = $discount_val;
    }

    public function setDateAdd($date_add)
    {
        $this->date_add = $date_add;
    }

    public function setLastEdit($last_edit)
    {
        $this->last_edit = $last_edit;
    }

    public function add()
    {
        global $db;
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (numero, id_client, date_facture, total, statu, devise, discount, discount_val, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->numero, "text"),
            GetSQLValueString($this->client->getId(), "int"),
            GetSQLValueString($this->date_facture, "date"),
			GetSQLValueString($this->total, "double"),
            GetSQLValueString($this->statu, "int"),
			GetSQLValueString($this->devise, "text"),
			GetSQLValueString($this->discount, "text"),
			GetSQLValueString($this->discount_val, "double"),				 
            GetSQLValueString($this->date_add, "date"),				 
            GetSQLValueString($this->last_edit, "date")
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  numero = %s, id_client = %s, date_facture = %s, total = %s, statu = %s, devise = %s, discount = %s, discount_val = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->numero, "text"),
            GetSQLValueString($this->client->getId(), "int"),
            GetSQLValueString($this->date_facture, "date"),
			GetSQLValueString($this->total, "double"),
            GetSQLValueString($this->statu, "int"),
			GetSQLValueString($this->devise, "text"),
			GetSQLValueString($this->discount, "text"),
			GetSQLValueString($this->discount_val, "double"),				 
            GetSQLValueString($this->last_edit, "date"),
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
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_facture = %s",
            GetSQLValueString($this->getId(), "int")
        );
        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){
            return 1;
        } else {
            return 0;
        }
    }

    public static function find($id)
    {
        global $db;
        $facture = new facture();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $facture = static::build($data);
        }
        return $facture;
    }

    public static function findAll($statu = false, $client = false, $ordre = false, $limit = false)
    {
        global $db;
        $items = array();
        $SQLselect = "SELECT * FROM " . static::$table . " WHERE 1 = 1";
		
        if($statu){
            $SQLselect .= " AND statu = $statu";
        }
		if($client){
            $SQLselect .= " AND id_client = $client";
        }
        if($ordre){
            $SQLselect .= " ORDER BY date_facture DESC";
        }
		if($limit){
            $SQLselect .= " LIMIT $limit";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $facture = static::build($data);
            array_push($items, $facture);
        }
        return $items;
    }
	
	public function getItems()
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT id FROM " . static::$table2 . " WHERE id_facture = %s ORDER BY ordre ASC",
            GetSQLValueString($this->id, "int")
        );
        $result = $db->queryS($SQLselect);
		foreach($result as $data){
			$item_facture = item_facture::find($data['id']);	
			array_push($items,$item_facture);
		}
        return $items;
    }
	
	public function getReste()
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT SUM(montant) AS total FROM " . static::$table3 . " WHERE id_facture = %s",
            GetSQLValueString($this->id, "int")
        );
        $result = $db->query($SQLselect);
		$data = $db->fetch_array($result);
		
        return $this->total - $data['total'];
    }
	
	public function checkPayment()
    {        
		if($this->getReste() <= 0)
			$this->statu = 1;
		elseif($this->getReste() < $this->total)
			$this->statu = 2;
		else
			$this->statu = 0;
        
		$this->edit();
    }
	
	public function getTotalItems()
	{
		$items = $this->getItems();
		$total = 0;
		foreach($items as $item){
			$total += $item->getTotal();
		}
		
		// test réduction
		if($this->discount == 'percentage'){
			$total = $total - ($total * $this->discount_val / 100);
		}
		elseif($this->discount == 'amount'){
			$total = $total - $this->discount_val;
		}
		
		// TVA
		$total += $total * 0.2;

		return $total;
	}
	
	public function setTotalItems()
	{
		$items = $this->getItems();
		$total = 0;
		foreach($items as $item){
			$total += $item->getTotal();
		}
		
		// test réduction
		if($this->discount == 'percentage'){
			$total = $total - ($total * $this->discount_val / 100);
		}
		elseif($this->discount == 'amount'){
			$total = $total - $this->discount_val;
		}
		
		// TVA
		$total += $total * 0.2;
		
		$this->total = $total;
	}
	
	public function generateNumero()
	{
		$date = new DateTime($this->date_add);
		$numero = $date->format('Y') . $date->format('m') . str_pad($this->id, 4, '0', STR_PAD_LEFT);
		$this->setNumero($numero);
	}

    public static function build($data){
        $facture = new facture();
        $facture->setId($data['id']);
        $facture->setNumero($data['numero']);
        $facture->setClient(client::find($data['id_client']));
        $facture->setDateFacture($data['date_facture']);
        $facture->setTotal($data['total']);
        $facture->setStatu($data['statu']);
		$facture->setDevise($data['devise']);
		$facture->setDiscount($data['discount']);
		$facture->setDiscountVal($data['discount_val']);
        $facture->setDateAdd($data['date_add']);
		$facture->setLastEdit($data['last_edit']);
        return $facture;
    }

    public static function getLastId(){
        global $db;
        return $db->last_id();
		//155058/139558
    }
	
	public static function getCreance($year = false){
		global $db;
        $items = array();
        $SQLselect = sprintf("SELECT SUM(montant) AS totalpayment FROM " . static::$table3 . " A JOIN " . static::$table . " B ON A.id_facture = B.id");
		if($year){
			$SQLselect .= " WHERE YEAR(date_facture) = $year";
		}
        $result = $db->query($SQLselect);
		$data = $db->fetch_array($result);
		$totalPayment = $data['totalpayment'];
		
		$SQLselect = sprintf("SELECT SUM(total) AS totalfacture FROM " . static::$table);
		if($year){
			$SQLselect .= " WHERE YEAR(date_facture) = $year";
		}
        $result = $db->query($SQLselect);
		$data = $db->fetch_array($result);
		$totalFacture = $data['totalfacture'];
		
        return $totalFacture - $totalPayment;
	}

    public static function count($statu = false, $year = false){
        global $db;
        $SQLcount = "SELECT count(id) as c FROM " . static::$table . " WHERE 1=1";
		
		if($statu){
			if($statu == 3)
				$SQLcount .= " AND statu = NULL";
			else
				$SQLcount .= " AND statu = $statu";
        }
		if($year){
			$SQLcount .= " AND YEAR(date_facture) = $year";
		}
		
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }
	
	public static function total($statu = false, $year = false, $devise = 'DH'){
        global $db;
        $SQLcount = "SELECT SUM(total) as c FROM " . static::$table . " WHERE devise = '$devise'";
		
		if($statu){
			if($statu == 3)
				$SQLcount .= " AND statu = NULL";
			else
				$SQLcount .= " AND statu = $statu";
        }
		if($year){
			$SQLcount .= " AND YEAR(date_facture) = $year";
		}
		
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }

}