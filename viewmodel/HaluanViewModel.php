<?php
require_once 'model/Haluan.php';

class HaluanViewModel
{
    private $haluan;

    public function __construct()
    {
        $this->haluan = new Haluan();
    }

    public function getHaluanList()
    {
        return $this->haluan->getAll();
    }

    public function getHaluanById($id)
    {
        return $this->haluan->getById($id);
    }

    public function addHaluan($name, $asal, $kelamin, $stereotipe)
    {
        return $this->haluan->create($name, $asal, $kelamin, $stereotipe);
    }

    public function updateHaluan($id, $name, $asal, $kelamin, $stereotipe)
    {
        return $this->haluan->update($id, $name, $asal, $kelamin, $stereotipe);
    }

    public function deleteHaluan($id)
    {
        return $this->haluan->delete($id);
    }
}
