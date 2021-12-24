<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function loginIn() {
        $userRepository = new UserRepository();

        $url = "http://$_SERVER[HTTP_HOST]";

        if(!$this->isPost()) {
            return $this->render('login');
        }


        $username = $_POST['Username'];
        $password = $_POST['Password'];

        $user = $userRepository->getUser($username);

        if(!$user) {
            return $this->render('login', ['messages' => ['User doesnt exist']]);
        }

        if($user->getUsername() !== $username) {
            return $this->render('login', ['messages' => ['User with this username doesnt exist']]);
        }

        if($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Incorrect password']]);
        }

        if($user->getGroupID() === 2) {
            header("Location: {$url}/studentProfile");
            //return $this->render('studentProfile');
        }

        if($user->getGroupID() === 1) {
            header("Location: {$url}/teacherProfile");
            //return $this->render('teacherProfile');
        }




    }
}