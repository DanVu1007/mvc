<?php

namespace mvc\Core;

use PDO;
use mvc\Config\Database;
use mvc\Core\ResourceModelInterface;

class ResourceModel implements ResourceModelInterface
{
    private $table;
    private $id;
    private $model;
    private $myClass;
    public function __init($table, $id, $model)
    {
        $this->table = $table;
        $this->id = $id;
        $this->model = $model;
        $this->myClass = get_class($model);
    }
    public function save($model)
    {
    }
    public function edit($model)
    {
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE `$this->id` = $id";

        $request = Database::getBdd()->prepare($sql);
        $request->execute();
        header("Location: " . WEBROOT . "tasks/index");
    }
    public function get($id)
    {
        $sql = "SELECT * FROM $this->table WHERE `$this->id` = $id";
        $request = Database::getBdd()->prepare($sql);
        $request->execute();
        return ($request->fetchObject($this->myClass));
    }
    public function getAll()
    {
        $sql = "SELECT * FROM $this->table";
        $request = Database::getBdd()->prepare($sql);
        $request->execute();
        return ($request->fetchAll(PDO::FETCH_CLASS, $this->myClass));
    }
}
