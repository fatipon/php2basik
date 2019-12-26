<?php

class Controller
{
    protected $action;

    public function __construct($action)
    {
        $this->action = $action;
    }

    public function execute()
    {
        switch ($this->action) {
            case '':
            case 'main':
                $this->mainAction();
                break;
            case 'index-student':
                $this->indexStudentAction();
                break;
            case 'create-student':
                $this->createStudentAction();
                break;
            case 'view-student':
                $this->viewStudentAction();
                break;
            case 'update-student':
                $this->updateStudentAction();
                break;
            case 'delete-student':
                $this->deleteStudentAction();
                break;
            case 'delete-all-student':
                $this->deleteAllStudentAction();
                break;
            case 'index-family':
                $this->indexFamilyAction();
                break;
            case 'create-family':
                $this->createFamilyAction();
                break;
            case 'view-family':
                $this->viewFamilyAction();
                break;
            case 'update-family':
                $this->updateFamilyAction();
                break;
            case 'delete-family':
                $this->deleteFamilyAction();
                break;
            case 'delete-all-families':
                $this->deleteAllFamily();
                break;
            case 'view-teacher':
                $this->viewTeacherAction();
                break;
            case 'index-teacher':
                $this->indexTeacherAction();
                break;
            case 'create-teacher':
                $this->createTeacherAction();
                break;
            case 'delete-teacher':
                $this->deleteTeacherAction();
                break;
            case 'update-teacher':
                $this->updateTeacherAction();
                break;
            case 'delete-all-teachers':
                $this->deleteAllTeacher();
                break;
            default:
                $this->errorAction();
        }
        
    }

    protected function mainAction()
    {
        require_once('view/main.php');
    }

    protected function errorAction()
    {
        require_once('view/error.php');
        exit();
    }

