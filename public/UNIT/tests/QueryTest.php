<?php
use PHPUnit\Framework\TestCase;
use App\Query;

class QueryTest extends TestCase
{
      private $server_name = "localhost";
      private $username = "root";
      private $password = "";
      private $db_name = "edu_test";
      private $sql;

      /** @test */
      public function canQueryDatabase() {
            $this->sql = new Query;

            $this->assertIsObject($this->sql->queryDb($this->server_name, $this->username, $this->password, $this->db_name));
      }
}