<?php

use mvc\Core\Controller;
use mvc\Models\TaskRepository;

class tasksController extends Controller
{
    function index()
    {

        require(ROOT . 'Models/TaskRepository.php');

        $tasks = new TaskRepository;
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            require(ROOT . 'Models/TaskRepository.php');

            $task = new TaskRepository();

            if ($task->add($_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/TaskRepository.php');
        $task = new TaskRepository();

        $d["task"] = $task->get($id);

        if (isset($_POST["title"])) {
            if ($task->edit($id, $_POST["title"], $_POST["description"])) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        require(ROOT . 'Models/TaskRepository.php');

        $task = new TaskRepository();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}