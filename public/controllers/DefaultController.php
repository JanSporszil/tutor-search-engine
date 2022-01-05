<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/UserRepository.php';

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
        $this->render('registerAccount');
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
        $userinfo = $repository->getUserInfo($user->getId());
        $user->setUserInfo($userinfo);
        $_SESSION['user'] = $user;
        $this->render('teacherProfile', [
            'user' => $user,
            'userInfo' => $userinfo
        ]);
    }

    public function classesAvailability() {
        $this->render('classesAvailability');
    }

    public function searchClasses() {
        $this->render('searchClasses');
    }

    public function bookClasses() {
        $this->render('bookClasses');
    }

    public function addSubjects() {
        $this->render('addSubjects');
    }

}