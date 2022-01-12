<?php

require 'Routing.php';
session_start();

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('home', 'DefaultController');

Routing::get('studentSignIn', 'DefaultController');
Routing::get('registerAccount', 'DefaultController');
Routing::get('editProfile', 'DefaultController');
Routing::get('studentProfile', 'DefaultController');
Routing::get('teacherProfile', 'DefaultController');
Routing::get('classesAvailability', 'DefaultController');
//Routing::get('searchClasses', 'DefaultController');
Routing::get('bookClasses', 'DefaultController');
Routing::get('addSubjects', 'DefaultController');
Routing::get('signIn', 'SecurityController');
Routing::get('login', 'DefaultController');
Routing::get('getClasses', 'ClassesController');

Routing::post('registerStudent', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('logout', 'SecurityController');
Routing::post('addInfoCont', 'UserController');
Routing::post('addAvailability', 'TeacherController');
Routing::post('deleteSubjects', 'TeacherController');
Routing::post('deleteAvailability', 'TeacherController');





Routing::run($path);