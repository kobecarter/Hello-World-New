<?php

class formation
{
    static $table  = __prefixe_db__ . "formation";
    static $table2 = __prefixe_db__ . "details_formation";

    private $id;
    private $type_formation;
    private $type_public;
    private $date_debut;
    private $date_fin;
    private $date_ouverture_inscription;
    private $date_limite_inscription;
    private $lieu;
    private $photo;
    private $photo_banniere;
    private $pdf;
    private $nb_participants;
    private $nb_participants_min;
    private $status;
    private $active;
    private $date_add;
    private $last_edit;

    // Champs traduits (details)
    private $seo_titre;
    private $seo_description;
    private $seo_keyword;
    private $slug;
    private $titre;
    private $h1;
    private $sous_titre;
    private $extrait;
    private $description;
    private $prerequis;
    private $livrables;
    private $langue;

    public function __construct()
    {
        $this->id = 0;
    }

    /* ── Getters ─────────────────────────────────────────────────── */
    public function getId()              { return $this->id; }
    public function getTypeFormation()   { return $this->type_formation; }
    public function getTypePublic()      { return $this->type_public; }
    public function getDateDebut()       { return $this->date_debut; }
    public function getDateFin()         { return $this->date_fin; }
    public function getDateOuvertureInscription() { return $this->date_ouverture_inscription; }
    public function getDateLimiteInscription()    { return $this->date_limite_inscription; }
    public function getLieu()            { return $this->lieu; }
    public function getPhoto()           { return $this->photo; }
    public function getPhotoBanniere()   { return $this->photo_banniere; }
    public function getPdf()             { return $this->pdf; }
    public function getNbParticipants()  { return $this->nb_participants; }
    public function getNbParticipantsMin() { return $this->nb_participants_min; }
    public function getStatus()          { return $this->status; }
    public function getActive()          { return $this->active; }
    public function isActive()           { return $this->active ? 1 : 0; }
    public function getDateAdd()         { return $this->date_add; }
    public function getLastEdit()        { return $this->last_edit; }
    public function getSeoTitre()        { return $this->seo_titre; }
    public function getSeoDescription()  { return $this->seo_description; }
    public function getSeoKeyword()      { return $this->seo_keyword; }
    public function getSlug()            { return $this->slug; }
    public function getTitre()           { return $this->titre; }
    public function getH1()              { return $this->h1; }
    public function getSousTitre()       { return $this->sous_titre; }
    public function getExtrait()         { return $this->extrait; }
    public function getDescription()     { return $this->description; }
    public function getPrerequis()       { return $this->prerequis; }
    public function getLivrables()       { return $this->livrables; }
    public function getLangue()          { return $this->langue; }

    /* ── Setters ─────────────────────────────────────────────────── */
    public function setId($id)                    { $this->id = $id; }
    public function setTypeFormation($v)          { $this->type_formation = $v; }
    public function setTypePublic($v)             { $this->type_public = $v; }
    public function setDateDebut($v)              { $this->date_debut = $v; }
    public function setDateFin($v)                { $this->date_fin = $v; }
    public function setDateOuvertureInscription($v) { $this->date_ouverture_inscription = $v; }
    public function setDateLimiteInscription($v)    { $this->date_limite_inscription = $v; }
    public function setLieu($v)                   { $this->lieu = $v; }
    public function setPhoto($v)                  { $this->photo = $v; }
    public function setPhotoBanniere($v)          { $this->photo_banniere = $v; }
    public function setPdf($v)                    { $this->pdf = $v; }
    public function setNbParticipants($v)         { $this->nb_participants = $v; }
    public function setNbParticipantsMin($v)      { $this->nb_participants_min = $v; }
    public function setStatus($v)                 { $this->status = $v; }
    public function setActive($v)                 { $this->active = $v; }
    public function setDateAdd($v)                { $this->date_add = $v; }
    public function setLastEdit($v)               { $this->last_edit = $v; }
    public function setSeoTitre($v)               { $this->seo_titre = $v; }
    public function setSeoDescription($v)         { $this->seo_description = $v; }
    public function setSeoKeyword($v)             { $this->seo_keyword = $v; }
    public function setSlug($v)                   { $this->slug = $v; }
    public function setTitre($v)                  { $this->titre = $v; }
    public function setH1($v)                     { $this->h1 = $v; }
    public function setSousTitre($v)              { $this->sous_titre = $v; }
    public function setExtrait($v)                { $this->extrait = $v; }
    public function setDescription($v)            { $this->description = $v; }
    public function setPrerequis($v)              { $this->prerequis = $v; }
    public function setLivrables($v)              { $this->livrables = $v; }
    public function setLangue($v)                 { $this->langue = $v; }

