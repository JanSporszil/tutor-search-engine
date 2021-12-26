<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function ifPost(){
        if(!$this->isPost()) {
            return $this->render('login');
        }
    }


    public function loginIn() {

        $url = "http://$_SERVER[HTTP_HOST]";

        $this->ifPost();

        $username = $_POST['Username'];
        $password = $_POST['Password'];


        $user = $this->userRepository->getUser($username);

        if(!$user) {
            return $this->render('login', ['messages' => ['User doesnt exist']]);
        }

        if($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this username doesnt exist']]);
        }

        if($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Incorrect password']]);
        }

        $_SESSION['user'] = $user;

        if($user->getGroupID() === 2) {
            header("Location: {$url}/studentProfile");
            //return $this->render('studentProfile');
        }

        if($user->getGroupID() === 1) {
            header("Location: {$url}/teacherProfile");
            //return $this->render('teacherProfile');
        }

    }

    public function registerStudent() {

        $this->ifPost();

        $Name = $_POST['Name'];
        $Surname = $_POST['Surname'];
        $Email = $_POST['Email'];
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        //GroupID === 2 -> student, 1 for teachers
        $user = new Users(2, $Name, md5(md5($Surname)), $Email, $Username, $Password);

        $this->userRepository->register($user);

        return $this->render('login', ['messages' => ['Successfully registered!<br/> Now you can login']]);

    }

    public function registerTeacher() {

        $this->ifPost();

        $Name = $_POST['Name'];
        $Surname = $_POST['Surname'];
        $Email = $_POST['Email'];
        $Username = $_POST['Username'];
        $Password = $_POST['Password'];

        //GroupID === 2 -> student, 1 for teachers
        $user = new Users(1, $Name, md5(md5($Surname)), $Email, $Username, $Password);

        $this->userRepository->register($user);

        return $this->render('login', ['messages' => ['Successfully registered!<br/> Now you can login']]);

    }

    public function logout(){
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }


}