<?php

namespace mvc\Models\student;

use mvc\Core\ResourceModel;
use mvc\Models\student\StudentModel;

class StudentResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->__init('student', 'id', new StudentModel);
    }
}
