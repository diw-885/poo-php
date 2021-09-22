<?php

namespace Geometry;

/**
 * Cette classe permet de construire une forme.
 */
class Form
{
    /**
     * La forme va stocker plusieurs formes dans un tableau.
     */
    protected $forms = [];

    /**
     * Cette méthode permet d'ajouter une nouvelle forme dans le tableau.
     */
    public function add($form)
    {
        $this->forms[] = $form;

        return $this;
    }

    /**
     * L'aire d'une forme quelconque est l'addition des aires de toutes les formes présentes dans son tableau.
     */
    public function area()
    {
        $area = 0;

        foreach ($this->forms as $form) {
            $area += $form->area();
        }

        return $area;
    }

    public function perimeter()
    {
        $perimeter = 0;

        foreach ($this->forms as $form) {
            $perimeter += $form->perimeter();
        }

        return $perimeter;
    }
}
