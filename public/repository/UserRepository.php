<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Users.php';

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


        return new Users($user['GroupID'], $user['Name'], $user['Surname'], $user['Email'], $user['Username'], $user['Password']);
    }

    public function register(Users $user) {
        $stmt = $this->database->connect()->prepare(
            'INSERT INTO "Users" ("GroupID", "Name", "Surname", "Email", "Username", "Password") VALUES (?, ?, ?, ?, ?, ?)');

        $stmt->execute([$user->getGroupID(), $user->getName(), $user->getSurname(), $user->getEmail(), $user->getUsername(), $user->getUsername()]);
    }

}