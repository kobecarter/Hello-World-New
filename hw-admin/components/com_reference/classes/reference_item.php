<?php

class reference_item
{
    static $table =  __prefixe_db__ . "reference_item";
    static $table2 =  __prefixe_db__ . "details_reference_item";

    private $id;
    private $reference;
    private $service;
    private $galerie;
    private $video;
    private $photo;
    private $pdf;
    private $ordre;
    private $titre;
	private $soustitre;
    private $description;
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

    public function getReference()
    {
        return $this->reference;
    }

    public function getService()
    {
        return $this->service;
    }

    public function getGalerie()
    {
        return $this->galerie;
    }

    public function getVideo()
    {
        return $this->video;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getPDF()
    {
        return $this->pdf;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function getTitre()
    {
        return $this->titre;
    }
	
	public function getSousTitre()
    {
        return $this->soustitre;
    }

    public function getDescription()
    {
        return $this->description;
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

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setService($service)
    {
        $this->service = $service;
    }

    public function setGalerie($galerie)
    {
        $this->galerie = $galerie;
    }

    public function setVideo($video)
    {
        $this->video = $video;
    }
    
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setPDF($pdf)
    {
        $this->pdf = $pdf;
    }

    public function setOrdre($ordre)
    {
        $this->ordre = $ordre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
	
	public function setSousTitre($soustitre)
    {
        $this->soustitre = $soustitre;
    }

    public function setDescription($description)
    {
        $this->description = $description;
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

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (id_reference, service, id_galerie, id_video, photo, pdf, ordre, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->reference->getId(), "int"),
            GetSQLValueString($this->service, "text"),
            GetSQLValueString($this->galerie->getId(), "int"),
            GetSQLValueString($this->video->getId(), "int"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->pdf, "text"),
            GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) {
            $id_reference_item = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_reference_item, titre, soustitre, description, langue) VALUES (%s, %s, %s, %s, %s)",
                GetSQLValueString($id_reference_item, "int"),
                GetSQLValueString($this->titre, "text"),
				GetSQLValueString($this->soustitre, "text"),				  
                GetSQLValueString($this->description, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  id_reference = %s, service = %s, id_galerie = %s, id_video = %s, photo = %s, pdf = %s, ordre = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->reference->getId(), "int"),
            GetSQLValueString($this->service, "text"),
            GetSQLValueString($this->galerie->getId(), "int"),
            GetSQLValueString($this->video->getId(), "int"),
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->pdf, "text"),
            GetSQLValueString($this->ordre, "int"),
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );

        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_reference_item = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );

            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . static::$table2 . " (id_reference_item, titre, soustitre, description, langue) VALUES (%s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
					GetSQLValueString($this->soustitre, "text"),				 
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET titre = %s, soustitre = %s, description = %s WHERE id_reference_item = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->soustitre, "text"),
					GetSQLValueString($this->description, "text"),
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

        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_reference_item = %s",
            GetSQLValueString($this->id, "int")
        );

        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)){
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

    public static function find($id, $langue)
    {
        global $db;
        $reference_item = new reference_item();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference_item AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );

        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $reference_item = static::build($data);
        }
        return $reference_item;
    }

    public static function findAll($langue)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference_item AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $reference_item = static::build($data);
            array_push($items, $reference_item);
        }
        return $items;
    }

    public static function findPhotosName($data)
    {
        global $db;
        $photos = [];
        if(isset($data['ids']) && !empty($data['ids']))
        {
            $SQLselect = sprintf("SELECT photo, pdf FROM " . static::$table . " WHERE id in%s",
                GetSQLValueString($data['ids'], "text")
            );

            $result = $db->queryS($SQLselect);

            foreach($result as $data)
            {
                $photos[] = $data["photo"];
                $photos[] = $data["logo"];
            }
            return $photos;

        }

    }

    public static function findAllByReference($lang, $id, $order = false)
    {
        global $db;
        $items = array();

        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference_item AND langue = %s WHERE id_reference = %s",
            GetSQLValueString($lang, "text"),
            GetSQLValueString($id, "int")
        );
		
		if($order) $SQLselect .= " ".$order;
		
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $reference_item = static::build($data);
            array_push($items, $reference_item);
        }
        
        return $items;
    }

    public static function build($data){
        $reference_item = new reference_item();

        $reference_item->setId($data['ID']);
        $reference_item->setReference(reference::find($data['id_reference'], $data['langue']));
        $reference_item->setService($data['service']);
        $reference_item->setGalerie(galerie::find($data['id_galerie'], $data['langue']));
        $reference_item->setVideo(video::find($data['id_video'], $data['langue']));
        $reference_item->setPhoto($data['photo']);
        $reference_item->setPDF($data['pdf']);
        $reference_item->setOrdre($data['ordre']);
        $reference_item->setTitre($data['titre']);
		$reference_item->setSousTitre($data['soustitre']);
        $reference_item->setDescription($data['description']);
        $reference_item->setDateAdd($data['date_add']);
        $reference_item->setLastEdit($data['last_edit']);
        $reference_item->setLangue($data['langue']);

        return $reference_item;
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
    
    public static function deleteMultiple($data){
        
        global $db;	
        if(isset($data['ids']) && !empty($data['ids'])){
            extract($data);
            $SQLdelete = "DELETE FROM ". static::$table ." WHERE id in $ids";
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_reference_item in $ids";
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
                return 1;
            }else
                return 2;
        }
        else
            return 0;
    }

}