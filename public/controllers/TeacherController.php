<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/TeacherRepository.php';


class TeacherController extends AppController
{

    private TeacherRepository $teacherRepository;

    public function __construct()
    {
        parent::__construct();
        $this->teacherRepository = new TeacherRepository();
    }


    public function addAvailability() {
        $day = $_POST['day'];
        $hour = $_POST['time'];

        $user = $_SESSION['user'];

        $availability = $this->teacherRepository->getAvail($user->getId());

        $unserialized = unserialize($availability);

        $unserialized[$day] = $hour;

        $sendArray = serialize($unserialized);

        $this->teacherRepository->addAvail($user->getId(), $sendArray);
    }

    public function getAvailability () {
        //TODO dodac wyswietlanie informacji na stronie
    }

    public function getSubjects() {
        //TODO dodac wyswietlanie w selecie na stronie
    }

}