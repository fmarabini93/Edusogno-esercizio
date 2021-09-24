<?php

use PHPUnit\Framework\TestCase;
use App\Database;

use function PHPUnit\Framework\objectEquals;

class DatabaseTest extends TestCase
{
      protected $server_name = "localhost";
      protected $username = "root";
      protected $password = "";
      protected $db_name = "edu_test";
      /** @test */
      public function canEstablishConnection() {
            $db = new Database;

            $db->setup($this->server_name, $this->username, $this->password, $this->db_name);

            $this->assertIsObject($db);
      }
}