    /* ── URL publique ─────────────────────────────────────────────── */
    public function getLink()
    {
        global $siteURL;
        if ($this->slug != "") {
            if (langue::isLangueDefault($this->langue)) {
                return $siteURL . "formation/" . $this->slug . "/";
            } else {
                return $siteURL . $this->getLangue() . "/formation/" . $this->getSlug() . "/";
            }
        }
        return "index.php?option=com_formation&task=showDetails&slug=" . $this->slug;
    }

    public static function getSeo()
    {
        $url  = "RewriteRule ^formation/([^/]+)/$ index.php?option=com_formation&task=showDetails&slug=\$1&l=fr [NC,L]\n";
        $url .= "        RewriteRule ^([a-z]+)/formation/([^/]+)/$ index.php?option=com_formation&task=showDetails&l=\$1&slug=\$2 [NC,L]\n";
        return $url;
    }

    /* ── CRUD ─────────────────────────────────────────────────────── */
    public function add()
    {
        global $db;
        $SQLinsert = sprintf(
            "INSERT INTO " . static::$table . " (type_formation, type_public, date_debut, date_fin, date_ouverture_inscription, date_limite_inscription, lieu, photo, photo_banniere, pdf, nb_participants, nb_participants_min, status, active, date_add, last_edit) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            GetSQLValueString($this->type_formation,  "text"),
            GetSQLValueString($this->type_public,     "text"),
            GetSQLValueString($this->date_debut,      "date"),
            GetSQLValueString($this->date_fin,        "date"),
            GetSQLValueString($this->date_ouverture_inscription, "date"),
            GetSQLValueString($this->date_limite_inscription,    "date"),
            GetSQLValueString($this->lieu,            "text"),
            GetSQLValueString($this->photo,           "text"),
            GetSQLValueString($this->photo_banniere,  "text"),
            GetSQLValueString($this->pdf,             "text"),
            GetSQLValueString($this->nb_participants, "int"),
            GetSQLValueString($this->nb_participants_min, "int"),
            GetSQLValueString($this->status,          "text"),
            GetSQLValueString($this->active,          "int"),
            GetSQLValueString($this->date_add,        "date"),
            GetSQLValueString($this->last_edit,       "date")
        );
        if (!$db->query($SQLinsert)) {
            $id_formation = $db->last_id();
            $SQLinsert2 = sprintf(
                "INSERT INTO " . static::$table2 . " (id_formation, seo_titre, seo_description, seo_keyword, slug, titre, h1, sous_titre, extrait, description, prerequis, livrables, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id_formation,       "int"),
                GetSQLValueString($this->seo_titre,    "text"),
                GetSQLValueString($this->seo_description, "text"),
                GetSQLValueString($this->seo_keyword,  "text"),
                GetSQLValueString($this->slug,         "text"),
                GetSQLValueString($this->titre,        "text"),
                GetSQLValueString($this->h1,           "text"),
                GetSQLValueString($this->sous_titre,   "text"),
                GetSQLValueString($this->extrait,      "text"),
                GetSQLValueString($this->description,  "text"),
                GetSQLValueString($this->prerequis,    "text"),
                GetSQLValueString($this->livrables,    "text"),
                GetSQLValueString($this->langue,       "text")
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
            "UPDATE " . static::$table . " SET type_formation = %s, type_public = %s, date_debut = %s, date_fin = %s, date_ouverture_inscription = %s, date_limite_inscription = %s, lieu = %s, photo = %s, photo_banniere = %s, pdf = %s, nb_participants = %s, nb_participants_min = %s, status = %s, active = %s, last_edit = %s WHERE id = %s",
            GetSQLValueString($this->type_formation,  "text"),
            GetSQLValueString($this->type_public,     "text"),
            GetSQLValueString($this->date_debut,      "date"),
            GetSQLValueString($this->date_fin,        "date"),
            GetSQLValueString($this->date_ouverture_inscription, "date"),
            GetSQLValueString($this->date_limite_inscription,    "date"),
            GetSQLValueString($this->lieu,            "text"),
            GetSQLValueString($this->photo,           "text"),
            GetSQLValueString($this->photo_banniere,  "text"),
            GetSQLValueString($this->pdf,             "text"),
            GetSQLValueString($this->nb_participants, "int"),
            GetSQLValueString($this->nb_participants_min, "int"),
            GetSQLValueString($this->status,          "text"),
            GetSQLValueString($this->active,          "int"),
            GetSQLValueString($this->last_edit,       "date"),
            GetSQLValueString($this->id,              "int")
        );
        if (!$db->query($SQLupdate)) {
            $SQLcheck = sprintf(
                "SELECT id FROM " . static::$table2 . " WHERE id_formation = %s AND langue = %s",
                GetSQLValueString($this->id,     "int"),
                GetSQLValueString($this->langue, "text")
            );
            $result = $db->query($SQLcheck);
            if ($db->num_rows($result) == 0) {
                $SQLupdate2 = sprintf(
                    "INSERT INTO " . static::$table2 . " (id_formation, seo_titre, seo_description, seo_keyword, slug, titre, h1, sous_titre, extrait, description, prerequis, livrables, langue) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                    GetSQLValueString($this->id,             "int"),
                    GetSQLValueString($this->seo_titre,      "text"),
                    GetSQLValueString($this->seo_description,"text"),
                    GetSQLValueString($this->seo_keyword,    "text"),
                    GetSQLValueString($this->slug,           "text"),
                    GetSQLValueString($this->titre,          "text"),
                    GetSQLValueString($this->h1,             "text"),
                    GetSQLValueString($this->sous_titre,     "text"),
                    GetSQLValueString($this->extrait,        "text"),
                    GetSQLValueString($this->description,    "text"),
                    GetSQLValueString($this->prerequis,      "text"),
                    GetSQLValueString($this->livrables,      "text"),
                    GetSQLValueString($this->langue,         "text")
                );
            } else {
                $SQLupdate2 = sprintf(
                    "UPDATE " . static::$table2 . " SET seo_titre = %s, seo_description = %s, seo_keyword = %s, slug = %s, titre = %s, h1 = %s, sous_titre = %s, extrait = %s, description = %s, prerequis = %s, livrables = %s WHERE id_formation = %s AND langue = %s",
                    GetSQLValueString($this->seo_titre,       "text"),
                    GetSQLValueString($this->seo_description, "text"),
                    GetSQLValueString($this->seo_keyword,     "text"),
                    GetSQLValueString($this->slug,            "text"),
                    GetSQLValueString($this->titre,           "text"),
                    GetSQLValueString($this->h1,              "text"),
                    GetSQLValueString($this->sous_titre,      "text"),
                    GetSQLValueString($this->extrait,         "text"),
                    GetSQLValueString($this->description,     "text"),
                    GetSQLValueString($this->prerequis,       "text"),
                    GetSQLValueString($this->livrables,       "text"),
                    GetSQLValueString($this->id,              "int"),
                    GetSQLValueString($this->langue,          "text")
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
        $SQLdelete  = sprintf("DELETE FROM " . static::$table  . " WHERE id = %s",           GetSQLValueString($this->getId(), "int"));
        $SQLdelete2 = sprintf("DELETE FROM " . static::$table2 . " WHERE id_formation = %s", GetSQLValueString($this->getId(), "int"));
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
            GetSQLValueString($this->getId(),     "int")
        );
        if (!$db->query($SQLupdate)) {
            return 1;
        }
        return 0;
    }

    /* ── Finders ─────────────────────────────────────────────────── */
    public static function find($id, $langue)
    {
        global $db;
        $formation = new formation();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_formation AND B.langue = %s WHERE A.id = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($id,     "int")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data      = $db->fetch_assoc($result);
            $formation = static::build($data);
        }
        return $formation;
    }

    public static function findBySlug($slug, $langue)
    {
        global $db;
        $formation = new formation();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_formation AND B.langue = %s WHERE B.slug = %s",
            GetSQLValueString($langue, "text"),
            GetSQLValueString($slug,   "text")
        );
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {
            $data      = $db->fetch_assoc($result);
            $formation = static::build($data);
        }
        return $formation;
    }

    public static function findAll($langue, $active = false, $currentPage = false, $limit = false)
    {
        global $db;
        $items     = array();
        $SQLselect = sprintf(
            "SELECT A.id as ID, A.*, B.* FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_formation AND B.langue = %s WHERE 1=1",
            GetSQLValueString($langue, "text")
        );
        if ($active) {
            $SQLselect .= " AND A.active = 1";
        }
        $SQLselect .= " ORDER BY A.date_debut ASC";
        if ($currentPage && $limit) {
            $page       = ($currentPage - 1) * $limit;
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

    /* ── Actions groupées ────────────────────────────────────────── */
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
            $SQLdelete  = "DELETE FROM " . static::$table  . " WHERE id in $ids";
            $SQLdelete2 = "DELETE FROM " . static::$table2 . " WHERE id_formation in $ids";
            if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) return 1;
            else return 2;
        }
        return 0;
    }

