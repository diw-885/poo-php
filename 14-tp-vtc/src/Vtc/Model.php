<?php

namespace Vtc;

// Chaque classe dans la BDD devra extends de Model
class Model
{
    private $db;

    public function getDatabase()
    {
        $this->db = new \PDO('mysql:host=localhost;dbname=vtc', 'root', '', [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING,
        ]);

        return $this->db;
    }
}
