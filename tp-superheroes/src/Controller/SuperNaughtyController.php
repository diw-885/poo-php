<?php

namespace Controller;

class SuperNaughtyController
{
    public function create()
    {
        $errors = $this->handleForm();

        require __DIR__.'/../../templates/naughties/create.php';
    }

    public function list()
    {
        $naughties = \Database::select('select * from supernaughties');

        require __DIR__.'/../../templates/naughties/list.php';
    }

    public function edit($id)
    {
        $naughty = \Database::selectOne('select * from supernaughties where id = :id', ['id' => $id]);
        $errors = $this->handleForm('update', $id);

        require __DIR__.'/../../templates/naughties/edit.php';
    }

    public function delete($id)
    {
        \Database::query('delete from supernaughties where id = :id', ['id' => $id]);

        header('Location: '.BASE_URL.'vilains');
    }

    protected function handleForm($type = 'create', $id = null)
    {
        $errors = [];

        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupèration et clean des valeurs du formulaire
            $name = trim(htmlspecialchars($_POST['name']));
            $hobby = trim(htmlspecialchars($_POST['hobby']));
            $identity = trim(htmlspecialchars($_POST['identity']));
            $universe = trim(htmlspecialchars($_POST['universe']));

            if (empty($name)) {
                $errors['name'] = 'Le nom est vide.';
            }

            if (empty($hobby)) {
                $errors['hobby'] = 'Le passe temps est vide.';
            }

            if (empty($identity)) {
                $errors['identity'] = 'L\'identité est vide.';
            }

            if (empty($universe)) {
                $errors['universe'] = 'L\'univers est vide.';
            }

            if (empty($errors)) {
                $bindings = ['name' => $name, 'hobby' => $hobby, 'identity' => $identity, 'universe' => $universe];

                $sql = $type === 'create'
                    ? 'insert into supernaughties (name, hobby, identity, universe) values (:name, :hobby, :identity, :universe)'
                    : 'update supernaughties set name = :name, hobby = :hobby, identity = :identity, universe = :universe where id = :id';

                if ($type !== 'create') {
                    $bindings['id'] = $id;
                }

                \Database::query($sql, $bindings);

                header('Location: '.BASE_URL.'vilains');
            }
        }

        return $errors;
    }
}