    protected function getId()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if (!empty($id)) {
            return $id;
        }
        $this->errorAction();
    }
    
    protected function indexStudentAction()
    {
        $studentRepository = new StudentRepository();
        $students = $studentRepository->findAll();
        require_once('view/student/index.php');
    }

    protected function viewStudentAction()
    {
        $id = $this->getId();
        $studentRepository = new StudentRepository();
        $student = $studentRepository->findById($id);
        if (!$student) {
            $this->errorAction();
        }
        require_once('view/student/view.php');
    }

    protected function updateStudentAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $this->getId();
            $studentRepository = new StudentRepository();
            $student = $studentRepository->findById($id);
            if (!$student) {
                $this->errorAction();
            }
            $action = 'update';
            require_once('view/student/form.php');
            return;
        }

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : null;
        $class = isset($_POST['class']) ? trim($_POST['class']) : null;
        $id = isset($_POST['id']) ? trim($_POST['id']) : null;
        $student = new Student($firstName, $lastName, $class, $id);

        if ($student->validate()) {
            $studentRepository = new StudentRepository();
            $studentRepository->update($student);

            header('Location: index.php?action=index-student');
            return;
        }
        $this->errorAction();
    }

    protected function createStudentAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = 'create';
            require_once('view/student/form.php');
            return;
        }

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : null;
        $class = isset($_POST['class']) ? trim($_POST['class']) : null;

        $student = new Student($firstName, $lastName, $class);

        if ($student->validate()) {
            $studentRepository = new StudentRepository();
            $studentRepository->save($student);
        }

        header('Location: index.php?action=index-student');
    }

    protected function deleteStudentAction()
    {
        $id = $this->getId();
        $studentRepository = new StudentRepository();
        $studentRepository->delete($id);
        header('Location: index.php?action=index-student');
    }

    protected function deleteAllStudentAction()
    {
        $studentRepository = new StudentRepository();
        $studentRepository->deleteAll();
        header('Location: index.php?action=index-student');
    }

    protected function indexFamilyAction()
    {
        $familyRepository = new FamilyRepository();
        $families = $familyRepository->findAll();
        require_once('view/family/index.php');
    }

    protected function createFamilyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = 'create';
            require_once('view/family/form.php');
            return;
        }

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : null;
        $address = isset($_POST['address']) ? trim($_POST['address']) : null;

        $family = new Family($firstName, $lastName, $address);

        if ($family->validate()) {
            $familyRepository = new FamilyRepository();
            $familyRepository->save($family);
        }

        header('Location: index.php?action=index-family');
    }

    protected function updateFamilyAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $this->getId();
            $familyRepository = new FamilyRepository();
            $family = $familyRepository->findById($id);
            if (!$family) {
                $this->errorAction();
            }
            $action = 'update';
            require_once('view/family/form.php');
            return;
        }

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : null;
        $address = isset($_POST['adress']) ? trim($_POST['adress']) : null;
        $id = isset($_POST['id']) ? trim($_POST['id']) : null;
        $family = new Family($firstName, $lastName, $address, $id);

        if ($family->validate()) {
            $familyRepository = new FamilyRepository();
            $familyRepository->update($family);

            header('Location: index.php?action=index-family');
            return;
        }
        $this->errorAction();
    }

    protected function deleteFamilyAction()
    {
        $id = $this->getId();
        $familyRepository = new FamilyRepository();
        $familyRepository->delete($id);
        header('Location: index.php?action=index-family');
    }

    protected function viewFamilyAction()
    {
        $id = $this->getId();
        $familyRepository= new FamilyRepository();
        $family = $familyRepository->findById($id);
        if (!$family) {
            $this->errorAction();
        }
        require_once('view/family/view.php');
    }

     protected function deleteAllFamily()
    {
        $familyRepository = new FamilyRepository();
        $familyRepository->deleteAll();
        header('Location: index.php?action=index-family');
        // phpinfo();
    }

    protected function indexTeacherAction()
    {
        $teacherRepository = new TeacherRepository();
        $teacher = $teacherRepository->findAll();
        require_once('view/teacher/index.php');
    }

    protected function viewTeacherAction()
    {
        $id = $this->getId();
        $teacherRepository = new TeacherRepository();
        $teacher = $teacherRepository->findById($id);
        if (!$teacher) {
            $this->errorAction();
        }
        require_once('view/teacher/view.php');
    }

    protected function updateTeacherAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $this->getId();
            $teacherRepository = new TeacherRepository();
            $teacher = $teacherRepository->findById($id);
            if (!$teacher) {
                $this->errorAction();
            }
            $action = 'update';
            require_once('view/teacher/form.php');
            return;
        }

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : null;
        $teach = isset($_POST['teach']) ? trim($_POST['teach']) : null;
        $classroom = isset($_POST['classroom']) ? trim($_POST['classroom']) : null;
        $id = isset($_POST['id']) ? trim($_POST['id']) : null;
        $teacher = new Teacher($firstName, $lastName, $teach, $classroom, $id);

        if ($teacher->validate()) {
            $teacherRepository = new TeacherRepository();
            $teacherRepository->update($teacher);

            header('Location: index.php?action=index-teacher');
            return;
        }
        $this->errorAction();
    }

    protected function createTeacherAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = 'create';
            require_once('view/teacher/form.php');
            return;
        }

        $firstName = isset($_POST['firstName']) ? trim($_POST['firstName']) : null;
        $lastName = isset($_POST['lastName']) ? trim($_POST['lastName']) : null;
        $teach = isset($_POST['teach']) ? trim($_POST['teach']) : null;
        $classroom = isset($_POST['classroom']) ? trim($_POST['classroom']) : null;

        $teacher = new Teacher($firstName, $lastName, $teach, $classroom);

        if ($teacher->validate()) {
            $teacherRepositopy = new TeacherRepository();
            $teacherRepositopy->save($teacher);
        }

        header('Location: index.php?action=index-teacher');
    }

    protected function deleteTeacherAction()
    {
        $id = $this->getId();
        $teacherRepositopy = new TeacherRepository();
        $teacherRepositopy->delete($id);
        header('Location: index.php?action=index-teacher');
    }

     protected function deleteAllTeacher()
    {

        $teacherRepositopy = new TeacherRepository();
        $teacherRepositopy->deleteAll();
        header('Location: index.php?action=index-teacher');
    }


}
