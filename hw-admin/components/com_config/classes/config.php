<?php

class config
{
    private $nom;
    private $titre;
    private $description;
    private $logo;
    private $email;
    private $tel;
    private $tel2;
    private $fax;
    private $adresse;
    private $x;
    private $y;
    private $id_slider;
    private $facebook;
    private $twitter;
    private $gplus;
    private $youtube;
    private $instagram;
    private $pinterest;
    private $linkedin;
    private $skype;
    private $tumblr;
    private $viadeo;
    private $analytic;

    public function __construct($db, $lang = 'fr')
    {

        $SQLselect = "SELECT A.*, B.* FROM " . __prefixe_db__ . "config A
					  LEFT JOIN " . __prefixe_db__ . "details_config B ON A.id = B.id_config AND langue = '$lang'
					  WHERE A.id = 0";

        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1) {

            $data = $db->fetch_assoc($result);
            $this->nom = $data['nom'];
            $this->titre = $data['titre'];
            $this->description = $data['description'];
            $this->logo = $data['logo'];
            $this->email = $data['email'];
            $this->tel = $data['tel'];
            $this->tel2 = $data['tel2'];
            $this->fax = $data['fax'];
            $this->adresse = $data['adresse'];
            $this->x = $data['x'];
            $this->y = $data['y'];
            $this->id_slider = $data['id_slider'];
            $this->facebook = $data['facebook'];
            $this->twitter = $data['twitter'];
            $this->gplus = $data['gplus'];
            $this->youtube = $data['youtube'];
            $this->instagram = $data['instagram'];
            $this->pinterest = $data['pinterest'];
            $this->linkedin = $data['linkedin'];
            $this->skype = $data['skype'];
            $this->tumblr = $data['tumblr'];
            $this->viadeo = $data['viadeo'];
            $this->analytic = $data['analytic'];
        }
    }

    public function __destruct()
    {

    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getIdSlider()
    {
        return $this->id_slider;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function getTel2()
    {
        return $this->tel2;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getX()
    {
        return $this->x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function getFacebook()
    {
        return $this->facebook;
    }

    public function getTwitter()
    {
        return $this->twitter;
    }

    public function getGplus()
    {
        return $this->gplus;
    }

    public function getYoutube()
    {
        return $this->youtube;
    }

    public function getInstagram()
    {
        return $this->instagram;
    }

    public function getPinterest()
    {
        return $this->pinterest;
    }

    public function getLinkedin()
    {
        return $this->linkedin;
    }

    public function getSkype()
    {
        return $this->skype;
    }

    public function getTumblr()
    {
        return $this->tumblr;
    }

    public function getViadeo()
    {
        return $this->viadeo;
    }

    public function getAnalytic()
    {
        return $this->analytic;
    }

    public function getAnalytics()
    {
        return "<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=".$this->analytic."\"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', '".$this->analytic."');
  gtag('config', 'AW-988470532');
</script>
";
    }

}

?>