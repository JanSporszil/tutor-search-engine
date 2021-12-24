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


        return new Users($user['id'], $user['GroupID'], $user['Name'], $user['Surname'], $user['Email'], $user['Username'], $user['Password']);
    }
}