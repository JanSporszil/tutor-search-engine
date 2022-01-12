<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/TeacherRepository.php';

class ClassesController extends AppController
{

    private ClassesRepository $classesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->classesRepository = new ClassesRepository();
    }

    public function getClasses() {

        $availableClasses = $this->classesRepository->readClasses();


        $this->render('searchClasses', [
            'classesAvailability' => $availableClasses
        ]);

    }



}