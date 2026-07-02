<?php
class tool
{
	
    static $table =  __prefixe_db__ . "tool";
    static $table2 =  __prefixe_db__ . "details_tool";

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
					  LEFT JOIN " . static::$table2 . " B ON A.id = B.id_tool AND langue = '$lang'
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

    public static function findAll($actif = false)
    {
        global $db;
		$claus = "";
		if($actif) $claus .= " AND actif = 1";
        $ids = array();
        $SQLselect = "SELECT id FROM " . static::$table . " WHERE 1 = 1 $claus ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }

}
?>