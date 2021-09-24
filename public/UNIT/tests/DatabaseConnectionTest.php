<?php

use PHPUnit\Framework\TestCase;
use App\Database;

class DatabaseConnectionTest extends TestCase
{
      private $server_name = "localhost";
      private $username = "root";
      private $password = "";
      private $db_name = "edu_test";
      
      /** @test */
      public function canEstablishConnection() {
            $db = new Database;

            $db->setup($this->server_name, $this->username, $this->password, $this->db_name);

            $this->assertIsObject($db);
      }
}