<?php

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;

class tasksController extends Controller
{
    function index()
    {
        $tasks = new TaskRepository;
        $d['tasks'] = $tasks->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $taskRepository = new TaskRepository();
            $task = new TaskModel;
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);

            if ($taskRepository->save($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        require(ROOT . 'Models/TaskRepository.php');
        $taskRepository = new TaskRepository();
        $task = new TaskModel;
        $d["task"] = $task->getId();

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
