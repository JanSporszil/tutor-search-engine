<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{

    private UserRepository $userRepository;

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


    public function signIn() {

        $url = "http://$_SERVER[HTTP_HOST]";

        $this->ifPost();

        $username = $_POST['Username'];
        $password = $_POST['Password'];


        $user = $this->userRepository->getUser($username);


        if(!$user) {
            return $this->render('login', ['messages' => ['User doesnt exist']]);
        }

        if($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Incorrect password']]);
        }

        $user->setUserInfo($this->userRepository->getUserInfo($user->getId()));
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
        $user = new Users(1,2, $Name, $Surname, $Email, $Username, md5(md5($Password)));

        $this->userRepository->register($user);

        return $this->render('login', ['messages' => ['Successfully registered!<br/> Now you can login']]);

    }

    public function validate(string $value, string $err) {
        if(!$value || trim($value === '')) {
            $this->render('registerAccount', ['messages' => [$err]]);
            die();
        }
    }

    function password_strength_check($password, $min_len = 8, $max_len = 70, $req_digit = 1, $req_lower = 1, $req_upper = 1, $req_symbol = 1) {
        // Build regex string depending on requirements for the password
        $regex = '/^';
        if ($req_digit == 1) { $regex .= '(?=.*\d)'; }              // Match at least 1 digit
        if ($req_lower == 1) { $regex .= '(?=.*[a-z])'; }           // Match at least 1 lowercase letter
        if ($req_upper == 1) { $regex .= '(?=.*[A-Z])'; }           // Match at least 1 uppercase letter
        if ($req_symbol == 1) { $regex .= '(?=.*[^a-zA-Z\d])'; }    // Match at least 1 character that is none of the above
        $regex .= '.{' . $min_len . ',' . $max_len . '}$/';

        if(preg_match($regex, $password)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register() {

        $this->ifPost();

        $Name = $_POST['Name'];
        define("NAME_REQ", 'Nieprawdi??owe imi??');

        $Surname = $_POST['Surname'];
        define("SURNAME_REQ", 'Nieprawdi??owe nazwisko');

        $Email = $_POST['Email'];
        define("EMAIL_REQ", 'Nieprawdi??owy email');
        define("EMAIL_EXISTS", 'Podany email ju?? istnieje');

        $Username = $_POST['Username'];
        define("USERNAME_REQ", 'Nieprawdi??owa nazwa u??ytkownika');
        define("USERNAME_EXISTS", 'Podany u??ytkownik ju?? istnieje');

        $Password = $_POST['Password'];
        define("PASSWORD_REQ", 'Nieprawdi??owe has??o. Musi zawiera??: ma???? liter??, du???? liter??, znak specjalny oraz cyfr??.');

        $AccountType = $_POST['AccountType'];


        $this->validate($Name, NAME_REQ);
        $this->validate($Surname, SURNAME_REQ);

        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $this->render('registerAccount', ['messages' => [EMAIL_REQ]]);
            die();
        }
        if($this->userRepository->ifEmailExists($Email) != 0){
            $this->render('registerAccount', ['messages' => [EMAIL_EXISTS]]);
            die();
        }

        $this->validate($Username, USERNAME_REQ);
        if($this->userRepository->ifUsernameExists($Username) != 0){
            $this->render('registerAccount', ['messages' => [USERNAME_EXISTS]]);
            die();
        }

        if(!$this->password_strength_check($Password)){
            $this->render('registerAccount', ['messages' => [PASSWORD_REQ]]);
            die();
        }


        //GroupID === 2 -> student, 1 for teachers
        if(empty($AccountType))
            return $this->render('registerAccount',  ['messages' => ['Please select your account type']]);

        $user = new Users(0, $AccountType, $Name, $Surname, $Email, $Username, md5(md5($Password)));


        $this->userRepository->register($user);

        return $this->render('login', ['messages' => ['Pomy??lnie zarejestrowano<br/> Teraz mo??esz si?? zalogowa??']]);

    }

    public function logout(){
        session_destroy();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }


}