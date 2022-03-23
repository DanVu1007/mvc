<?php

use mvc\Core\Controller;
use mvc\Models\StudentModel;
use mvc\Models\StudentRepository;

class StudentController extends Controller
{
    function index()
    {
        $studentRepository = new StudentRepository;
        $d['students'] = $studentRepository->getAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["name"])) {
            $studentRepository = new StudentRepository();
            $student = new StudentModel;
            $student->setName($_POST["name"]);
            $student->setGender($_POST["gender"]);
            $student->setBirthday($_POST["birthday"]);
            $student->setAddress($_POST["address"]);
            echo '<pre>';
            print_r($student);
            echo '</pre>';
            // exit();
            if ($studentRepository->save($student)) {
                header("Location: " . WEBROOT . "student/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        $studentRepository = new StudentRepository();

        $d["student"] = $studentRepository->get($id);
        if (isset($_POST["name"])) {
            $arrayitem = [];
            $arrayitem['name'] = $_POST["name"];
            $arrayitem['gender'] = $_POST["gender"];
            $arrayitem['birthday'] = $_POST["birthday"];
            $arrayitem['address'] = $_POST["address"];
            if ($studentRepository->edit($id, $arrayitem)) {
                header("Location: " . WEBROOT . "student/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $student = new StudentRepository();
        if ($student->delete($id)) {
            header("Location: " . WEBROOT . "student/index");
        }
    }
}