    /* ── Utilitaires ─────────────────────────────────────────────── */
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
                "SELECT A.id as ID FROM " . static::$table . " A LEFT JOIN " . static::$table2 . " B ON A.id = B.id_formation AND B.langue = %s WHERE B.slug = %s",
                GetSQLValueString($langue,   "text"),
                GetSQLValueString($newSlug,  "text")
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

    public static function build($data)
    {
        $f = new formation();
        $f->setId($data['ID']);
        $f->setTypeFormation($data['type_formation']);
        $f->setTypePublic($data['type_public']);
        $f->setDateDebut($data['date_debut']);
        $f->setDateFin($data['date_fin']);
        $f->setDateOuvertureInscription(isset($data['date_ouverture_inscription']) ? $data['date_ouverture_inscription'] : null);
        $f->setDateLimiteInscription(isset($data['date_limite_inscription']) ? $data['date_limite_inscription'] : null);
        $f->setLieu($data['lieu']);
        $f->setPhoto(isset($data['photo'])           ? $data['photo']           : null);
        $f->setPhotoBanniere(isset($data['photo_banniere']) ? $data['photo_banniere'] : null);
        $f->setPdf(isset($data['pdf'])               ? $data['pdf']             : null);
        $f->setNbParticipants($data['nb_participants']);
        $f->setNbParticipantsMin(isset($data['nb_participants_min']) ? $data['nb_participants_min'] : 0);
        $f->setStatus($data['status']);
        $f->setActive($data['active']);
        $f->setDateAdd($data['date_add']);
        $f->setLastEdit($data['last_edit']);
        $f->setSeoTitre(isset($data['seo_titre'])        ? $data['seo_titre']        : null);
        $f->setSeoDescription(isset($data['seo_description']) ? $data['seo_description'] : null);
        $f->setSeoKeyword(isset($data['seo_keyword']) ? $data['seo_keyword'] : null);
        $f->setSlug(isset($data['slug'])                 ? $data['slug']             : null);
        $f->setTitre(isset($data['titre'])               ? $data['titre']            : null);
        $f->setH1(isset($data['h1'])                     ? $data['h1']               : null);
        $f->setSousTitre(isset($data['sous_titre'])      ? $data['sous_titre']       : null);
        $f->setExtrait(isset($data['extrait'])           ? $data['extrait']          : null);
        $f->setDescription(isset($data['description'])   ? $data['description']      : null);
        $f->setPrerequis(isset($data['prerequis'])       ? $data['prerequis']        : null);
        $f->setLivrables(isset($data['livrables'])       ? $data['livrables']        : null);
        $f->setLangue(isset($data['langue'])             ? $data['langue']           : null);
        return $f;
    }
}
