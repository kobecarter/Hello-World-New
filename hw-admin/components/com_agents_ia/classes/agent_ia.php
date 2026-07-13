<?php

class agent_ia
{
    static $table  = __prefixe_db__ . "agent_ia";
    static $table2 = __prefixe_db__ . "details_agent_ia";
    static $table3 = __prefixe_db__ . "agent_ia_secteur";

    private $id;
    private $photo;
    private $photo_banniere;
    private $photo_hero;
    private $photo_full_body;
    private $photo_produit;
    private $secteur_ids;   // array of int
    private $h1;
    private $active;
    private $titre;
    private $slug;
    private $sous_titre;
    private $extrait;
    private $texte;
    private $seo_titre;
    private $seo_description;
    private $date_add;
    private $last_edit;
    private $langue;

    public function __construct()
    {
        $this->id          = 0;
        $this->secteur_ids = [];
    }

    public function getId()              { return $this->id; }
    public function getPhoto()           { return $this->photo; }
    public function getPhotoBanniere()   { return $this->photo_banniere; }
    public function getPhotoHero()       { return $this->photo_hero; }
    public function getPhotoFullBody()   { return $this->photo_full_body; }
    public function getPhotoProduit()    { return $this->photo_produit; }
    public function getSecteurIds()      { return $this->secteur_ids ?? []; }
    public function getH1()              { return $this->h1; }
    public function isActive()           { return $this->active ? 1 : 0; }
    public function getActive()          { return $this->active; }
    public function getTitre()           { return $this->titre; }
    public function getSlug()            { return $this->slug; }
    public function getSousTitre()       { return $this->sous_titre; }
    public function getExtrait()         { return $this->extrait; }
    public function getTexte()           { return $this->texte; }
    public function getSeoTitre()        { return $this->seo_titre; }
    public function getSeoDescription()  { return $this->seo_description; }
    public function getDateAdd()         { return $this->date_add; }
    public function getLastEdit()        { return $this->last_edit; }
    public function getLangue()          { return $this->langue; }
    public function getOrdre()           { return $this->ordre; }

    public function setId($id)                    { $this->id = $id; }
    public function setPhoto($photo)              { $this->photo = $photo; }
    public function setPhotoBanniere($pb)         { $this->photo_banniere = $pb; }
    public function setPhotoHero($ph)             { $this->photo_hero = $ph; }
    public function setPhotoFullBody($pfb)        { $this->photo_full_body = $pfb; }
    public function setPhotoProduit($pp)          { $this->photo_produit = $pp; }
    public function setSecteurIds($ids)           { $this->secteur_ids = is_array($ids) ? array_values(array_filter(array_map('intval', $ids))) : []; }
    public function setH1($h1)                    { $this->h1 = $h1; }
    public function setActive($active)            { $this->active = $active; }
    public function setTitre($titre)              { $this->titre = $titre; }
    public function setSlug($slug)                { $this->slug = $slug; }
    public function setSousTitre($sous_titre)     { $this->sous_titre = $sous_titre; }
    public function setExtrait($extrait)          { $this->extrait = $extrait; }
    public function setTexte($texte)              { $this->texte = $texte; }
    public function setSeoTitre($seo_titre)       { $this->seo_titre = $seo_titre; }
    public function setSeoDescription($seo_desc)  { $this->seo_description = $seo_desc; }
    public function setDateAdd($date_add)         { $this->date_add = $date_add; }
    public function setLastEdit($last_edit)       { $this->last_edit = $last_edit; }
    public function setLangue($langue)            { $this->langue = $langue; }
    public function setOrdre($ordre)              { $this->ordre = $ordre; }

