<?php

use mvc\Core\Controller;
use mvc\Models\TaskModel;
use mvc\Models\TaskRepository;

class tasksController extends Controller
{
    function index()
    {
        $taskRepository = new TaskRepository;
        $d['tasks'] = $taskRepository->getAll();
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
        $taskRepository = new TaskRepository();

        $d["task"] = $taskRepository->get($id);
        if (isset($_POST["title"])) {
            $task = new TaskModel;
            $task->setId($id);
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);
            if ($taskRepository->save($task)) {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = new TaskRepository();
        if ($task->delete($id)) {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
