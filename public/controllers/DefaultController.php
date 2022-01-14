<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/TeacherRepository.php';
require_once __DIR__.'/../repository/ClassesRepository.php';

class DefaultController extends AppController {

    public function home() {
        $this->render('home');
    }

    public function login() {
        $this->render('login');
    }

    public function studentSignIn() {
        $this->render('studentSignIn');
    }

    public function registerAccount() {
        $this->render('registerAccount', ['messages' => ['Zarejestruj konto']]);
    }

    public function editProfile() {
        $this->render('editProfile');
    }

    public function studentProfile() {
        $user = $_SESSION['user'];

        $repository = new UserRepository();
        $userinfo = $repository->getUserInfo($user->getId());
        $user->setUserInfo($userinfo);
        $_SESSION['user'] = $user;
        $this->render('studentProfile', [
            'user' => $user,
            'userInfo' => $userinfo
        ]);
    }

    public function teacherProfile() {
        $user = $_SESSION['user'];
        $repository = new UserRepository();
        $teacherRepository = new TeacherRepository();
        $subjects = unserialize($teacherRepository->readSubjects($user->getId()));
        if(is_array($subjects))
            $user->setSubjects($subjects);
        $userinfo = $repository->getUserInfo($user->getId());
        $user->setUserInfo($userinfo);
        $_SESSION['user'] = $user;
        $this->render('teacherProfile', [
            'user' => $user,
            'userInfo' => $userinfo,
            'subjects' => $subjects
        ]);
    }

    public function classesAvailability() {

        $teacherRepository = new TeacherRepository();
        $user = $_SESSION['user'];

        $availability = unserialize($teacherRepository->getAvail($user->getId()));

        $this->render('classesAvailability', [
            'availability' => $availability
        ]);
    }

    public function searchClasses() {
        $this->render('searchClasses');
    }

    public function addSubjects() {

        $teacherRepository = new TeacherRepository();
        $user = $_SESSION['user'];
        $subjects = $teacherRepository->readSubjects($user->getId());
        $unserialized = unserialize($subjects);

        if(isset($_POST['subject'])) {

            $subject = $_POST['subject'];

            if (!is_array($unserialized))
                $unserialized = array();

            if (!in_array($subject, $unserialized))
                $unserialized[] = $subject;

            $sendArray = serialize($unserialized);
            $teacherRepository->pushSubjects($user->getId(), $sendArray);
        }

        $this->render('addSubjects', [
            'messages' => ['Wybierz swoje przedmioty'],
            'subjects' => $unserialized
        ]);
    }

}