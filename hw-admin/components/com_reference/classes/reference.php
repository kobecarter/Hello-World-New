<?php

class reference
{
    static $table =  __prefixe_db__ . "reference";
    static $table2 =  __prefixe_db__ . "details_reference";
    static $table4 =  __prefixe_db__ . "details_reference_item";

    private $id;
	private $nom_client;
    private $secteur;
    private $duree;
    private $services;
    private $photo;
    private $logo;
    private $active;
    private $extrait;
    private $description;
    private $secteur_activite;
    private $historique_collaboration;
    private $resultat;
    private $site_web;
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

    public function getNomClient()
    {
        return $this->nom_client;
    }

    public function getTitre()
    {
        return $this->nom_client;
    }

    public function getSecteur()
    {
        return $this->secteur;
    }

    public function getDuree()
    {
        return $this->duree;
    }

    public function getService()
    {
        return $this->services;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function isActive()
    {
        return $this->active ? 1 : 0;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getExtrait()
    {
        return $this->extrait;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getSecteurActivite()
    {
        return $this->secteur_activite;
    }

    public function getHistoriqueCollaboration()
    {
        return $this->historique_collaboration;
    }

    public function getResultat()
    {
        return $this->resultat;
    }

    public function getSiteWeb()
    {
        return $this->site_web;
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

    public function setNomClient($nom_client)
    {
        $this->nom_client = $nom_client;
    }

    public function setSecteur($secteur)
    {
        $this->secteur = $secteur;
    }

    public function setDuree($duree)
    {
        $this->duree = $duree;
    }

    public function setServices($services)
    {
        $this->services = $services;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function setExtrait($extrait)
    {
        $this->extrait = $extrait;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setSecteurActivite($secteur_activite)
    {
        $this->secteur_activite = $secteur_activite;
    }

    public function setHistoriqueCollaboration($historique_collaboration)
    {
        $this->historique_collaboration = $historique_collaboration;
    }

    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }

    public function setSiteWeb($site_web)
    {
        $this->site_web = $site_web;
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

        $SQLinsert = sprintf("INSERT INTO " . static::$table . " (photo, logo, active, date_add, last_edit) VALUES (%s, %s, %s, %s, %s)",
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->logo, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );

        if (!$db->query($SQLinsert)) {
            $id_reference = $db->last_id();
            $SQLinsert2 = sprintf("INSERT INTO " . static::$table2 . " (id_reference, nom_client, secteur, duree, services, extrait, description, secteur_activite, historique_collaboration, resultat, site_web, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id_reference, "int"),
                GetSQLValueString($this->nom_client, "text"),
                GetSQLValueString($this->secteur, "text"),
                GetSQLValueString($this->duree, "text"),
                GetSQLValueString($this->services, "text"),
                GetSQLValueString($this->extrait, "text"),
                GetSQLValueString($this->description, "text"),
                GetSQLValueString($this->secteur_activite, "text"),
                GetSQLValueString($this->historique_collaboration, "text"),
                GetSQLValueString($this->resultat, "text"),
                GetSQLValueString($this->site_web, "text"),
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
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET  photo = %s, logo = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->logo, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );

        if (!$db->query($SQLupdate)) {
            $SQLselect = sprintf("SELECT * FROM " . static::$table2 . " WHERE id_reference = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );

            $result = $db->query($SQLselect);
            if ($db->num_rows($result) == 0) {
                $SQLupdate = printf("INSERT INTO " . static::$table2 . " (id_reference, nom_client, secteur, duree, services, extrait, description, secteur_activite, historique_collaboration, resultat, site_web, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->nom_client, "text"),
                    GetSQLValueString($this->secteur, "text"),
                    GetSQLValueString($this->duree, "text"),
                    GetSQLValueString($this->services, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->secteur_activite, "text"),
                    GetSQLValueString($this->historique_collaboration, "text"),
                    GetSQLValueString($this->resultat, "text"),
                    GetSQLValueString($this->site_web, "text"),
                    GetSQLValueString($this->langue, "text")
                );
                
            } else {
                $SQLupdate = sprintf("UPDATE " . static::$table2 . " SET nom_client = %s, secteur = %s, duree = %s, services = %s, extrait = %s, description = %s, secteur_activite = %s, historique_collaboration = %s, resultat = %s, site_web = %s WHERE id_reference = %s AND langue = %s",
                    GetSQLValueString($this->nom_client, "text"),
                    GetSQLValueString($this->secteur, "text"),
                    GetSQLValueString($this->duree, "text"),
                    GetSQLValueString($this->services, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->description, "text"),
                    GetSQLValueString($this->secteur_activite, "text"),
                    GetSQLValueString($this->historique_collaboration, "text"),
                    GetSQLValueString($this->resultat, "text"),
                    GetSQLValueString($this->site_web, "text"),
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

        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_reference = %s",
            GetSQLValueString($this->id, "int")
        );
        
        
        if(!$db->query($SQLdelete) && !$db->query($SQLdelete2))
        {
            $items = reference_item::findAllByReference($_SESSION['langue'], $this->id);
            $test = true;
            if(count($items) > 0)
            {
                foreach($items as $item)
                {
                    $photo = $item->getPhoto();
                    $pdf = $item->getPDF();
                    if($item->delete() == 1)
                    {
                        if(file_exists("../../../../images/references/" . $photo)){
                            @unlink("../../../../images/references/" . $photo);
                        }

                        if(file_exists("../../../../images/references/" . $pdf)){
                            @unlink("../../../../images/references/" . $pdf);
                        }
                    }
                    else
                        $test = false; 
                    
                }

                if($test)
                    return 1;
                else
                    return 3;
            }
            else
                return 1;
        } else {
            return 0;
        }
    }

    public function enable()
    {
        global $db;
        $SQLupdate = sprintf("UPDATE " . static::$table . " SET active = %s WHERE id = %s",
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->id, "int")
        );

        if(!$db->query($SQLupdate)){
            return 1;
        } else {
            return 0;
        }
    }

    public function getLink(){
        global $siteURL;
        if ($this->nom_client != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . __CLASS__ . "/" . url_rewriting($this->nom_client) . "/" . $this->id . "/";
            } else {
                return $siteURL . $this->langue . "/" . __CLASS__ . "/" . url_rewriting($this->nom_client) . "/" . $this->id . "/";
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

    public function getItems($elements, $lang){
        $items = [];
        foreach($elements as $element){
            $items = $element::findAllByReference($lang, $this->id);
            if(count($items)){
                array_push($items, $element);
                break;
            }
        }
        return $items;
    }

    public function getNext()
    {
        global $db;
        $reference = new reference();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference AND langue = %s 
        WHERE active = 1 AND A.id > %s ORDER BY A.id ASC LIMIT 0,1",
            GetSQLValueString($this->langue, "text"),
            GetSQLValueString($this->id, "int")
        );

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $reference = static::build($data);
        }
        return $reference;
    }

    public static function find($id, $langue)
    {
        global $db;
        $reference = new reference();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference AND langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            $reference = static::build($data);
        }
        return $reference;
    }

    public static function findAll($langue, $active = false, $limit = false, $order = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
		
		if($order){
            $SQLselect .= " ORDER BY id_reference DESC";
        }
		
		if($limit){
            $SQLselect .= " LIMIT $limit";
        }

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $reference = static::build($data);
            array_push($items, $reference);
        }
        return $items;
    }
        public static function findAllByIds($langue, $active = false, $limit = false, $order = false, $ids = false)
{
    global $db;
    $items = array();
    
    $SQLselect = sprintf(
        "SELECT A.id as ID, A.*, B.* 
        FROM " . static::$table . " A 
        LEFT JOIN " . static::$table2 . " B 
        ON A.id = B.id_reference AND langue = %s 
        WHERE 1 = 1",
        GetSQLValueString($langue, "text")
    );

    // Filtre par active
    if ($active) {
        $SQLselect .= " AND A.active = 1";
    }

    // Filtre par IDs spécifiques
    if ($ids && is_array($ids)) {
        $idsList = implode(',', array_map('intval', $ids)); // Sécurise les IDs
        $SQLselect .= " AND A.id IN ($idsList)";
    }

    // Tri
    if ($order) {
        $SQLselect .= " ORDER BY date_add DESC";
    }

    // Limite
    if ($limit) {
        $SQLselect .= " LIMIT " . intval($limit);
    }

    $result = $db->queryS($SQLselect);
    foreach ($result as $data) {
        $reference = static::build($data);
        array_push($items, $reference);
    }
    return $items;
}
    public static function findAllRand($langue, $active = false, $limit = false, $order = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf("SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_reference AND langue = %s WHERE 1 = 1",
            GetSQLValueString($langue, "text")
        );
        if($active){
            $SQLselect .= " AND active = 1";
        }
		
		if($order){
            $SQLselect .= " ORDER BY RAND()";
        }
		
		if($limit){
            $SQLselect .= " LIMIT $limit";
        }

        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            $reference = static::build($data);
            array_push($items, $reference);
        }
        return $items;
    }
	
	public static function getServices(){
		$services = array(1 => 'website', 2 => 'mobile', 3 => 'shooting', 4 => 'print', 5 => 'video');
		return $services;
	}

    public static function findPhotosName($data)
    {
        global $db;
        $photos = [];
        if(isset($data['ids']) && !empty($data['ids']))
        {
            $SQLselect = sprintf("SELECT photo, logo FROM " . static::$table . " WHERE id in%s",
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

    public static function build($data){
        $reference = new reference();

        $reference->setId($data['ID']);
        $reference->setNomClient($data['nom_client']);
        $reference->setSecteur($data['secteur']);
        $reference->setDuree($data['duree']);
        $reference->setServices($data['services']);
        $reference->setPhoto($data['photo']);
        $reference->setLogo($data['logo']);
        $reference->setActive($data['active']);
        $reference->setExtrait($data['extrait']);
        $reference->setDescription($data['description']);
        $reference->setSecteurActivite($data['secteur_activite']);
        $reference->setHistoriqueCollaboration($data['historique_collaboration']);
        $reference->setResultat($data['resultat']);
        $reference->setSiteWeb($data['site_web']);
        $reference->setDateAdd($data['date_add']);
        $reference->setLastEdit($data['last_edit']);
        $reference->setLangue($data['langue']);
        
        return $reference;
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
            {
                return 1;
            }else
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
            $SQLdelete2 = "DELETE FROM ". static::$table2 ." WHERE id_reference in $ids";
            
            if(!$db->query($SQLdelete) && !$db->query($SQLdelete2)) 
            {
                $idsT = explode(",", $ids);
                if(count($idsT) > 1)
                    for($i = 0; $i < count($idsT) - 1; $i++)
                    {
                        if($i == 0)
                            $idsT[0] = explode("(", $idsT[0])[1];

                        if($i == count($idsT) - 1)
                            $idsT[$i] = explode(")", $idsT[$i])[0];

                        $items = reference_item::findAllByReference($_SESSION['langue'], $idsT[$i]);
                        $test = true;
                        if(count($items) > 0)
                        {
                            foreach($items as $item)
                            {
                                $photo = $item->getPhoto();
                                $pdf = $item->getPDF();
                                if($item->delete() == 1)
                                {
                                    if(file_exists("../../../../images/references/" . $photo)){
                                        @unlink("../../../../images/references/" . $photo);
                                    }
                                    if(file_exists("../../../../images/references/" . $pdf)){
                                        @unlink("../../../../images/references/" . $pdf);
                                    }
                                }
                                else
                                    $test = false; 
                            }

                            if($test)
                                return 1;
                            else
                                return 3;
                        }
                        else
                            return 1;
                    }
                else
                {
                    $idsT = explode("(", $ids);
                    $id = explode(")", $idsT[1])[0];
                    $items = reference_item::findAllByReference($_SESSION['langue'], $id);
                        $test = true;
                        if(count($items) > 0)
                        {
                            foreach($items as $item)
                            {
                                $photo = $item->getPhoto();
                                $pdf = $item->getPDF();
                                if($item->delete() == 1)
                                {
                                    if(file_exists("../../../../images/references/" . $photo)){
                                        @unlink("../../../../images/references/" . $photo);
                                    }
                                    if(file_exists("../../../../images/references/" . $pdf)){
                                        @unlink("../../../../images/references/" . $pdf);
                                    }
                                }
                                else
                                    $test = false; 
                            }

                            if($test)
                                return 1;
                            else
                                return 3;
                        }
                        else
                            return 1;
                }
            }
            else
                return 2;
        }
        else
            return 0;
    }

}