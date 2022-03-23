<?php

namespace mvc\Models;

use mvc\Models\StudentResourceModel;

class StudentRepository
{
    private $resourceModel;
    public function __construct()
    {
        $this->resourceModel = new StudentResourceModel;
    }

    public function getAll()
    {
        return $this->resourceModel->getAll();
    }
    public function save($model)
    {
        return $this->resourceModel->save($model);
    }
    public function get($id)
    {
        return $this->resourceModel->get($id);
    }
    public function delete($id)
    {
        return $this->resourceModel->delete($id);
    }
}
