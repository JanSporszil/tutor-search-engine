<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../models/User_info.php';
require_once __DIR__.'/../models/Classes.php';

class ClassesRepository extends Repository
{

    public function readClasses($city, $subject) {
        $stmt = $this->database->connect()->prepare('select u."id",
         u."Name", u."Surname", ui."City", ui."Description", td."subjects" 
            from "Users" u inner join "teacherDetails" tD on u.id = tD."teacherID" inner join "User_Info" ui on u.id = ui."UserID" where u."GroupID" = 1 and ui."City" like :city and position(:subject in td."subjects")>0');
        $stmt->bindParam(":city", $city, PDO::PARAM_STR);
        $stmt->bindParam(":subject", $subject, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readClassesWithCity($city) {
        $stmt = $this->database->connect()->prepare('select u."id",
         u."Name", u."Surname", ui."City", ui."Description", td."subjects" 
            from "Users" u inner join "teacherDetails" tD on u.id = tD."teacherID" inner join "User_Info" ui on u.id = ui."UserID" where u."GroupID" = 1 and ui."City" like :city');
        $stmt->bindParam(":city", $city, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function readClassesWithSubject($subject) {
        $stmt = $this->database->connect()->prepare('select u."id",
         u."Name", u."Surname", ui."City", ui."Description", td."subjects" 
            from "Users" u inner join "teacherDetails" tD on u.id = tD."teacherID" inner join "User_Info" ui on u.id = ui."UserID" 
                where u."GroupID" = 1 and position(:subject in td."subjects")>0');
        $stmt->bindParam(":subject", $subject, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    public function getInfoAboutBooking(int $id) {
        $stmt = $this->database->connect()->prepare('select
         u."Name", u."Surname", ui."City", ui."Description", td."subjects", td."availability" 
            from "Users" u inner join "teacherDetails" tD on u.id = tD."teacherID" inner join "User_Info" ui on u.id = ui."UserID" where u."id" = :id');
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function pushBookedClasses(int $userid, int $teacherid, string $day, string $hour, string $subject) {

        $stmt = $this->database->connect()->prepare('insert into "subscription" ("teacherID", "studentID", "day", "hour", "subject") values (?, ?, ?, ?, ?)');
        $stmt->execute([$teacherid, $userid, $day, $hour, $subject]);

    }




}