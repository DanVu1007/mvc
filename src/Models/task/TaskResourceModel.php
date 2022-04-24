<?php

namespace mvc\Models\task;

use mvc\Core\ResourceModel;
use mvc\Models\task\TaskModel;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->__init('tasks', 'id', new TaskModel);
    }
}
