<?php

namespace Sid\Access\Tests\Unit;

use Codeception\TestCase\Test;
use Sid\Access\Access;

class AccessTest extends Test
{
    public function testNoDefault()
    {
        $access = new Access();

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );

        $access->deny("role", "component");

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );

        $access->allow("role", "component");

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );
    }

    public function testNoDefaultRemove()
    {
        $access = new Access();

        $access->deny("role", "component");

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );

        $access->remove("role", "component");

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );
    }

    public function testDefaultAllow()
    {
        $access = new Access(
            Access::ALLOW
        );

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );

        $access->deny("role", "component");

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );

        $access->allow("role", "component");

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );
    }

    public function testDefaultAllowRemove()
    {
        $access = new Access(
            Access::ALLOW
        );

        $access->deny("role", "component");

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );

        $access->remove("role", "component");

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );
    }

    public function testDefaultDeny()
    {
        $access = new Access(
            Access::DENY
        );

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );

        $access->allow("role", "component");

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );

        $access->deny("role", "component");

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );
    }

    public function testDefaultDenyRemove()
    {
        $access = new Access(
            Access::DENY
        );

        $access->allow("role", "component");

        $this->assertTrue(
            $access->isAllowed("role", "component")
        );

        $access->remove("role", "component");

        $this->assertFalse(
            $access->isAllowed("role", "component")
        );
    }
}
