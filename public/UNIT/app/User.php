<?php
namespace App;

class User
{
      protected $usr_name;
      protected $usr_surname;
      protected $usr_email;

      public function setName($name) {
            $this->usr_name = trim($name);
      }

      public function getName() {
            return $this->usr_name;
      }

      public function setSurname($surname) {
            $this->usr_surname = trim($surname);
      }

      public function getSurname() {
            return $this->usr_surname;
      }

      public function getFullName() {
            return $this->usr_name . ' ' . $this->usr_surname;
      }

      public function setEmail($email) {
            $this->usr_email = $email;
      }

      public function getEmail() {
            return $this->usr_email;
      }
      
      public function getFullUser() {
            return $this->usr_name . ' ' . $this->usr_surname . ' ' . $this->usr_email;
      }
}