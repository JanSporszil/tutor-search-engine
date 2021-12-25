<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('login', 'DefaultController');
Routing::get('studentSignIn', 'DefaultController');
Routing::get('teacherSignInMain', 'DefaultController');
Routing::get('teacherSignInSubj', 'DefaultController');
Routing::get('studentProfile', 'DefaultController');
Routing::get('teacherProfile', 'DefaultController');
Routing::get('classesAvailability', 'DefaultController');
Routing::get('searchClasses', 'DefaultController');
Routing::get('bookClasses', 'DefaultController');

Routing::post('loginIn', 'SecurityController');
Routing::post('registerStudent', 'SecurityController');
Routing::post('registerTeacher', 'SecurityController');



Routing::run($path);