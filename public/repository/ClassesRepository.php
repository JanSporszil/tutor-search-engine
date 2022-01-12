<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../models/User_info.php';
require_once __DIR__.'/../models/Classes.php';

class ClassesRepository extends Repository
{

    public function readClasses() {
        $stmt = $this->database->connect()->prepare('select u."id",
         u."Name", u."Surname", ui."City", ui."Description", td."subjects" 
            from "Users" u inner join "teacherDetails" tD on u.id = tD."teacherID" inner join "User_Info" ui on u.id = ui."UserID" where u."GroupID" = 1');

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}