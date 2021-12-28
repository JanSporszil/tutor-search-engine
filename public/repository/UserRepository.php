<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Users.php';
require_once __DIR__.'/../models/User_info.php';

class UserRepository extends Repository
{
    public function getUser(string $username): ?Users {
        $stmt = $this->database->connect()->prepare('SELECT * FROM "Users" where "Username" = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }


        return new Users($user['id'], $user['GroupID'], $user['Name'], $user['Surname'], $user['Email'], $user['Username'], $user['Password']);
    }

    public function register(Users $user) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO "Users" ("id", "GroupID", "Name", "Surname", "Email", "Username", "Password") VALUES (?, ?, ?, ?, ?, ?)');

        $stmt->execute([$user->getId(), $user->getGroupID(), $user->getName(), $user->getSurname(), $user->getEmail(), $user->getUsername(), $user->getUsername()]);
    }

    public function getUserInfo(String $username): ?User_info {
        $stmt = $this->database->connect()->prepare('SELECT ui."City", ui."Description"
                                                            from "User_Info" as ui natural join "Users" as u
                                                                where "Username" like :username ');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if($result == false) {
            return null;
        }


        return new User_info($result['City'], $result['Description']);
    }

    public function addInfo(int $id, string $City, string $Description) {

        $stmt = $this->database->connect()->prepare(
            'INSERT INTO "User_Info" ("UserID", "City", "Description") VALUES (?, ?, ?)');


        $stmt->execute([$id, $City, $Description]);
    }

    public function updateInfo(int $id, string $City, string $Description) {

        $stmt = $this->database->connect()->prepare(
            'update "User_Info" set "City" = ?, "Description" = ? where "UserID" = ?');


        $stmt->execute([$City, $Description, $id]);
    }
}