<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/TeacherRepository.php';
require_once __DIR__.'/../repository/ClassesRepository.php';

class ClassesController extends AppController
{

    private ClassesRepository $classesRepository;
    private TeacherRepository $teacherRepository;

    public function __construct()
    {
        parent::__construct();
        $this->classesRepository = new ClassesRepository();
        $this->teacherRepository = new TeacherRepository();
    }

    public function getClasses() {

        $subject = $_POST['subject'];
        $city = $_POST['city'];

        $availableClasses = null;

        if($city != "")
            $availableClasses = $this->classesRepository->readClassesWithCity($city);

        else if($subject != "")
            $availableClasses = $this->classesRepository->readClassesWithSubject($subject);

        else if($subject != "" && $city != "")
            $availableClasses = $this->classesRepository->readClasses($city, $subject);


        $this->render('searchClasses', [
            'classesAvailability' => $availableClasses
        ]);

    }

    public function getBookedClasses() {
        $data = json_decode(file_get_contents("php://input"));
        $teacherInfo = $this->classesRepository->getInfoAboutBooking($data->id);
        $availability = unserialize($teacherInfo['availability']);
        echo json_encode($availability);

    }


    public function bookClasses() {
        GLOBAL $path;

        $teacherid = explode('/', $path);
        $teacherid = end($teacherid);

        $teacherInfo = $this->classesRepository->getInfoAboutBooking($teacherid);



        $this->render('bookClasses', [
            'teacherInfo' => $teacherInfo,
            'teacherid' => $teacherid
        ]);
    }

    public function bookingClasses() {

        $subject = $_POST['sub'];
        $day = $_POST['day'];
        $hour = $_POST['hour'];
        $teacherid = $_POST['teacherid'];
        $user = $_SESSION['user'];

        $availability = $this->teacherRepository->getAvail($teacherid);

        $toDelete = unserialize($availability);

        if(($value = array_search($hour, $toDelete[$day])) !== false) {
            unset($toDelete[$day][$value]);
            if(empty($toDelete[$day]))
                unset($toDelete[$day]);
        }

        $sendArray = serialize($toDelete);

        $this->teacherRepository->addAvail($teacherid, $sendArray);

        $this->classesRepository->pushBookedClasses($user->getId(), $teacherid, $day, $hour, $subject);



        $this->render('getClasses');

    }


}