<?php

namespace mvc\Models\task;

use mvc\Models\task\TaskResourceModel;

class TaskRepository
{
    private $resourceModel;
    public function __construct()
    {
        $this->resourceModel = new TaskResourceModel;
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
