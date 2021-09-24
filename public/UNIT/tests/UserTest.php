<?php

use PHPUnit\Framework\TestCase;
use App\User;

class UserTest extends TestCase
{     
      protected $user;

      public function setUp() : void {
            $this->user = new User;
      }

      /** @test */
      public function canGetName() {

            $this->user->setName('Johnny');

            $this->assertEquals($this->user->getName(), 'Johnny');
      }

      /** @test */
      public function canGetSurname() {

            $this->user->setSurname('Bianchi');

            $this->assertEquals($this->user->getSurname(), 'Bianchi');
      }

      /** @test */
      public function canGetFullName() {

            $this->user->setName('Johnny');
            $this->user->setSurname('Bianchi');

            $this->assertEquals($this->user->getFullName(), 'Johnny Bianchi');
      }

      /** @test */
      public function canGetEmail() {

            $this->user->setEmail('bianchi@johnny.com');

            $this->assertEquals($this->user->getEmail(), 'bianchi@johnny.com');
      }

      /** @test */
      public function canGetFullUser() {

            $this->user->setName('Johnny');
            $this->user->setSurname('Bianchi');
            $this->user->setEmail('bianchi@johnny.com');

            $this->assertEquals($this->user->getFullUser(), 'Johnny Bianchi bianchi@johnny.com');
      }

      /** @test */
      public function verifyTrimming() {

            $this->user->setName('      Johnny');
            $this->user->setSurname('Bianchi      ');

            $this->assertEquals($this->user->getName(), 'Johnny');
            $this->assertEquals($this->user->getSurname(), 'Bianchi');
      }
}