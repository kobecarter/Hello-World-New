<?php
class popup {
    private $id = 0;
    private $page;
	private $photo;
    private $actif;
    private $from_date;
    private $to_date;
	private $size;
	private $btn_text;
	private $btn_link;
    private $date_add;
    private $last_edit;
    private $titre;
    private $extrait;
    private $description;
    private $langue;

    public function __construct($id, $db, $lang = 'en') {

        $SQLselect = "SELECT A.*, B.* FROM ".__prefixe_db__."popup A
					  LEFT JOIN ".__prefixe_db__."details_popup B ON A.id = B.id_popup AND langue = '$lang'
					  WHERE A.id = $id";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->page = $data['page'];
			$this->photo = $data['photo'];
            $this->actif = $data['actif'];
            $this->from_date = $data['from_date'];
            $this->to_date = $data['to_date'];
			$this->size = $data['size'];
			$this->btn_text = $data['btn_text'];
			$this->btn_link = $data['btn_link'];
            $this->date_add = $data['date_add'];
            $this->last_edit = $data['last_edit'];
            $this->titre = $data['titre'];
            $this->extrait = $data['extrait'];
            $this->description = $data['description'];
            $this->langue = $data['langue'];
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getPhoto(){
        return $this->photo;
    }
	
	public function getPage(){
        return $this->page;
    }

    public function isActif(){
        return ($this->actif == 1) ? true : false ;
    }
	
    public function getTitre(){
        return $this->titre;
    }

    public function getExtrait(){
        return $this->extrait;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getFromDate(){
        return $this->from_date;
    }

    public function getToDate(){
        return $this->to_date;
    }
	
	public function getSize(){
        return $this->size;
    }
	
	public function getBtnText(){
        return $this->btn_text;
    }
	
	public function getBtnLink(){
        return $this->btn_link;
    }
	
    public function getDateAdd(){
        return $this->date_add;
    }
	
	public function hasPage($page){
		$state = false;
        $pages = unserialize($this->page);
		foreach($pages as $id_page){
			if($id_page == $page) $state = true;
		}
		return $state;
    }

    public static function findAll()
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "popup WHERE actif = 1 ORDER BY date_add DESC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }

    public static function findAllLast($limit = null)
    {
        global $db;
        $limit_clause = $limit ? " LIMIT $limit" : "";
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "popup WHERE actif = 1 ORDER BY date_add DESC $limit_clause";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }
	
	public static function getPopup()
    {
        global $db;
        $ids = array();
		$now = date('Y-m-d');
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "popup WHERE actif = 1 AND (NOW() BETWEEN from_date AND to_date)";
		//echo $SQLselect;
        $result = $db->queryS($SQLselect);
        foreach ($result as $data){
			$p = new popup($data['id'],$db,$_SESSION['lang']);
            array_push($ids, $p);
        }
		
        return $ids;
    }
}
?>