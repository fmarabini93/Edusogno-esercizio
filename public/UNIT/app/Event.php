<?php
namespace App;

class Event
{
      protected $event_name;
      protected $event_description;
      protected $event_date;
      protected $event_hour;

      public function setName($name) {
            $this->event_name = trim($name);
      }

      public function getName() {
            return $this->event_name;
      }

      public function setDescription($description) {
            $this->event_description = trim($description);
      }

      public function getDescription() {
            return $this->event_description;
      }

      public function setDate($date) {
            $this->event_date = $date;
      }

      public function getDate() {
            return $this->event_date;
      }

      public function setHour($hour) {
            $this->event_hour = $hour;
      }

      public function getHour() {
            return $this->event_hour;
      }
}