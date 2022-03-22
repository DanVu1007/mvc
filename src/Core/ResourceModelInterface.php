<?php

namespace mvc\Core;

interface ResourceModelInterface
{
    public function __init($table, $id, $model);
    public function save($model);
    public function delete($id);
};
