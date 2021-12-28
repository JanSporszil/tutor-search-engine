<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/UserRepository.php';


class UserController extends AppController
{

    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function addInfoCont() {
        if(!$this->isPost()) {
            return $this->render('editProfile');
        }



        $user = $_SESSION['user'];
        $userinfo = $user->getUserInfo();

        $City = $_POST['City'] ?: "";
        $Description = $_POST['Description'] ?: "";

        if($userinfo === null){
            $this->userRepository->addInfo($user->getId(), $City, $Description);
        }

        else if($City !== "" || $Description !== ""){
            $City = $City ?: $userinfo->getCity();
            $Description = $Description ?: $userinfo->getDescription();
            $this->userRepository->updateInfo($user->getId(), $City, $Description);
        }

        $groupID = $_SESSION['user']->getGroupID();

        if($groupID === 2) {
            header("Location: http://$_SERVER[HTTP_HOST]/studentProfile");
            die();
        }

        if($groupID === 1) {
            header("Location: http://$_SERVER[HTTP_HOST]/teacherProfile");
            die();
        }
    }

}