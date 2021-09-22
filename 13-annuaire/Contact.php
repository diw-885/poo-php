<?php

class Contact
{
    public $nom;
    public $prenom;
    public $telephone;
    public $email;

    public function __construct($nom, $prenom, $telephone, $email)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->telephone = $telephone;
        $this->email = $email;
    }
}
