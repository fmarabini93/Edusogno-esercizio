<?php

namespace App;

use mysqli;

class Database
{
      protected $db;

      public function setup($servername, $username, $password, $dbname) {
            $db = new mysqli($servername, $username, $password, $dbname);
            return $db;
      }
}