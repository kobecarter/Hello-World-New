<?php
class contact {
    private $id = 0;
    private $nom;
    private $fullname;
    private $email;
    private $phone;
    private $template;
    private $confirm;
    private $date_add;

    public function __construct($id, $db) {

        $SQLselect = "SELECT * FROM ".__prefixe_db__."contact WHERE id = $id";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) == 1){

            $data = $db->fetch_assoc($result);
            $this->id = $data['id'];
            $this->nom = $data['nom'];
            $this->fullname = $data['fullname'];
            $this->email = $data['email'];
            $this->phone = $data['phone'];
            $this->template = $data['template'];
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
    
    public function getFullname(){
        return $this->fullname;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function getPhone(){
        return $this->phone;
    }

    public function getTemplate(){
        return $this->template;
    }

    public function isConfirm(){
        return ($this->confirm == 1) ? true : false ;
    }

    public function getDateAdd(){
        return $this->date_add;
    }
}
?>