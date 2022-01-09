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

        if(!array_key_exists($day, $unserialized))
            $unserialized[$day] = [];

        if(!in_array($hour, $unserialized[$day]))
            $unserialized[$day][] = $hour;

        $sendArray = serialize($unserialized);

        $this->teacherRepository->addAvail($user->getId(), $sendArray);
    }

    public function deleteAvailability() {
        
    }

    public function deleteSubjects(){
        $subject = $_POST['subject'];
        $user = $_SESSION['user'];

        $availability = $this->teacherRepository->readSubjects($user->getId());

        $toDelete = unserialize($availability);

        if(($key = array_search($subject, $toDelete)) !== false)
            unset($toDelete[$key]);

        $sendArray = serialize($toDelete);

        $this->teacherRepository->pushSubjects($user->getId(), $sendArray);

        $this->render("addSubjects", [
            'messages' => ['Wybierz swoje przedmioty'],
            'subjects' => $toDelete
        ]);
    }


}