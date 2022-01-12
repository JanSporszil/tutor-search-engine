<?php

    class Classes
    {
        private $teacherID;
        private $day;
        private $hour;

        /**
         * @param $teacherID
         * @param $day
         * @param $hour
         */
        public function __construct($teacherID, $day, $hour)
        {
            $this->teacherID = $teacherID;
            $this->day = $day;
            $this->hour = $hour;
        }

        /**
         * @return mixed
         */
        public function getTeacherID()
        {
            return $this->teacherID;
        }

        /**
         * @param mixed $teacherID
         */
        public function setTeacherID($teacherID): void
        {
            $this->teacherID = $teacherID;
        }

        /**
         * @return mixed
         */
        public function getDay()
        {
            return $this->day;
        }

        /**
         * @param mixed $day
         */
        public function setDay($day): void
        {
            $this->day = $day;
        }

        /**
         * @return mixed
         */
        public function getHour()
        {
            return $this->hour;
        }

        /**
         * @param mixed $hour
         */
        public function setHour($hour): void
        {
            $this->hour = $hour;
        }
    }