<?php

namespace mvc\Models;

use mvc\Core\ResourceModel;
use mvc\Models\StudentModel;

class StudentResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->__init('student', 'id', new StudentModel);
    }
}