    public function getLink()
    {
        global $siteURL;
        if ($this->slug != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . "agent_ia/" . $this->slug . "/";
            } else {
                return $siteURL . $this->getLangue() . "/agent_ia/" . $this->getSlug() . "/";
            }
        }
        return "index.php?option=com_agents_ia&task=showDetails&slug=" . $this->slug;
    }

    public static function getSeo()
    {
        $url  = "RewriteRule ^agent_ia/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_agents_ia&task=showDetails&id=\$2 [NC,L]\n";
        $url .= "        RewriteRule ^([a-z]+)/agent_ia/([a-zA-Z0-9_-]+)/([0-9]+)/$ index.php?option=com_agents_ia&task=showDetails&l=\$1&id=\$3 [NC,L]\n";
        $url .= "        RewriteRule ^agent_ia/([^/]+)/$ index.php?option=com_agents_ia&task=showDetails&slug=\$1 [NC,L]\n";
        $url .= "        RewriteRule ^([a-z]+)/agent_ia/([^/]+)/$ index.php?option=com_agents_ia&task=showDetails&l=\$1&slug=\$2 [NC,L]\n";
        return $url;
    }

    public function add()
    {
        global $db;
        $SQLinsert = sprintf(
            "INSERT INTO " . static::$table . " (photo, photo_banniere, photo_hero, photo_full_body, photo_produit, active, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->photo_banniere, "text"),
            GetSQLValueString($this->photo_hero, "text"),
            GetSQLValueString($this->photo_full_body, "text"),
            GetSQLValueString($this->photo_produit, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->date_add, "date"),
            GetSQLValueString($this->last_edit, "date")
        );
        if (!$db->query($SQLinsert)) {
            $id_agent_ia = $db->last_id();

            // Pivot secteurs
            static::saveSecteurs($id_agent_ia, $this->secteur_ids);

            $SQLinsert2 = sprintf(
                "INSERT INTO " . static::$table2 . " (id_agent_ia, titre, h1, slug, sous_titre, extrait, texte, seo_titre, seo_description, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id_agent_ia, "int"),
                GetSQLValueString($this->titre, "text"),
                GetSQLValueString($this->h1, "text"),
                GetSQLValueString($this->slug, "text"),
                GetSQLValueString($this->sous_titre, "text"),
                GetSQLValueString($this->extrait, "text"),
                GetSQLValueString($this->texte, "text"),
                GetSQLValueString($this->seo_titre, "text"),
                GetSQLValueString($this->seo_description, "text"),
                GetSQLValueString($this->langue, "text")
            );
            if (!$db->query($SQLinsert2)) {
                return 1;
            }
            return 2;
        }
        return 0;
    }

    public function edit()
    {
        global $db;
        $SQLupdate = sprintf(
            "UPDATE " . static::$table . " SET photo = %s, photo_banniere = %s, photo_hero = %s, photo_full_body = %s, photo_produit = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->photo, "text"),
            GetSQLValueString($this->photo_banniere, "text"),
            GetSQLValueString($this->photo_hero, "text"),
            GetSQLValueString($this->photo_full_body, "text"),
            GetSQLValueString($this->photo_produit, "text"),
            GetSQLValueString($this->active, "int"),
            GetSQLValueString($this->last_edit, "date"),
            GetSQLValueString($this->id, "int")
        );
        if (!$db->query($SQLupdate)) {
            // Pivot secteurs
            static::saveSecteurs($this->id, $this->secteur_ids);

            $SQLcheck = sprintf(
                "SELECT * FROM " . static::$table2 . " WHERE id_agent_ia = %s AND langue = %s",
                GetSQLValueString($this->id, "int"),
                GetSQLValueString($this->langue, "text")
            );
            $result = $db->query($SQLcheck);
            if ($db->num_rows($result) == 0) {
                $SQLupdate2 = sprintf(
                    "INSERT INTO " . static::$table2 . " (id_agent_ia, titre, h1, slug, sous_titre, extrait, texte, seo_titre, seo_description, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->h1, "text"),
                    GetSQLValueString($this->slug, "text"),
                    GetSQLValueString($this->sous_titre, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->seo_titre, "text"),
                    GetSQLValueString($this->seo_description, "text"),
                    GetSQLValueString($this->langue, "text")
                );
            } else {
                $SQLupdate2 = sprintf(
                    "UPDATE " . static::$table2 . " SET titre = %s, h1 = %s, slug = %s, sous_titre = %s, extrait = %s, texte = %s, seo_titre = %s, seo_description = %s WHERE id_agent_ia = %s AND langue = %s",
                    GetSQLValueString($this->titre, "text"),
                    GetSQLValueString($this->h1, "text"),
                    GetSQLValueString($this->slug, "text"),
                    GetSQLValueString($this->sous_titre, "text"),
                    GetSQLValueString($this->extrait, "text"),
                    GetSQLValueString($this->texte, "text"),
                    GetSQLValueString($this->seo_titre, "text"),
                    GetSQLValueString($this->seo_description, "text"),
                    GetSQLValueString($this->id, "int"),
                    GetSQLValueString($this->langue, "text")
                );
            }
            if (!$db->query($SQLupdate2)) {
                return 1;
            }
            return 2;
        }
        return 0;
    }

    public function delete()
    {
        global $db;
        $SQLdelete  = sprintf("DELETE FROM " . static::$table  . " WHERE id = %s", GetSQLValueString($this->getId(), "int"));
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_agent_ia = %s", GetSQLValueString($this->getId(), "int"));
        $SQLdelete3 = sprintf("DELETE FROM " . static::$table3 . " WHERE id_agent_ia = %s", GetSQLValueString($this->getId(), "int"));
        $db->query($SQLdelete3);
        if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
            return 1;
        }
        return 0;
    }

    public function enable()
    {
        global $db;
        $SQLupdate = sprintf(
            "UPDATE " . static::$table . " SET active = %s WHERE id = %s",
            GetSQLValueString($this->getActive(), "int"),
            GetSQLValueString($this->getId(), "int")
        );
        if (!$db->query($SQLupdate)) {
            return 1;
        }
        return 0;
    }

    public static function find($id, $langue)
    {
        global $db;
        $agent = new agent_ia();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_agent_ia AND B.langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id, "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data  = $db->fetch_assoc($result);
            $agent = static::build($data);
            $agent->setSecteurIds(static::loadSecteurIds($agent->getId()));
        }
        return $agent;
    }

    public static function findBySlug($slug, $langue)
    {
        global $db;
        $agent = new agent_ia();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_agent_ia AND B.langue = %s WHERE B.slug = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($slug, "text")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data  = $db->fetch_assoc($result);
            $agent = static::build($data);
            $agent->setSecteurIds(static::loadSecteurIds($agent->getId()));
        }
        return $agent;
    }

    public static function findAll($langue, $active = false, $currentPage = false, $limit = false)
    {
        global $db;
        $items = array();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_agent_ia AND B.langue = %s WHERE 1=1",
            GetSQLValueString($langue, "text")
        );
        if ($active) {
            $SQLselect .= " AND A.active = 1";
        }
        $SQLselect .= " ORDER BY A.ordre ASC, A.id ASC";
        if ($currentPage && $limit) {
            $page = ($currentPage - 1) * $limit;
            $SQLselect .= " LIMIT $page, $limit";
        } elseif ($limit) {
            $SQLselect .= " LIMIT $limit";
        }
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($items, static::build($data));
        }
        return $items;
    }

    public static function findPhotosName($data)
    {
        global $db;
        $photos = [];
        if (isset($data['ids']) && !empty($data['ids'])) {
            $SQLselect = sprintf("SELECT photo FROM " . static::$table . " WHERE id in%s", GetSQLValueString($data['ids'], "text"));
            $result = $db->queryS($SQLselect);
            foreach ($result as $row) {
                $photos[] = $row["photo"];
            }
            return $photos;
        }
    }

    public static function generateSlug($slug, $langue, $id = false)
    {
        global $db;
        $index   = 1;
        $done    = false;
        $newSlug = url_rewriting($slug);
        $maxLen  = 75;
        if (strlen($newSlug) > $maxLen) {
            $newSlug = substr($newSlug, 0, $maxLen);
        }
        do {
            $SQLselect = sprintf(
                "SELECT A.id as ID FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_agent_ia AND B.langue = %s WHERE B.slug = %s",
                GetSQLValueString($langue, "text"),
                GetSQLValueString($newSlug, "text")
            );
            if ($id) {
                $SQLselect .= " AND A.id != " . intval($id);
            }
            $result = $db->query($SQLselect);
            if ($db->num_rows($result) >= 1) {
                $tempSlug = url_rewriting($slug . '-' . $index);
                if (strlen($tempSlug) > $maxLen) {
                    $tempSlug = substr($tempSlug, 0, $maxLen);
                }
                $newSlug = $tempSlug;
                $index++;
            } else {
                $done = true;
            }
        } while (!$done);
        return $newSlug;
    }

    public static function build($data)
    {
        $agent = new agent_ia();
        $agent->setId($data['ID']);
        $agent->setPhoto($data['photo']);
        $agent->setPhotoBanniere($data['photo_banniere']);
        $agent->setPhotoHero(isset($data['photo_hero']) ? $data['photo_hero'] : null);
        $agent->setPhotoFullBody(isset($data['photo_full_body']) ? $data['photo_full_body'] : null);
        $agent->setPhotoProduit(isset($data['photo_produit']) ? $data['photo_produit'] : null);
        $agent->setH1(isset($data['h1']) ? $data['h1'] : null);
        $agent->setActive($data['active']);
        $agent->setTitre($data['titre']);
        $agent->setSlug($data['slug']);
        $agent->setSousTitre($data['sous_titre']);
        $agent->setExtrait($data['extrait']);
        $agent->setTexte($data['texte']);
        $agent->setSeoTitre($data['seo_titre']);
        $agent->setSeoDescription($data['seo_description']);
        $agent->setDateAdd($data['date_add']);
        $agent->setLastEdit($data['last_edit']);
        $agent->setLangue($data['langue']);
        $agent->setOrdre(isset($data['ordre']) ? $data['ordre'] : 0);
        return $agent;
    }

    public static function count()
    {
        global $db;
        $result = $db->query("SELECT count(id) as c FROM " . static::$table);
        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);
            return $data["c"];
        }
        return 0;
    }

    public static function enableMultiple($data)
    {
        global $db;
        if (isset($data['ids']) && !empty($data['ids']) && isset($data['active']) && $data['active'] != '') {
            extract($data);
            $SQLupdate = "UPDATE " . static::$table . " SET active = $active WHERE id in$ids";
            if (!$db->query($SQLupdate)) return 1;
            else return 2;
        }
        return 0;
    }

    public static function deleteMultiple($data)
    {
        global $db;
        if (isset($data['ids']) && !empty($data['ids'])) {
            extract($data);
            $SQLdelete3 = "DELETE FROM " . static::$table3 . " WHERE id_agent_ia in $ids";
            $db->query($SQLdelete3);
            $SQLdelete  = "DELETE FROM " . static::$table  . " WHERE id in $ids";
            $SQLdelete2 = "DELETE FROM " . static::$table2 . " WHERE id_agent_ia in $ids";
            if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) return 1;
            else return 2;
        }
        return 0;
    }

    private static function loadSecteurIds($id_agent_ia)
    {
        global $db;
        $ids = [];
        $SQL = sprintf("SELECT id_secteur FROM " . static::$table3 . " WHERE id_agent_ia = %s", GetSQLValueString($id_agent_ia, "int"));
        $result = $db->queryS($SQL);
        foreach ($result as $row) {
            $ids[] = intval($row['id_secteur']);
        }
        return $ids;
    }

    private static function saveSecteurs($id_agent_ia, $secteur_ids)
    {
        global $db;
        $db->query(sprintf("DELETE FROM " . static::$table3 . " WHERE id_agent_ia = %s", GetSQLValueString($id_agent_ia, "int")));
        foreach ($secteur_ids as $id_secteur) {
            $id_secteur = intval($id_secteur);
            if ($id_secteur > 0) {
                $db->query(sprintf(
                    "INSERT IGNORE INTO " . static::$table3 . " (id_agent_ia, id_secteur) VALUES (%s, %s)",
                    GetSQLValueString($id_agent_ia, "int"),
                    GetSQLValueString($id_secteur, "int")
                ));
            }
        }
    }
}
