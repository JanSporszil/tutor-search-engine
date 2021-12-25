<?php

    include __DIR__.'/UserGroups.php';

    class Users {
        private int $GroupID;
        private string $Name;
        private string $Surname;
        private string $email;
        private string $Username;
        private string $Password;


        public function __construct(int $GroupID, string $Name, string $Surname, string $email, string $Username, string $Password)
        {
            $this->GroupID = $GroupID;
            $this->Name = $Name;
            $this->Surname = $Surname;
            $this->email = $email;
            $this->Username = $Username;
            $this->Password = $Password;
        }

        /**
         * @return int
         */
        public function getGroupID(): int
        {
            return $this->GroupID;
        }

        /**
         * @param int $GroupID
         */
        public function setGroupID(int $GroupID): void
        {
            $this->GroupID = $GroupID;
        }

        /**
         * @return string
         */
        public function getName(): string
        {
            return $this->Name;
        }

        /**
         * @param string $Name
         */
        public function setName(string $Name): void
        {
            $this->Name = $Name;
        }

        /**
         * @return string
         */
        public function getSurname(): string
        {
            return $this->Surname;
        }

        /**
         * @param string $Surname
         */
        public function setSurname(string $Surname): void
        {
            $this->Surname = $Surname;
        }

        /**
         * @return string
         */
        public function getEmail(): string
        {
            return $this->email;
        }

        /**
         * @param string $email
         */
        public function setEmail(string $email): void
        {
            $this->email = $email;
        }

        /**
         * @return string
         */
        public function getUsername(): string
        {
            return $this->Username;
        }

        /**
         * @param string $Username
         */
        public function setUsername(string $Username): void
        {
            $this->Username = $Username;
        }

        /**
         * @return string
         */
        public function getPassword(): string
        {
            return $this->Password;
        }

        /**
         * @param string $Password
         */
        public function setPassword(string $Password): void
        {
            $this->Password = $Password;
        }

    }
?>