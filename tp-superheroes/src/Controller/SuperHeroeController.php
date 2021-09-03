<?php

namespace Controller;

class SuperHeroeController
{
    public function create()
    {
        $errors = [];
        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupèration et clean des valeurs du formulaire
            $name = trim(htmlspecialchars($_POST['name']));
            $power = trim(htmlspecialchars($_POST['power']));
            $identity = trim(htmlspecialchars($_POST['identity']));
            $universe = trim(htmlspecialchars($_POST['universe']));

            if (empty($name)) {
                $errors['name'] = 'Le nom est vide.';
            }

            if (empty($power)) {
                $errors['power'] = 'Le pouvoir est vide.';
            }

            if (empty($identity)) {
                $errors['identity'] = 'L\'identité est vide.';
            }

            if (empty($universe)) {
                $errors['universe'] = 'L\'univers est vide.';
            }

            if (empty($errors)) {
                \Database::query(
                    'insert into superheroes (name, power, identity, universe) values (:name, :power, :identity, :universe)',
                    ['name' => $name, 'power' => $power, 'identity' => $identity, 'universe' => $universe]
                );

                header('Location: '.BASE_URL.'heros');
            }
        }

        require __DIR__.'/../../templates/heroes/create.php';
    }

    public function list()
    {
        $heroes = \Database::select('select * from superheroes');

        require __DIR__.'/../../templates/heroes/list.php';
    }

    public function edit($id)
    {
        $heroe = \Database::selectOne('select * from superheroes where id = :id', ['id' => $id]);

        require __DIR__.'/../../templates/heroes/edit.php';
    }

    public function delete($id)
    {
        \Database::query('delete from superheroes where id = :id', ['id' => $id]);

        header('Location: '.BASE_URL.'heros');
    }
}
