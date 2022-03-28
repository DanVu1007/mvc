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
        //chuyển model thành arr
        $modelProperties = $model->getProperties($model);
        //lấy id
        $id = $modelProperties[$this->id];
        //bỏ id ra khỏi mảng
        unset($modelProperties[$this->id]);
        //thêm created hoặc updated dựa theo id
        if ($id == null) {
            $modelProperties['created_at'] = date('Y-m-d H:i:s');
            if (($modelProperties['updated_at'] == null)) {
                unset($modelProperties['updated_at']);
            }
        } else {
            $modelProperties['updated_at'] = date('Y-m-d H:i:s');
            if (($modelProperties['created_at'] == null)) {
                unset($modelProperties['created_at']);
            }
        }
        //String to request SQL
        $stringModel = '';
        foreach ($modelProperties as $key => $value) {
            if (isset($value)) {
                $stringModel .= $key . '= :' . $key . ', ';
            }
        }
        $stringModel = substr($stringModel, 0, strlen($stringModel) - 2);

        //set câu lệnh SQL dựa trên id
        if ($id == null) {
            $sql = "INSERT INTO $this->table SET $stringModel";
        } else {
            $sql = "UPDATE $this->table SET $stringModel WHERE `$this->id` = $id";
        }
        //truy vấn DB
        $req = Database::getBdd()->prepare($sql);
        return $req->execute($modelProperties);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE `$this->id` = $id";

        $request = Database::getBdd()->prepare($sql);
        return $request->execute();
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
    public function getLogin($name){
        $sql = "SELECT * FROM $this->table WHERE `name` = '$name'";
        $request = Database::getBdd()->prepare($sql);
        $request->execute();
        return ($request->fetchObject($this->myClass));
    }
    
}
