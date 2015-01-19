<?php

class ActorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers \Game\Actor::getHealth
     */
    public function testHasGetHealthMethod()
    {
        $actor = new \Game\Actor(100);
        $this->assertTrue(method_exists($actor, 'getHealth'));
    }

    /**
     * @covers \Game\Actor::getHealth
     */
    public function testHasHurtMethod()
    {
        $actor = new \Game\Actor(100);
        $this->assertTrue(method_exists($actor, 'hurt'));
    }

    /**
     * @covers \Game\Actor::getHealth
     */
    public function testHasIsDeadMethod()
    {
        $actor = new \Game\Actor(100);
        $this->assertTrue(method_exists($actor, 'isDead'));
    }

    /**
     * @depends testHasGetHealthMethod
     * @covers \Game\Actor::getHealth
     */
    public function testStartingHealth()
    {
        $actor = new \Game\Actor(50);
        $this->assertEquals(50, $actor->getHealth());
    }

    /**
     * @depends testHasHurtMethod
     * @covers \Game\Actor::hurt
     */
    public function testTakesDamage()
    {
        $actor = new \Game\Actor(100);
        $actor->hurt(50);
        $this->assertEquals(50, $actor->getHealth());
    }

    /**
     * @depends testHasIsDeadMethod
     * @covers \Game\Actor::isDead
     */
    public function testDies()
    {
        $actor = new \Game\Actor(0);
        $this->assertTrue($actor->isDead());
    }
}