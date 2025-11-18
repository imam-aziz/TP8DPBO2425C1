<?php
include_once 'models/Course.php';
include_once 'models/Lecturer.php'; // Perlu ini untuk dropdown dosen

class CourseController {
    private $model;
    private $lecturerModel;

    public function __construct() {
        $this->model = new Course();
        $this->lecturerModel = new Lecturer(); // Siapkan model dosen juga
    }

    public function index() {
        $courses = $this->model->getAllWithLecturer();
        include 'views/course_index.php';
    }

    public function add() {
        if (isset($_POST['submit'])) {
            $this->model->create($_POST);
            header("Location: index.php?mod=course");
        } else {
            // Ambil list dosen untuk ditampilkan di dropdown <select>
            $lecturers = $this->lecturerModel->getAll(); 
            include 'views/course_create.php';
        }
    }

    public function edit($id) {
        if (isset($_POST['submit'])) {
            $this->model->update($id, $_POST);
            header("Location: index.php?mod=course");
        } else {
            $data = $this->model->getById($id);
            $lecturers = $this->lecturerModel->getAll(); // Untuk dropdown edit
            include 'views/course_edit.php';
        }
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?mod=course");
    }
}
?>