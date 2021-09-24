<?php
use PHPUnit\Framework\TestCase;
use App\Event;

class EventTest extends TestCase
{
      protected $event;

      public function setUp() : void {
            $this->event = new Event;
      }

      /** @test */
      public function canGetName() {
            $this->event->setName('Meeting');

            $this->assertEquals($this->event->getName(), 'Meeting');
      }

      /** @test */
      public function canGetDescription() {
            $this->event->setDescription('See your old friends!');

            $this->assertEquals($this->event->getDescription(), 'See your old friends!');
      }

      /** @test */
      public function canGetDate() {
            $this->event->setDate('2021-12-26');

            $this->assertEquals($this->event->getDate(), '2021-12-26');
      }

      /** @test */
      public function canGetHour() {
            $this->event->setHour('08:00AM');

            $this->assertEquals($this->event->getHour(), '08:00AM');
      }

      /** @test */
      public function verifyTrimming() {
            $this->event->setName('    Meeting');
            $this->event->setDescription('See your old friends!    ');

            $this->assertEquals($this->event->getName(), 'Meeting');
            $this->assertEquals($this->event->getDescription(), 'See your old friends!');
      }
}