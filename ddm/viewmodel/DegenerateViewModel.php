<?php
require_once 'model/Degenerate.php'; // Make sure this is Dege.php if class name is Dege

class DegenerateViewModel
{
    private $degenerate;

    public function __construct()
    {
        $this->degenerate = new Dege(); // Ensure class name matches
    }

    public function getDegenerateList()
    {
        return $this->degenerate->getAll();
    }

    public function getDegenerateById($id)
    {
        return $this->degenerate->getById($id);
    }

    public function addDegenerate($name, $height, $weight, $kelamin)
    {
        return $this->degenerate->create($name, $height, $weight, $kelamin);
    }

    public function updateDegenerate($id, $name, $height, $weight, $kelamin)
    {
        return $this->degenerate->update($id, $name, $height, $weight, $kelamin);
    }

    public function deleteDegenerate($id)
    {
        // This method will now return true if successful, or an error string if not.
        return $this->degenerate->delete($id);
    }
}
