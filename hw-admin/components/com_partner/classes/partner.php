<?php
class partner
{
	
    static $table =  __prefixe_db__ . "partner";
    static $table2 =  __prefixe_db__ . "details_partner";

    private $id;
    private $photo;
    private $url;
    private $titre;
    private $ordre;
    private $actif;
    private $langue;

    public function __construct($id, $db, $lang = 'fr')
    {

        $SQLselect = "SELECT A.*, B.* FROM " . static::$table . " A
					  LEFT JOIN " . static::$table2 . " B ON A.id = B.id_partner AND langue = '$lang'
					  WHERE A.id = $id";

        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->photo = $data['photo'];
            $this->url = $data['url'];
            $this->titre = $data['titre'];
            $this->ordre = $data['ordre'];
            $this->actif = $data['actif'];
            $this->langue = $data['langue'];
        }
    }

    public function __destruct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getPhoto()
    {
        return $this->photo;
    }
    
    public function getUrl()
    {
        return $this->url;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function isActif()
    {
        return $this->actif == 1 ? true : false;
    }

    public static function findAll($actif = false, $limit = false)
    {
        global $db;
		$claus = "";
		if($actif) $claus .= " AND actif = 1";
        $ids = array();
        $SQLselect = "SELECT id FROM " . static::$table . " WHERE 1 = 1 $claus ORDER BY ordre ASC";

        if($limit){
            $SQLselect .= " LIMIT $limit";
        }

        //echo $SQLselect;
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }

    public static function build($data){
        $partner = new partner();

        $partner->setId($data['ID']);
        $partner->setPhoto($data['photo']);
        $partner->setURL($data['url']);
        $partner->setTitre($data['titre']);
        $partner->setOrdre($data['ordre']);
        $partner->setActive($data['actif']);
        $partner->setLangue($data['langue']);
        
        return $partner;
    }

}
?>