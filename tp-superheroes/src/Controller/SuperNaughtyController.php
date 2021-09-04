<?php

namespace Controller;

use Model\SuperNaughty;

class SuperNaughtyController
{
    public function create()
    {
        $errors = $this->handleForm();

        require __DIR__.'/../../templates/naughties/create.php';
    }

    public function list()
    {
        $naughties = SuperNaughty::all();

        require __DIR__.'/../../templates/naughties/list.php';
    }

    public function edit($id)
    {
        $naughty = SuperNaughty::find($id);
        $errors = $this->handleForm('update', $id);

        require __DIR__.'/../../templates/naughties/edit.php';
    }

    public function delete($id)
    {
        SuperNaughty::delete($id);

        header('Location: '.BASE_URL.'vilains');
    }

    protected function handleForm($type = 'create', $id = null)
    {
        $errors = [];

        // Traitement du formulaire
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupèration et clean des valeurs du formulaire
            $naughty = new SuperNaughty($_POST);
            $naughty->validate();

            if (empty($errors)) {
                if ($type === 'create') {
                    $naughty->save();
                } else {
                    $naughty->update($id);
                }

                header('Location: '.BASE_URL.'vilains');
            }
        }

        return $errors;
    }
}
