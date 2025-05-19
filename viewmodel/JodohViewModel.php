<?php
require_once 'model/Jodoh.php';
require_once 'model/Degenerate.php';
require_once 'model/Haluan.php';

class JodohViewModel
{
    private $jodoh;
    private $degenerate;
    private $haluan;

    public function __construct()
    {
        $this->jodoh = new Jodoh();
        $this->degenerate = new Degenerate();
        $this->haluan = new Haluan();
    }

    public function getJodohList()
    {
        return $this->jodoh->getAll();
    }

    public function getDegenerates()
    {
        return $this->degenerate->getAll();
    }

    public function getHaluans()
    {
        return $this->haluan->getAll();
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
