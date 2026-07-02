<?php
class payment
{
    static $table =  __prefixe_db__ . "payment";
	static $table2 =  __prefixe_db__ . "facture";

    private $id;
    private $facture;
    private $montant;
    private $date_payment;
    private $methode_payment;
    private $detail;
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

    public function getFacture()
    {
        return $this->facture;
    }

    public function getMontant()
    {
        return $this->montant;
    }

    public function getDatePayment()
    {
        return $this->date_payment;
    }

    public function getMethodePayment()
    {
        return $this->methode_payment;
    }
	
	public function getDetail()
    {
        return $this->detail;
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

    public function setFacture($facture)
    {
        $this->facture = $facture;
    }

    public function setMontant($montant)
    {
        $this->montant = $montant;
    }

    public function setDatePayment($date_payment)
    {
        $this->date_payment = $date_payment;
    }

    public function setMethodePayment($methode_payment)
    {
        $this->methode_payment = $methode_payment;
    }
	
	public function setDetail($detail)
    {
        $this->detail = $detail;
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
        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_facture, montant, date_payment, methode_payment, detail, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->facture->getId(), "int"),
            GetSQLValueString($this->montant, "double"),
			GetSQLValueString($this->date_payment, "date"),
            GetSQLValueString($this->methode_payment, "text"),
			GetSQLValueString($this->detail, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  id_facture = %s, montant = %s, date_payment = %s, methode_payment = %s, detail = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->facture->getId(), "int"),
            GetSQLValueString($this->montant, "double"),
			GetSQLValueString($this->date_payment, "date"),
            GetSQLValueString($this->methode_payment, "text"),
			GetSQLValueString($this->detail, "text"),
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
        if(!$db->query($SQLdelete)){
            return 1;
        } else {
            return 0;
        }
    }

    public static function find($id)
    {
        global $db;
        $payment = new payment();
        $SQLselect = sprintf("SELECT * FROM " . static::$table . " WHERE id = %s",
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $payment = static::build($data);
        }
        return $payment;
    }

    public static function findAll($id_facture = null, $ordre = false)
    {
        global $db;
        $items = array();
        $SQLselect = "SELECT * FROM " . static::$table . " WHERE 1 = 1";
		
        if($id_facture){
            $SQLselect .= " AND id_facture = $id_facture";
        }
		
		if($ordre){
            $SQLselect .= " ORDER BY date_payment DESC";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $payment = static::build($data);
            array_push($items, $payment);
        }
        return $items;
    }
			
    public static function build($data){
        $payment = new payment();
        $payment->setId($data['id']);
        $payment->setFacture(facture::find($data['id_facture']));
        $payment->setMontant($data['montant']);
        $payment->setDatePayment($data['date_payment']);
        $payment->setMethodePayment($data['methode_payment']);
		$payment->setDetail($data['detail']);
        $payment->setDateAdd($data['date_add']);
		$payment->setLastEdit($data['last_edit']);
        return $payment;
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
	
	public static function total($year = false, $month = false, $devise = 'DH'){
        global $db;
        $SQLcount = "SELECT SUM(montant) as c FROM " . static::$table . " A JOIN " . static::$table2 . " B ON A.id_facture = B.id
		WHERE devise = '$devise'";
		
		if($year){
			$SQLcount .= " AND YEAR(date_facture) = $year";
		}
		
		if($month){
			$SQLcount .= " AND MONTH(date_facture) = $month";
		}
		
        $result = $db->query($SQLcount);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return intval($data["c"]);
        }
        return 0;
    }
}