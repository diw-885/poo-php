<?php

class Annuaire
{
    /**
     * Un tableau qui contient des contacts.
     */
    private $contacts = [];

    /**
     * Renvoie le nombre de contacts de l'annuaire.
     */
    public function compter()
    {
        return count($this->contacts);
    }

    /**
     * Permet d'ajouter un contact dans l'annuaire.
     */
    public function addContact(Contact $contact)
    {
        $this->contacts[] = $contact;

        return $this;
    }

    public function afficher()
    {
        $html = '<ul>';

        foreach ($this->contacts as $contact) {
            $html .= "<li>$contact->nom $contact->prenom, Tel: $contact->telephone, Mail: $contact->email</li>";
        }

        $html .= '</ul>';

        return $html;
    }
}
