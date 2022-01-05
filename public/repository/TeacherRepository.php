<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../models/User_info.php';

class TeacherRepository extends Repository
{

    public function getAvail(int $userid) {
        $stmt = $this->database->connect()->prepare('SELECT availability FROM "teacherDetails" where "teacherID" = :userid');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['availability'];
    }

    public function addAvail(int $userid, string $avail) {
        $stmt = $this->database->connect()->prepare('SELECT availability FROM "teacherDetails" where "teacherID" = :userid');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            $add = $this->database->connect()->prepare('INSERT INTO "teacherDetails" ("teacherID") values (?)');
            $add->execute([$userid]);
        }


        $stmt = $this->database->connect()->prepare(
            'update "teacherDetails" set "availability" = ? where "teacherID" = ?');

        $stmt->execute([$avail, $userid]);
    }

    public function readSubjects(int $userid) {
        $stmt = $this->database->connect()->prepare('SELECT "subjects" from "teacherDetails" where "teacherID" = :userid');
        $stmt->bindParam(":userid", $userid, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['subjects'];
    }

    public function pushSubjects(int $userid, string $subjects) {
        $stmt = $this->database->connect()->prepare('SELECT "subjects" FROM "teacherDetails" where "teacherID" = :userid');
        $stmt->bindParam(':userid', $userid, PDO::PARAM_INT);
        $stmt->execute();

        if($stmt->rowCount() == 0) {
            $add = $this->database->connect()->prepare('INSERT INTO "teacherDetails" ("teacherID") values (?)');
            $add->execute([$userid]);
        }


        $stmt = $this->database->connect()->prepare(
            'update "teacherDetails" set "subjects" = ? where "teacherID" = ?');

        $stmt->execute([$subjects, $userid]);
    }


}