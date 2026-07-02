<?php
class newsletter {
    private $id = 0;
    private $nom;
    private $email;
    private $confirm;
    private $date_add;

    public function __construct($id, $db) {

        $SQLselect = "SELECT * FROM ".__prefixe_db__."newsletter WHERE id = $id";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->nom = $data['nom'];
            $this->email = $data['email'];
            $this->confirm = $data['confirm'];
            $this->date_add = $data['date_add'];
        }
    }

    public function __destruct(){

    }

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function isConfirm(){
        return ($this->confirm == 1) ? true : false ;
    }

    public function getDateAdd(){
        return $this->date_add;
    }
}
?>