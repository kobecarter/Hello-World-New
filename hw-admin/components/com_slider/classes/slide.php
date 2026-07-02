<?php

class slide
{

    private $id;
    private $id_slider;
    private $photo;
    private $ordre;
    private $actif;
    private $titre;
    private $description;
    private $url;
    private $langue;

    public function __construct($id, $db, $lang = 'en')
    {

        $SQLselect = "SELECT A.*, B.* FROM " . __prefixe_db__ . "slides A
						  LEFT JOIN " . __prefixe_db__ . "details_slide B ON A.id = B.id_slide AND langue = '$lang'
						  WHERE A.id = $id";
        $result = $db->query($SQLselect);

        if ($db->num_rows($result) == 1) {
            $data = $db->fetch_assoc($result);

            $this->id = $data['id'];
            $this->id_slider = $data['id_slider'];
            $this->photo = $data['photo'];
            $this->ordre = $data['ordre'];
            $this->actif = $data['actif'];

            $this->titre = $data['titre'];
            $this->description = $data['description'];
            $this->url = $data['url'];
            $this->langue = $data['langue'];
        } else
            $this->id = 0;
    }

    public function __destruct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getIdSlider()
    {
        return $this->id_slider;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getURL()
    {
        return $this->url;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getOrdre()
    {
        return $this->ordre;
    }

    public function isActif()
    {
        return $this->actif == 1 ? true : false;
    }

    public static function findAll($id_slider)
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "slides WHERE id_slider = $id_slider AND actif = 1 ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }
}
?>
