<?php

namespace Model;

class SuperNaughty extends Model
{
    protected $id;
    protected $name;
    protected $hobby;
    protected $identity;
    protected $universe;

    protected static $table = 'supernaughties';

    /**
     * Permet d'hydrater le modèle avec les données de $_POST ou d'un tableau
     */
    public function __construct($data)
    {
        $this->name = trim(htmlspecialchars($data['name'] ?? null));
        $this->hobby = trim(htmlspecialchars($data['hobby'] ?? null));
        $this->identity = trim(htmlspecialchars($data['identity'] ?? null));
        $this->universe = trim(htmlspecialchars($data['universe'] ?? null));
    }

    /**
     * Permet de valider les données du modèles
     */
    public function validate()
    {
        $errors = [];

        if (empty($this->name)) {
            $errors['name'] = 'Le nom est vide.';
        }

        if (empty($this->hobby)) {
            $errors['hobby'] = 'Le passe temps est vide.';
        }

        if (empty($this->identity)) {
            $errors['identity'] = 'L\'identité est vide.';
        }

        if (empty($this->universe)) {
            $errors['universe'] = 'L\'univers est vide.';
        }

        return $errors;
    }

    /**
     * Affiche les ennemis du méchant!
     */
    public static function enemies($id)
    {
        $enemis = \Database::select('
            select * from superheroes sn
            inner join superheroe_supernaughty sr on sr.superheroe_id = sn.id
            where sr.supernaughty_id = :naguhtyId
        ', ['naguhtyId' => $id]);

        return implode(', ', array_map(function ($enemy) {
            return $enemy->name;
        }, $enemis));
    }
}
