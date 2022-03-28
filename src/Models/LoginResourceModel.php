<?php

namespace mvc\Models;

use mvc\Core\ResourceModel;
use mvc\Models\LoginModel;

class LoginResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->__init('user', 'id', new LoginModel);
    }
}
