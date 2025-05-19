<?php
require_once 'model/Jodoh.php';

class JodohViewModel
{
    private $jodoh;

    public function __construct()
    {
        $this->jodoh = new Jodoh();
    }

    public function getJodohList()
    {
        return $this->jodoh->getAll();
    }

    public function getJodohById($id)
    {
        return $this->jodoh->getById($id);
    }

    public function addJodoh($id_degenerate, $id_haluan)
    {
        return $this->jodoh->create($id_degenerate, $id_haluan);
    }

    public function updateJodoh($id, $id_degenerate, $id_haluan)
    {
        return $this->jodoh->update($id, $id_degenerate, $id_haluan);
    }

    public function deleteJodoh($id)
    {
        return $this->jodoh->delete($id);
    }
}
